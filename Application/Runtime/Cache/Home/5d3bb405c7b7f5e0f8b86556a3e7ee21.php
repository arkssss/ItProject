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


<link href="/SoaProject/Public/Home/TimePick/css/rome.css" rel="stylesheet">


<style>
._from{
    width: 60%;
    margin: 50px auto;
}
#detail, #purchase{
    height: 200px;
}

</style>
</head>
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


    <h3 class="text-center">Publish an Event</h3>
    <div class="container">

        <form class="_from" role="form">

                <div class="form-group">
                    <label for="name">Event Name: </label>
                    <input type="text" required="required" class="form-control" id="name" placeholder="please input your event name">
                </div>

                <div class="form-group">
                        <label for='d'>Pick Your Event Date: </label>
                        <br>
                        <input id='d' class='input' />
                </div>

                <div class="form-group">
                        <label for='d'>Pick Showtimes: </label>
                        <br>
                        <input id='t' class='input' />
                </div>
                
                <div class="form-group">
                        <label for="Address">Event Address: </label>
                        <input type="text" class="form-control" id="Address" placeholder="please input your event addres"> 
                </div>

                <div class="form-group">
                        <label for="tel">Event tel: </label>
                        <input type="text" class="form-control" id="tel" placeholder="please input your tel">
                </div>
                
                <div class="form-group">
                        <label for="coupon">coupon code: </label>
                        <input type="text" class="form-control" id="coupon" placeholder="please input your coupon code">
                </div>

                <div class="form-group _price">
                        <label for="Ticket">Ticket Price ($): </label> 
                        <span  style="margin-left:20px" class="btn btn-primary add_price" data-toggle="modal" data-target="#myModal">Add a Type of Ticket</span>


                        <!-- <div style="margin-top:20px" class="panel panel-default">
                                <div class="panel-heading">
                                        <h4>VIP Ticket</h4>
                                </div>
                                <div class="panel-body">
                                        <p>Ticket Price : $12</p>
                                        <p>Ticket Numbers: 100</p>
                                        <p>Ticket Detail : No</p>
                                            
                                    <span class="btn btn-info">Edit</span>
                                    <span class="_ticket_remove btn btn-danger">Remove</span>
                                </div>
                        </div> -->
                        
                        
                </div>

                <label for="drop_area">Cover Image: </label>
                <div id="preview"><img src="/SoaProject/Public/Home/ImageUpload/upload.png" class="img-responsive"  style="width: 100%;height: auto;" alt="" title=""></div>
                <div id="drop_area" url=""></div>

                <div class="form-group">
                        <label for="tel">Event Detail: </label>
                        <textarea class="form-control" id="detail"> </textarea>
                </div>

                <div class="form-group">
                        <label for="tel">purchase description: </label>
                        <textarea class="form-control" id="purchase"> </textarea>
                </div>
                </form>
                <button id='_Submit' class="btn btn-default center-block">Submit</button>

    </div>


    <!-- model -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-info" id="myModalLabel">Ticket Information</h4>
                </div>
                <div class="modal-body">

                        <form class="form-horizontal" role="form">

                                <div class="form-group">
                                        <label for="ticket_name" class="col-sm-3 control-label">Ticket Name: </label>
                                        <div class="col-sm-9">
                                          <input type="text" class="_ticket_model form-control" id="ticket_name">
                                        </div>
                                </div>

                                <div class="form-group">
                                  <label for="ticket_price" class="col-sm-3 control-label">Ticket Price: </label>
                                  <div class="col-sm-9">
                                    <input type="text" class="_ticket_model form-control" id="ticket_price">
                                  </div>
                                </div>

                                <div class="form-group">
                                        <label for="ticket_number" class="col-sm-3 control-label">Number of Tickets: </label>
                                        <div class="col-sm-9">
                                          <input type="text" class="_ticket_model form-control" id="ticket_number">
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="ticket_detail" class="col-sm-3 control-label">Ticket Detail: </label>
                                        <div class="col-sm-9">
                                            <textarea class="_ticket_model form-control" id="ticket_detail"> </textarea>
                                        </div>
                                       
                                </div>

                        </form>


                </div>
                <div class="modal-footer">
                    <button type="button" id="_ticket_cancel" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="_ticket_submit" class="btn btn-primary">Add</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

</body>

<script type="text/javascript" src="/SoaProject/Public/Home/TimePick/js/rome.js"></script>
<script type="text/javascript" src="/SoaProject/Public/Home/ImageUpload/upload.js"></script>
<script>


    // clean the ticket model
    function clean_model(){

        $("._ticket_model").val("")

    }

    $(document).ready(function(){   


        $("#_ticket_cancel").click(function(){
            clean_model()
        })

        $("#_ticket_submit").click(function(){

            var ticket_name   = $("#ticket_name").val();
            var ticket_price  = $("#ticket_price").val();
            var ticket_number = $("#ticket_number").val();
            var ticket_detail = $("#ticket_detail").val();
            
            // validate number
            if(isNaN(ticket_price) || isNaN(ticket_number) || !ticket_price || !ticket_number) {
                alert("There are must be a number")
                return;
            }   

            $("._price").append('<div style="margin-top:20px" class="_ticket_tags panel panel-default">'
                                + '<div class="panel-heading">'
                                + '<h4 class="ticket_name">'+ticket_name+'</h4>'
                                + '</div>'
                                + '<div class="panel-body">'
                                + '<p class="ticket_price">Ticket Price : $<span>'+ticket_price+'</span></p>'
                                + '<p class="ticket_number">Ticket Numbers: <span>'+ticket_number+'</span></p>'
                                + '<p class="ticket_detail">Ticket Detail : <span>'+ticket_detail+'</span> </p>'      
                                // + '<span style="margin-right:10px" class="btn btn-info">Edit</span>'
                                + '<span class="btn btn-danger _ticket_remove">Remove</span>'
                                + '</div>'
                                + '</div>')
            
            // bind
            $("._ticket_remove").on('click', function(){
                $(this).parent().parent().remove()
            })

            // clean                      
            clean_model()
            // drop model
            $("#myModal").modal('toggle')
            
        })

        


        // date pick up
        rome(d, { time: false });  
        
        // time pick up
        rome(t, { date: false }); 


        // image upload
        var dragImgUpload = new DragImgUpload("#preview","#drop_area",{
            callback:function (files) {
                //回调函数，可以传递给后台等等
                var file = files[0];
                console.log(file.name);
                var formData = new FormData();
                formData.append("importFilePath",file );
                formData.append("folderId",file.name);
                formData.append("softType",file.type);
                if(!/\.(gif|jpg|jpeg|png|GIF|JPG|PNG)$/.test(file.name))
                {
                    alert("please upload a image!")
                    return false;
                }else{
                    $.ajax({
                        url: "<?php echo U('Publish/upload');?>",
                        type:'POST',
                        contentType: false,
                        processData: false,
                        data: formData, 
                        success:function(data,textstatus){
                            data = JSON.parse(data)
                            if(!data.error){
                                // no error 
                                $("#drop_area").attr("url",data.data)
                            }else{
                                alert("something wrong with the sever! please try later!")
                            }
                        }
                    });
                }
            }
        })


        //submit 
        $("#_Submit").click(function(){
            

            var ticket_prices = $("._ticket_tags")
            var length = ticket_prices.length
            var tickets = {}
            var lowest_price ;
            // add tickets
            for(var i=0; i<length;i++){
                
                var Elem = ticket_prices[i]
                var panel_heading = $(Elem).children(".panel-heading")
                var panel_body = $(Elem).children(".panel-body")
                tickets[i] = { 
                    'name' :   $(panel_heading).children(".ticket_name").text(),
                    'price':   $(panel_body).children(".ticket_price").children().text(),
                    'number' : $(panel_body).children(".ticket_number").children().text(),
                    'detail' : $(panel_body).children(".ticket_detail").children().text(),
                } 
                if(!i) {
                    lowest_price = parseInt(tickets[i]['price']) 
                    continue;
                } 
                if(lowest_price > parseInt(tickets[i]['price'])) lowest_price = parseInt(tickets[i]['price'])

            }

            data = {
                'show_name' : $("#name").val(),
                'show_time' : $("#d").val(),
                'show_times': $("#t").val(),
                'show_place': $("#Address").val(),
                'show_tel'  : $("#tel").val(),
                'show_cover': $("#drop_area").attr("url"),
                'show_detail' : $("#detail").val(),
                'show_purchase_des' : $("#purchase").val(),
                'show_tickets' : tickets,
                'show_lowest_price' : lowest_price,
                'coupon' : $('#coupon').val(),
            }

           
            // validate code if have time
            if(!data['coupon'] || !data['show_name'] || !data['show_time'] || !data['show_times'] || !data['show_place'] || !data['show_tel'] || !data['show_cover'] || !data['show_detail'] || !data['show_purchase_des']){
                alert("Please Fill All The Infomation!")
                return;
            }

            var theurl = "<?php echo U('Publish/index');?>"
            $.post(
                theurl,
                data,
                function(res){
                    res = JSON.parse(res)
                    // console.log(res)
                    if(!res.error){
                        // success
                        location.href = "<?php echo U('ViewItem/index');?>"
                    }
                    alert(res.msg);
                    
                }

            )

        })  
    })



</script>

</html>