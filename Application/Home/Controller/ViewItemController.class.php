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
        $events = M($this->show_modle)->select();
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


    // book the event   
    public function booking(){
        
        $ticket = I("post.ticket");
        $show_id = I("post.show_id");
        $user_id = intval(I("cookie.id"), 0);

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

        // select
        $all_records = M($this->show_book_record) -> where(['user_id'=>$user_id]) -> select();

        // prcess
        $coming_event = [];
        $pass_event = [];
        $curtDate = date("Y-m-d",time());
        foreach ($all_records as $key => $value) {
            $show_date = $value['show_date'];
            if($show_date < $curtDate){
                //pass event
                array_push($pass_event, $value);
            }else{
                array_push($coming_event, $value);
            }
        }

        $this->assign('pass_event', $pass_event);
        $this->assign('coming_event', $coming_event);

        $this->display();
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
        // $coming_event = [];
        // $pass_event = [];
        // $curtDate = date("Y-m-d",time());
        // foreach ($all_records as $key => $value) {
        //     $show_date = $value['show_date'];
        //     if($show_date < $curtDate){
        //         //pass event
        //         array_push($pass_event, $value);
        //     }else{
        //         array_push($coming_event, $value);
        //     }
        // }

        // $this->assign('pass_event', $pass_event);
        // $this->assign('coming_event', $coming_event);
        $this->assign('events', $all_records);

        $this->display();
    }



}