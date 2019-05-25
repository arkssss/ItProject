<?php
namespace Home\Controller;
use Think\Controller;
class ViewItemController extends Controller {

    protected $show_modle = "show";
    protected $show_ticket_model = "show_ticket";
    protected $show_book_record = "book_record";

    public function index(){

        $this->display();

    }
    public function searchres(){

        $key_word = I("get.key_word");
        $map['show_name'] = array('like', "%".$key_word."%");
        // get all the event
        $events = M($this->show_modle)->where($map)->select();
        $has_event = 0;
        if($events) $has_event =  1;

        $this->assign("has_event", $has_event);
        $this->assign("events", $events);

        $this->display('ViewItem/search_res');  

    }

    public function get_all_event(){

        // get all the event
        $map['show_status'] = 1;
        $events = M($this->show_modle)->where($map)->select();

        echo  json_encode($events);
    }


    public function detail(){

        $event_id = intval(I("get.id"), 0);
        if(!$event_id) {$this->error("Event does not exist!");}

        // select
        $this_event = M($this->show_modle)->where(['id'=>$event_id])->find();

        // echo $this->show_ticket_model;
        // get tickets 
        $this_tickets = M($this->show_ticket_model)->where(['show_id'=>$event_id])->select();

        // assign
        $this->assign("event", $this_event);
        $this->assign("tickets", $this_tickets);

        $this->display();
    }

    public function modify_order(){
        

        if(IS_POST){

            $data = I('post.');

            if($data['old_ticket'] == $data['ticket']){
                echo json_encode(['error'=>1, 'msg'=>'No changes detected']);
                return;
            }

            $map['ticket_price'] = $data['ticket'];
            $map['show_id'] = $data['show_id'];

            // ticket info
            $this_ticket_info = M($this->show_ticket_model)->where($map)->find();

            // capacity
            if($this_ticket_info['ticket_number'] < 0){
                echo json_encode(['error'=>1, 'msg'=>'This type of ticket is not available!']);
                return;
            }

            $where['id'] = $data['record_id'];
            $save_data['ticket_price'] = $data['ticket'];
            $save_data['ticket_type']  = $this_ticket_info['ticket_name'];

            M($this->show_book_record)->where($where)->save($save_data);


            // ticket des1
            M($this->show_ticket_model) ->where($map)->setDec('ticket_number', 1);

            $map['ticket_price'] = $data['old_ticket'];
            M($this->show_ticket_model) ->where($map)->setInc('ticket_number', 1);

            echo json_encode(['error'=>0, 'msg'=>'Modify success!']);
            return;

        }else{

            $event_id = intval(I("get.id"), 0);
            if(!$event_id) {$this->error("Event does not exist!");}
    
            $record_id = intval(I("get.record_id"), 0);
            if(!$record_id){$this->error("Recoed does not exist!");}
    
            // select
            $this_event = M($this->show_modle)->where(['id'=>$event_id])->find();
    
            // echo $this->show_ticket_model;
            // get tickets 
            $this_tickets = M($this->show_ticket_model)->where(['show_id'=>$event_id])->select();
    
            // get my ticket_type
            $book_record = M($this->show_book_record)->where(['id'=>$record_id])->find();
    
            $my_book_ticket =  $book_record['ticket_price'];
            foreach ($this_tickets as $key => &$value) {
                if($value['ticket_price'] == $my_book_ticket){
                    $value['is_this'] = 1;
                }else{
                    $value['is_this'] = 0;
                }
            }
    
            // assign
            $this->assign("event", $this_event);
            $this->assign("tickets", $this_tickets);
            $this->assign('book_record', $book_record);
            
    
            $this->display();

        }
    

    }

    // book the event   
    public function booking(){
        
        $ticket = I("post.ticket");
        $show_id = I("post.show_id");
        $user_id = intval(I("cookie.id"), 0);
        $coupon = I("post.coupon");
        
        if(!$user_id) {

            $json_ret['error'] = 1;
            $json_ret['msg'] = "Please LogIn First!";
            echo json_encode($json_ret);
            return;
        }

        $json_ret = [];

        // check if has remain 
        $map['show_id'] = $show_id;
        $map['ticket_price'] = $ticket;
        $ticket_info = M($this->show_ticket_model)->where($map)->find();
        $ticket_number = $ticket_info['ticket_number'];
        if($ticket_number <= 0){
            // no remaining 
            $json_ret['error'] = 1;
            $json_ret['msg'] = "This type of ticket is not available!";
            echo json_encode($json_ret);
            return;
        }

        $theevent = M($this->show_modle)->where(['id'=>$show_id])->find();

        if($coupon && $theevent['coupon'] != $coupon){
            // coupon not right
            $json_ret['error'] = 1;
            $json_ret['msg'] = "coupon code not right please check it again";
            echo json_encode($json_ret);
            return;
        }
        // Saving booking info
        $data['show_id'] = $show_id;
        $data['ticket_price'] = $ticket;
        $data['user_id'] = $user_id;
        $data['ticket_type'] = $ticket_info['ticket_name'];
        $data['show_date'] = $theevent['show_time'];
        $data['show_cover'] = $theevent['show_cover'];
        $data['show_name'] = $theevent['show_name'];
        // time
        $data['book_time'] = date("Y-m-d H:i:s",time());

        // coupon
        if(!$coupon){$data['has_coupon'] = 0;}
        else{$data['has_coupon'] = 1;}

        $book_model = M($this->show_book_record);
        $book_model->startTrans();
        $res = $book_model->add($data);

        if($res){
            // add success
            // reduce the numebr of ticket
            $ticket_number -= 1;
            $suc = M($this->show_ticket_model)->where($map)->save(['ticket_number' => $ticket_number]);

            if($suc){
                $json_ret['error'] = 0;
                $json_ret['msg'] = "book success";
                $book_model->commit();
                echo json_encode($json_ret);
                return;
            }
        }

        $json_ret['error'] = 1;
        $json_ret['msg'] = "server buzy, try later!"; 
        $book_model->rollback();
        echo json_encode($json_ret);
        return;
    }

    public function my_order(){
        // user id
        $user_id = intval(I("cookie.id"), 0);
        if(!$user_id) $this->error("Invaild User");

        // select Event_available
        $all_records = M($this->show_book_record) -> where(['user_id'=>$user_id]) -> select();

        // prcess
        $coming_event = [];
        $pass_event = [];
        $curtDate = date("Y-m-d",time());
        foreach ($all_records as $key => $value) {

            $the_show['id'] = $value['show_id'];

            if(M($this->show_modle)->where($the_show)->getField('show_status') == '1'){
                // available event 

                $show_date = $value['show_date'];
                $value['record_id'] = $value['id'];

                if($value['has_coupon']) $value['has_coupon'] = 'Yes';
                else $value['has_coupon'] = 'No';

                if($show_date < $curtDate){
                    //pass event
                    array_push($pass_event, $value);
                }else{
                    array_push($coming_event, $value);
                }

            }

        }

        $this->assign('pass_event', $pass_event);
        $this->assign('coming_event', $coming_event);

        $this->display();
    }

    // cancel a book
    public function Cancel(){

        // user id
        $user_id = intval(I("cookie.id"), 0);
        if(!$user_id) $this->error("Invaild User");

        // show id
        $show_id = intval(I('get.id'), 0);
        
        // record
        $record_id = intval(I('get.record_id'), 0);
        if(!$user_id || !$show_id) $this->error("record dose not exist !");


        $map['show_id'] = $show_id;
        $map['user_id'] = $user_id;
        if($info = M($this->show_book_record)->where($map)->find()){

            // delete record
            M($this->show_book_record)->where(['id'=>$record_id])->delete();

            $ticket['ticket_price'] = $info['ticket_price'];
            $ticket['ticket_name'] = $info['ticket_type'];
            $ticket['show_id'] = $show_id;

            // capacity increase 1
            M($this->show_ticket_model)->where($ticket)->setInc('ticket_number', 1);

            $this->success("Cancel success!");
        }else{

            $this->error("You have not book this event, please check again!");
        }

    }

    public function my_publication(){
        // user id
        $user_id = intval(I("cookie.id"), 0);
        if(!$user_id) $this->error("Invaild User");

        $user_type = intval(I("cookie.type"), 0);
        if($user_type == 1){$this->error("You Are Normal User, Can not publsh event!");}


        // // select
        $all_records = M($this->show_modle) -> where(['show_owner'=>$user_id]) -> select();

        // // prcess
        $events_App = [];
        $events_Und = [];
        $events_NotApp = [];


        foreach ($all_records as $key => $value) {

            switch($value['show_status']){
                case '0' :
                     array_push($events_Und, $value);
                     break;
                case '1' :
                     array_push($events_App, $value);
                     break;
                case '2' :
                     array_push($events_NotApp, $value);
                    break;
                default :
                    array_push($events_Und, $value);
                    break;
            }
        }

        $this->assign('events_App', $events_App);
        $this->assign('events_Und', $events_Und);
        $this->assign('events_NotApp', $events_NotApp);
        $this->display();
    }



}