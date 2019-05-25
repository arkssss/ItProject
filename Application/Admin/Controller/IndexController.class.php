<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {

    protected $user_model = "user";
    protected $show_model = "show";

    public function index(){ 

        $user_id = intval(I("cookie.id"));
        $user_type = intval(I("cookie.type"));

        if(!$user_id || $user_type!='3'){
            $this->display('LogIn/index');
        }else{

            $total_user = M($this->user_model)->count();
            $total_events = M($this->show_model)->count();
            $user_info = M($this->user_model)->where(['id'=>$user_id])->find();

            $this->assign("total_user", $total_user);
            $this->assign("total_events", $total_events);
            $this->assign("user", $user_info);
            $this->display(); 
        }

    }

    public function LogIn(){
        $data['username'] = I("post.username");
        $data['password'] = I("post.password");

        $user_info = M($this->user_model)->where($data)->find();

        $ret = [];
        $ret['error'] = 1;

        if($user_info){

            $user_type = $user_info['type'];

            if($user_type == "3"){
                //success   
                $ret['error'] = 0;
                $ret['msg'] = "Log In Successful!";
                $ret['data'] = $user_info;
            }else {
                $ret['msg'] = "You Are Not Super User, Can Not Access";
            }
        }else {
            // error
            $ret['msg'] = "Account Dose Not Exist";
        }

        echo json_encode($ret);
        return;
    }



    public function event_tabel(){

        $all_events = M($this->show_model)->select();


        $this->assign("events", $all_events);
        $this->display('Index/pages_doc');
    }

    public function user_tabel(){

        $all_users = M($this->user_model)->select();

        $this->assign("users", $all_users);
        $this->display('Index/pages_user');
    }

    public function operate(){

        $id = intval(I('get.id'));
        $operate = intval(I('get.ope'));

        if(!$id || !$operate) {
            $this->error("Parameter error!");
        }
        $map['id'] = $id;
        $show_info = M($this->show_model)->where($map)->find();

        if(!$show_info){
            $this->error("Event Dose Not Exist!");
        }

        if($show_info['show_status'] != $operate){
            M($this->show_model)->where($map)->setField('show_status', $operate);
        }
        $this->success("Success");
    }

}