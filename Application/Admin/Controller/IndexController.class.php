<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {

    protected $user_model = "user";

    public function index(){ 

        $user_id = intval(I("cookie.id"));
        $user_type = intval(I("cookie.type"));

        if(!$user_id || $user_type!='3'){
            $this->display('LogIn/index');
        }else{
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

}