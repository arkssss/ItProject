<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>UOW booking center</title>
<meta http-equiv="imagetoolbar" content="no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<!-- JQ库 -->
<!-- <script src="http://www.jq22.com/jquery/1.11.1/jquery.min.js"></script> -->
<!--[if IE]>
    <script src="http://libs.baidu.com/html5shiv/3.7/html5shiv.min.js"></script>
<![endif]-->
<!-- 引入在线的BS库 -->
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
<!-- 引入在线的JQ库 -->
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- common Js lib -->
<script src="/SoaProject/Public/JS/Base/function.js"></script>
<script src="/SoaProject/Public/JS/Base/jquery_cookie.js"></script>
<!-- Layer Js -->
<script type="text/javascript" src="/SoaProject/Public/Plugin/layer/layer.js"></script>
<!-- 图标 -->
<link href="http://www.jq22.com/jquery/font-awesome.4.6.0.css" rel="stylesheet">


<style>

.my_login{

    margin-top: 200px;
    width: 30%;    
    min-height: 650px;


}
.my_login_group{
    margin: 0 auto !important;  
    width: 30%;
   
}

</style>


</head>

<body>
    
<style type="text/css">     

.navbar{
    padding: 0 200px; 
}

.nav{
    width: 80%;
}

.navbar-nav li{
    margin: 0 20px;
}
.navbar-header{
    width: 20%;
}
.NarBar_brand{
            /* margin-top: 3px;  */
            width:50%; 
            /* transform: rotate(-90deg); */
}
.collapse{
    margin-top:2px;
}
</style> 

<!-- Search -->
<link rel="stylesheet" href="/SoaProject/Public/CSS/Search.css">  

<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container-fluid"> 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#example-navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="/SoaProject/Public/Brand/uow_4.png" class="NarBar_brand">
            <!-- <a class="navbar-brand" href="#"><strong><span class="text-info">UOW Booking Center</span></strong></a> -->
        </div>
        <div class="collapse navbar-collapse" id="example-navbar-collapse">
            <ul class="nav navbar-nav">


                <li><a href="<?php echo U('ViewItem/index');?>">
                    <i class="glyphicon glyphicon-th-list"></i>
                    All Events</a></li>
                    
                <li class="_Publish" style="display:none;"><a href="<?php echo U('Publish/index');?>">
                        <i class="glyphicon glyphicon-plus-sign"></i>
                        Publish Event</a></li>  

                <li class="_HasIn dropdown pull-right"  style="display: none">    
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span class="_username"></span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">

                        <li><a href="<?php echo U('ViewItem/my_order');?>">My Events</a></li>
                        <li class="_MyPublication" style="display:none"><a href="<?php echo U('ViewItem/my_publication');?>">My publication</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo U('User/Profile');?>">Profile</a></li>
                        <li class="divider"></li>
                        <li class="_logout"><a href="#">Logout</a></li>
                    </ul>
                </li>




                <li class="_NotIn pull-right" style="display: none; margin: 0">
                    
                        <a href="<?php echo U('User/Register');?>">
                                Register 
                        </a>
                </li>    
                
                <li class="_NotIn pull-right" style="display: none ; margin: 0">
                    
                        <a href="<?php echo U('User/Login');?>">
                         LogIn
                        </a>
                </li> 


  



                <div class="search d7">
                        <form>
                            <!-- <div> -->
                                <input id="key_word" type="text" placeholder="Search Your Event...">
                                <span id="_Search"></span>
                            <!-- </div> -->
                        </form>
                        </div>
                </div>

            </ul>
        </div>
        </div>
</nav>

<script>
    $(document).ready(function(){
        var user_id = $.cookie('id');
        // var url = "<?php echo U('LogIn/EditProfile');?>"
        if(has_login(false)){

            $("._HasIn").css("display",'block');

            // set info
            $("._username").text($.cookie('username'))
            
        }else{
            $("._NotIn").css('display','block');
        }

        switch($.cookie('type')){
            case '1' : 
                // Norm 
                
            break;
            case '2' : case '3':
                // 
                $("._Publish").css('display', 'block');
                $("._MyPublication").css('display','block');
            break;
            default : 
            break;
            
        }
        

        // logout 
        $("._logout").click(function(){
            C_remove_user_cookies();
            self.location = "<?php echo U('ViewItem/index');?>";

        })

        // click
        $("#_Search").click(function(){
            var key_word = $("#key_word").val();
            if(!key_word) {
                return;
            }
            theurl = "<?php echo U('ViewItem/searchres');?>";
            theurl += "?key_word="+key_word+"";
            self.location = theurl;
        })


    })
</script>


    <div class="container my_login">
        <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="firstname" class="control-label">UserName: </label>
                    <input type="text" class="form-control" id="firstname" name = "username">
                </div>
                <div class="form-group">
                    <label for="lastname" class="control-label">PassWord: </label>
                    <input type="password" class="form-control" id="lastname" name = "password">
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                        <input type="checkbox">remember me
                        </label>
                    </div>
                    </div>
                </div>
            </form>
                <div class="form-group my_login_group">
                    <div class="col-sm-2 col-sm-10">
                    <button type="submit" id='login_submit' class="btn btn-default">Login</button>
                    </div>
                </div>


        </div>
<style type="text/css"> 
    ._foot{
        /* margin-top: 30px; */
        background-color:black;
        padding: 10px 0px;
        min-height: 80px;
        color: white !important;
        /* position: absolute; */
        /* bottom: 0; */
        width: 100%; 
        left: 0;
        /* overflow:hidden; */
    }
    ._foot p{
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif !important;
        font-size: 14px !important;
        line-height: 1.42857143 !important;
        margin: 0 0 10px;
        width: 100%;
    }
</style>

<div class="_foot">
    <div class="row">
        <p class="col-xs-12 col-lg-12 col-sm-12 text-center">CopyRight 2019 - 2119 ©</p>
        <p class="text-info col-xs-12 col-lg-12 col-sm-12 text-center">ZhouFang & James & Sachin & Xiang</p>
    </div>
</div>

<!-- <script>
    $("._foot").css("button", 0);
</script> -->

</body>


<script>

    $(document).ready(function(){
        

        $("#login_submit").click(function(){
            $(this).attr('disabled','disabled')
            $.post(
                "<?php echo U('User/Login');?>",
                {
                    'username' : $("#firstname").val(),
                    'password' : $("#lastname").val()
                },
                function(res){
                    // console.log(res)s    
                    res = JSON.parse(res);
                    if(!res.error){
                        // success 
                        // store into cookies
                        C_set_user_cookies(res['data']);
                        layer.alert(res.msg, {skin: 'layui-layer-lan', title :'UOW BOOKING'},
                            function(){
                                //关闭登陆model
                                self.location = "<?php echo U('ViewItem/index');?>"
                            }
                        );
                        
                    }else{
                        layer.alert(res.msg, {skin: 'layui-layer-lan', title :'UOW BOOKING'})
                    }
                    $('#login_submit').removeAttr('disabled')
                },
                );

        })


    })




</script>







</html>