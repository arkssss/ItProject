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



</head>
<style>
body{
    margin-top : 70px !important;
}
._main_frame{
    margin-bottom: 200px;
}
</style>

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


<div class="_main_frame container">



<div class="row">
        <div class="row col-sm-8 col-md-8">
                <div class="thumbnail col-md-5 col-sm-5">
                    <img src="/SoaProject/Public/photo<?php echo ($event["show_cover"]); ?>"
                    alt="">
                </div>

                <div class="caption pull-right col-sm-6 col-md-6 ">
                        <span id="show_id" style="display:none"><?php echo ($event["id"]); ?></span>
                        <h3><?php echo ($event["show_name"]); ?></h3>
                        <hr>
                        <h4 class="text-info">Event Information</h4>
                        <p id="show_date">Event Date : <?php echo ($event["show_time"]); ?></p>
                        <p>Event Time : <?php echo ($event["show_times"]); ?></p>
                        <p>Event Location :  <?php echo ($event["show_place"]); ?></p>
                        <p>Event Tel : <?php echo ($event["show_tel"]); ?></p>
                        <hr>    
                        <h4 class="text-info">Tickets Information</h4>
                        <p class="_price_tags">
                            <?php if(is_array($tickets)): $i = 0; $__LIST__ = $tickets;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span style="margin-right:10px" class='btn btn-default _ticket' type="<?php echo ($vo["ticket_name"]); ?>" role="button"><?php echo ($vo["ticket_price"]); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
                            <?php if(is_array($tickets)): $i = 0; $__LIST__ = $tickets;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="margin-top:10px; display: none" class="panel panel-success _ticket_div" id="<?php echo ($vo["ticket_name"]); ?>">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <?php echo ($vo["ticket_name"]); ?>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                            <p>Remaining Tickets:  <?php echo ($vo["ticket_number"]); ?></p>
                                            <p>Ticket detail: <?php echo ($vo["ticket_detail"]); ?></p>
                                    </div>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>

                        </p>
                        <hr>    
                        <h4 class="text-info">Booking Now</h4>
                        <p>
                            <span href="#" class="btn btn-success _Booking" role="button">
                                Booking
                            </span> 
                        </p>
                </div>
        </div>
</div>


<h3 class="text-info">More Information</h3>
<hr>    
<ul id="myTab" class="nav nav-tabs">
    <li class="active">
        <a href="#home" data-toggle="tab">Event's Detial</a>
    </li>
    <li><a href="#ios" data-toggle="tab">Purchase Description</a></li>
</ul>
<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="home">
        <h3 class="text-danger">Detail</h3>
        <hr>
        <p> 
            <?php echo ($event["show_detail"]); ?>
        </p>
    </div>
    <div class="tab-pane fade" id="ios">
        <h3 class="text-danger">About Purchase</h3>
        <hr>
            <?php echo ($event["show_purchase_des"]); ?>
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

        $("._ticket").click(function(){

            var div_id = $(this).attr("type");
            
            $("._ticket").removeClass('btn-success curtTicket');
            $(this).addClass("btn-success curtTicket");

            $("._ticket_div").css("display","none");
            $("#"+div_id+"").css("display","block");

        })

        // booking 
        $("._Booking").click(function(){
            $(this).attr('disabled','disabled')
            var curtTicket = $(".curtTicket").text();
            if(!curtTicket) {
                alert("Please select a type of ticket first")
                $("._Booking").removeAttr('disabled')
                return;
            }
            var show_id = $("#show_id").text();

            var theurl = "<?php echo U('ViewItem/booking');?>"
            $.post(
                theurl,
                {
                    'show_id' : show_id,
                    'ticket'  : curtTicket,
                },
                function(res){
                    res = JSON.parse(res)
                    if(res.error){
                        // success
                        layer.alert(res.msg, {skin: 'layui-layer-lan', title :'UOW BOOKING'},
                        function(){
                                //关闭登陆model
                                location.reload();
                            }
                        );
                    }else{
                        // error
                        layer.alert(res.msg, {skin: 'layui-layer-lan', title :'UOW BOOKING'})
                    }
                    $("._Booking").removeAttr('disabled')
                }
            )
        })

    })
</script>



</html>