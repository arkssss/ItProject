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

.cover{
    width: 200px;
    height: 200px !important;
}

body{
    margin-top: 70px !important;  
}

._item{
    margin: 20px 0;
}
    /* .event{

        height: 200px;

    }
    .cover{
        width: 300px;
        height: 300px;
    } */
/* #myCarousel{
    width: 70%;
} */
</style>



<body>

    
<style type="text/css">     

.navbar{
    padding: 0 200px; 
}

@media screen and (max-width: 600px){

.navbar{
    padding: 0;
}

.search{
    display: none;
}
.NarBar_brand{
    display: none;
}
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
                                <input id="key_word" type="text" placeholder="Search Your Event...">
                                <span id="_Search"></span>
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





    <div class="container">
        <!-- <div class="jumbotron">
             <h1>Booking center</h1>
             <p>Here are all the event below</p>
             <p>Designed by <strong><span class="text-info">Fangzhou</span></strong> & 
                <strong><span class="text-info">Sachin</span></strong> &
                <strong><span class="text-info">James</span></strong> &
                <strong><span class="text-info">Tang</span></strong></p>
             <p><a class="btn btn-primary btn-lg" role="button">
             about us</a>
           </p>
        </div> -->
        <div id="myCarousel" class="carousel slide">
                <!-- 轮播（Carousel）指标 -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>   
                <!-- 轮播（Carousel）项目 -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="/SoaProject/Public/Slides/3.jpg" alt="First slide">
                        <h2 class="carousel-caption">Sport</h2>
                    </div>
                    <div class="item">
                        <img src="/SoaProject/Public/Slides/2.jpg" alt="Second slide">
                        <h2 class="carousel-caption">Show</h2>
                    </div>
                    <div class="item">
                        <img src="/SoaProject/Public/Slides/1.jpg" alt="Third slide">
                        <h2 class="carousel-caption">Festival</h2>
                    </div>
                </div>
                <!-- 轮播（Carousel）导航 -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>


        <div class="_item panel panel-default">
            <div class="panel-body row">
            <!-- <div class="text-center _items col-lg-3"  style="background: url('/SoaProject/Public/Items/show.png') no-repeat;"></div>
            <div class="text-center _items col-lg-3"  style="background: url('/SoaProject/Public/Items/kid.png') no-repeat;"></div>
            <div class="text-center _items col-lg-3"  style="background: url('/SoaProject/Public/Items/opera.png') no-repeat;"></div>
            <div class="text-center _items col-lg-3"  style="background: url('/SoaProject/Public/Items/concert.png') no-repeat;"></div>
            <div class="text-center _items col-lg-3"  style="background: url('/SoaProject/Public/Items/Exhibition.png') no-repeat;"></div>-->
            <!-- <div class="text-center _items col-lg-3"  style="background: url('/SoaProject/Public/Items/text.svg') no-repeat;"></div>    -->
            <h2 class="text-center">All Event</h2>   
        </div> 
           
        </div>


        <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-success" role="progressbar"
                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                     style="width: 70%;">
                    <span class="sr-only">progressing</span>
                </div>
        </div>

        <div class="row _events">

            <!-- <div class="col-sm-6 col-md-3 event">
                <div class="thumbnail">
                   <img src="/SoaProject/Public/photo/1.png" 
                    alt="通用的占位符缩略图">
                   <div class="caption">
                       <h3>江小白“新大陆”</h3>
                       <p>布瑞吉Bridge x K ELEVEN 巡演 广州站</p>
                       <p>
                           <a href="<?php echo U('detail');?>" class="btn btn-primary" role="button">
                                show detail
                           </a> 
                           <a href="#" class="btn btn-default" role="button">
                                book
                           </a>
                       </p>
                   </div>
                </div>
           </div> -->

        </div>
    

     </div>
     <div class="_Hidden_foot" style="display:none">
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
        <p class="col-xs-12 col-lg-12 col-sm-12 text-center">CopyRight 2019 ©</p>
        <p class="text-info col-xs-12 col-lg-12 col-sm-12 text-center">ZhouFang & James & Sachin & Xiang</p>
    </div>
</div>

<!-- <script>
    $("._foot").css("button", 0);
</script> -->
    </div>
</body>

<script>

    // ajax 
    $(document).ready(function(){

        theurl = "<?php echo U('ViewItem/get_all_event');?>";

        // get all the Event
        $.post(
            theurl,
            function(res){
                events = JSON.parse(res);

                $.each(events, function(index, value){
                    // event append 
                    // console.log(value);
                    jump_url = "<?php echo U('ViewItem/detail');?>"
                    jump_url += "?id="+value.id+""

                    $("._events").append(
                                         '<div class="col-sm-6 col-md-3 event">'
                                    +    '<div class="thumbnail">'
                                    +    '<img class="cover img-responsive" src="/SoaProject/Public/photo'+value.show_cover+'" alt="">'
                                    +    '<div class="caption">'
                                    +    '<h3>'+value.show_name+'</h3>'
                                    +    '<p>'
                                    +     _substring(value.show_detail, 20)
                                    +    '</p>'
                                    +    '<p>'
                                    +    'Event   Date: '
                                    +     value.show_time
                                    +    '</p>'
                                    +    '<p class="text-danger">'
                                    +    'At Least : $'
                                    +    value.show_lowest_price
                                    +    '</p>'
                                    +    '<p>'
                                    +    '<a href="'+jump_url+'" class="btn btn-primary" role="button">'
                                    +    'show detail'
                                    +    '</a>'
                                    +    '</p>'
                                    +    '</div>'
                                    +    '</div>'
                                    +    '</div>'
                                    )           
                    })

                    // append end;
                    $("._Hidden_foot").css("display", "block");
                    $(".progress").css("display","none");



            }
        )
    })

    


    function _substring(_string, num){

        if(_string.length > num){
            _string = _string.substring(0, num) + "...";
        } 
        return _string

    }

</script>

</html>