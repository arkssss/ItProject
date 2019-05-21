<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {

    protected $user_model = "user";

    public function Login(){

        
        if(IS_POST){

            $username = I('post.username');
            $password = I('post.password');


            $map['username'] = $username;
            $map['password'] = $password;

            $res = [];
            if($user_info = M('user')->where($map)->find()){

                $res['data'] = $user_info;
                $res['error'] = 0;
                $res['msg'] = "Log in success";

            }else{  
                $res['error'] = 1;
                $res['msg'] = "Account dose not exist, Please try again!";
            }

            // return  
            echo json_encode($res);

        }else{

            $this->display();
            
        }

        
    }

    public function Register(){

        if(IS_POST){

        $data['username'] = I('post.username');
        $data['password'] = I('post.password');
        $data['Confirmpassword'] = I('post.Confirmpassword');
        $data['phone'] = I('post.phone');
        $data['email'] = I('post.email');

        if($data['password'] != $data["Confirmpassword"]) {$this->error("Password and Confirmpassword are not equal");}

        // drop
        unset($data['Confirmpassword']);
        // var_dump($data);

        if(M('user')->add($data)){
            echo " <script> alert('register success');
            </script>";
            $herf = U('Login');
            header("Location: ".$herf.""); 
        
        }else{
            echo " <script> alert('register fail');
            </script>";
        }
    }else{
        $this->display();
    }
    }

    public function Profile(){

        $user_id = intval(I('cookie.id'), 0);
        if(!$user_id) $this->error("Invaild User");
        

        $user_info = M($this->user_model)->where(['id'=>$user_id])->find();

        switch($user_info['type']){
            case '1':
            $user_info['type'] = "Normal User";
            break;
            case '2':
            $user_info['type'] = "Event Announcer";
            break;
            case '3':
            $user_info['type'] =  "Super User";
            break;

        }


        $this->assign("user", $user_info);
        $this->display('User/Profile');

    }


}