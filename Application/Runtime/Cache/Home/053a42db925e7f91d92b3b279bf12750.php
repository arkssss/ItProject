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

    margin-top: 100px;   


}
.form-horizontal{
        width: 50%;
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
        <h2 class="text-center">Register</h2>
        <hr>


        <form class="form-horizontal" role="form" action="<?php echo U('Register');?>" method="POST">
                <div class="form-group">
                    <label for="firstname" class="control-label">UserName: </label>
                    <input name='username' type="text" class="form-control" id="firstname" required="required">
                </div>
                <div class="form-group">
                    <label for="lastname" class="control-label">Password: </label>
                    <input name='password' type="password" class="form-control" id="lastname" required="required"> 
                </div>
                <div class="form-group">
                        <label for="lastname" class="control-label">Confirm Password: </label>
                        <input name='Confirmpassword' type="password" class="form-control" id="lastname" required="required">
                </div>
                
                <div class="form-group">
                        <label for="lastname" class="control-label">Mobile: </label>
                        <input  name='phone' type="text" class="form-control" id="lastname" required="required">
                </div>

                <div class="form-group">
                        <label for="lastname" class="control-label">Emial: </label>
                        <input name='emial' type="text" class="form-control" id="lastname" required="required">
                </div>

                <div class="form-group">
                        <label for="name">User Type (Just for test so you type choose your type here)</label>
                        <select name='type' class="form-control">
                                <option value="1">Normal User</option>
                                <option value="2">Events Publisher</option>
                                <option value="3"> Super User</option>
                        </select>
                </div>

                <div class="form-group">
                        <button type="submit" class="center-block btn btn-default">Submit</button>
                </div>
                </form>

        </div>


</body>


</html>