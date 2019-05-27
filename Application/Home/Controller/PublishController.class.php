<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
class PublishController extends Controller {

    protected $show_model = "show";
    protected $show_price_model = "show_ticket";
    protected $show_record_model = "book_record";

    public function index(){

        if(IS_POST){
            // User Ver
            $user_id = intval(I("cookie.id"), 0);
            if(!$user_id) {
                $res['error'] = 1;
                $res['msg'] = "Please LogIn First!";
                echo json_encode($res);
                return;
            };

            //  save if Post
            $data = I("post.");
            $data['show_owner'] = $user_id;

            // tickets
            $ticket_data = $data['show_tickets'];

            // delete key of show_ticket
            unset($data['show_tickets']);
            
            $res = [];
            
            $show_model = M($this->show_model);
            $show_ticket_model = M($this->show_price_model);

            // start
            $show_model->startTrans();
            $id = $show_model->add($data);
            if($id){
                // save ticket
                $datalist = [];
                foreach ($ticket_data as $key => $value) {
                    array_push($datalist, array(
                        'show_id'       => $id,
                        'ticket_price'  => $value['price'],
                        'ticket_name'   => $value['name'],
                        'ticket_detail' => $value['detail'],
                        'ticket_number' => $value['number'],
                    ));
                }
                $add_tag = $show_ticket_model->addAll($datalist);
                // success
                if($add_tag){
                    $show_model->commit();
                    $res['error'] = 0;
                    $msg = "Publication success!";
                }else{

                    $res['error'] = 1;
                    $msg = "Something wrong, try again!";
                    $show_model->rollback();
                }
            }else{

                $res['error'] = 1;
                $msg = "Something wrong, try again!";

            }

            $res['msg'] = $msg;
            echo json_encode($res);
            
        }else{

            $this->display();
        
        }


    }

    // edit the event
    public function adjust(){

        if(IS_POST){
            // save

            $user_id = intval(I("cookie.id"), 0);
            $data = I('post.');
            

            $tickets = $data['show_tickets'];
            unset($data['show_tickets']);


            M($this->show_model)->where(['id'=>$data['id']]) ->save($data);


            //save 
            foreach ($tickets as $key => $value) {

                $ticket_data['ticket_price'] = $value['price'];
                $ticket_data['ticket_name'] =  $value['name'];
                $ticket_data['ticket_detail']  =$value['detail'];
                $ticket_data['ticket_number'] = $value['number'];

                $map['id'] = $value['id'];
                M($this->show_price_model)-> where($map) -> save($ticket_data);
            
            }


            $record_save['show_date'] = $data['show_time'];
            $record_save['show_name'] = $data['show_name'];
            M($this->show_record_model)->where(['show_id'=>$data['id']])->save($record_save);

            $ret['error'] = 0;
            $ret['msg'] = 'Adjust Success!';

            echo json_encode($ret);
            return;


        }else {

            $user_id = intval(I("cookie.id"), 0);

            $show_id = intval(I("get.id"), 0);
            if(!$show_id) {$this->error("Event dose not exist");}

            $show_info = M($this->show_model)->where(['id'=>$show_id,'show_owner'=>$user_id])->find();
            if(!$show_info) {$this->error("Event dose not exist");}

            $ticket_info = M($this->show_price_model)->where(['show_id'=>$show_id])->select();

            // var_dump($show_info);
            //assign
            $this->assign("event", $show_info);
            $this->assign("tickets", $ticket_info);

            $this->display();
            
        }

    }

    // upload image 
    public function upload(){

    $upload = new Upload(C("EVENTCOVER"));

    $info = $upload->upload();

    $ret = [
        "errno" => 0,
        "data"  => [
        ],
    ];
    if(!$info) {
        echo $this->error($upload->getError());
        $ret['errno'] = 1;
        // $ret
    }else{
        foreach($info as $file){
            array_push($ret['data'],C("TMPL_PARSE_STRING.__Uploads__")."/".$file['savepath'].$file['savename']);
        }
        
    }
    echo json_encode($ret);

    }

}