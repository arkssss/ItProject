<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>UOW EVENTS BOOKING SYSTEM</title>
<link rel="icon" href="favicon.ico" type="image/ico">
<meta name="author">
<link href="/SoaProject/Public/Admin/css/bootstrap.min.css" rel="stylesheet">
<link href="/SoaProject/Public/Admin/css/materialdesignicons.min.css" rel="stylesheet">
<link href="/SoaProject/Public/Admin/css/style.min.css" rel="stylesheet">

<script type="text/javascript" src="/SoaProject/Public/Admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/SoaProject/Public/Admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/SoaProject/Public/Admin/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="/SoaProject/Public/Admin/js/main.min.js"></script> 

<!-- common Js lib -->
<script src="/SoaProject/Public/JS/Base/function.js"></script>
<script src="/SoaProject/Public/JS/Base/jquery_cookie.js"></script>
<!-- Layer Js -->
<script type="text/javascript" src="/SoaProject/Public/Plugin/layer/layer.js"></script>
</head>
  
<body>
<div class="lyear-layout-web">
  <div class="lyear-layout-container">
    <!--左侧导航-->
    <aside class="lyear-layout-sidebar">
      
        <!-- logo -->
        <div id="logo" class="sidebar-header">
          <a href="<?php echo U('Index/index');?>"><img src="/SoaProject/Public/Brand/uow.png" title="LightYear" alt="LightYear" /></a>
        </div>
        <div class="lyear-layout-sidebar-scroll"> 
          
          <nav class="sidebar-main">
            <ul class="nav nav-drawer">
              <li class="nav-item active"> <a href="<?php echo U('Index/index');?>"><i class="mdi mdi-home"></i>Super User's Home</a> </li>
              <li class="nav-item nav-item-has-subnav">
  
                  <a href="javascript:void(0)"><i class="mdi mdi-palette"></i>Event</a>
                  <ul class="nav nav-subnav">
                      <li><a href="<?php echo U('Index/event_tabel');?>">Event Management</a></li>
                  </ul>
              </li>


              <li class="nav-item nav-item-has-subnav">
                <a href="javascript:void(0)"><i class="mdi mdi-format-align-justify"></i>User</a>
                <ul class="nav nav-subnav">
                  <li> <a href="<?php echo U('Index/user_tabel');?>">User Manegement</a> </li>
                </ul>
              </li>

            </ul>
          </nav>
          
          <div class="sidebar-footer">
            <p class="copyright">Copyright &copy; 2019</p>
            <p>Zhou Fang | James | Sachin | Xiang</p>
            <p>All rights reserved.</p>
          </div>
        </div>
        
      </aside>
    <!--End 左侧导航-->
    
    <!--头部信息-->
    <header class="lyear-layout-header">
      
        <nav class="navbar navbar-default">
          <div class="topbar">
            
            <div class="topbar-left">
              <div class="lyear-aside-toggler">
                <span class="lyear-toggler-bar"></span>
                <span class="lyear-toggler-bar"></span>
                <span class="lyear-toggler-bar"></span>
              </div>
              <span class="navbar-page-title">  </span>
            </div>
            
            <ul class="topbar-right">
              <li class="dropdown dropdown-profile">
                <a href="javascript:void(0)" data-toggle="dropdown">
                  <img class="img-avatar img-avatar-48 m-r-10" src="/SoaProject/Public/Face/face.svg" alt="" />
                  <span><?php echo ($user["username"]); ?><span class="caret"></span></span>
                </a>
                
                <ul class="dropdown-menu dropdown-menu-right">
                  <li class="_logout"> <a href="#"><i class="mdi mdi-logout-variant"></i> Log Out</a> </li>
                </ul>
  
  
              </li>
              <!--切换主题配色-->
              <li class="dropdown dropdown-skin">
                <span data-toggle="dropdown" class="icon-palette"><i class="mdi mdi-palette"></i></span>
                <ul class="dropdown-menu dropdown-menu-right" data-stopPropagation="true">
                  <li class="drop-title"><p>theme</p></li>
                  <li class="drop-skin-li clearfix">
                    <span class="inverse">
                      <input type="radio" name="site_theme" value="default" id="site_theme_1" checked>
                      <label for="site_theme_1"></label>
                    </span>
                    <span>
                      <input type="radio" name="site_theme" value="dark" id="site_theme_2">
                      <label for="site_theme_2"></label>
                    </span>
                    <span>
                      <input type="radio" name="site_theme" value="translucent" id="site_theme_3">
                      <label for="site_theme_3"></label>
                    </span>
                  </li>
                  <li class="drop-title"><p>LOGO</p></li>
                  <li class="drop-skin-li clearfix">
                    <span class="inverse">
                      <input type="radio" name="logo_bg" value="default" id="logo_bg_1" checked>
                      <label for="logo_bg_1"></label>
                    </span>
                    <span>
                      <input type="radio" name="logo_bg" value="color_2" id="logo_bg_2">
                      <label for="logo_bg_2"></label>
                    </span>
                    <span>
                      <input type="radio" name="logo_bg" value="color_3" id="logo_bg_3">
                      <label for="logo_bg_3"></label>
                    </span>
                    <span>
                      <input type="radio" name="logo_bg" value="color_4" id="logo_bg_4">
                      <label for="logo_bg_4"></label>
                    </span>
                    <span>
                      <input type="radio" name="logo_bg" value="color_5" id="logo_bg_5">
                      <label for="logo_bg_5"></label>
                    </span>
                    <span>
                      <input type="radio" name="logo_bg" value="color_6" id="logo_bg_6">
                      <label for="logo_bg_6"></label>
                    </span>
                    <span>
                      <input type="radio" name="logo_bg" value="color_7" id="logo_bg_7">
                      <label for="logo_bg_7"></label>
                    </span>
                    <span>
                      <input type="radio" name="logo_bg" value="color_8" id="logo_bg_8">
                      <label for="logo_bg_8"></label>
                    </span>
                  </li>
                  <li class="drop-title"><p>Top</p></li>
                  <li class="drop-skin-li clearfix">
                    <span class="inverse">
                      <input type="radio" name="header_bg" value="default" id="header_bg_1" checked>
                      <label for="header_bg_1"></label>                      
                    </span>                                                    
                    <span>                                                     
                      <input type="radio" name="header_bg" value="color_2" id="header_bg_2">
                      <label for="header_bg_2"></label>                      
                    </span>                                                    
                    <span>                                                     
                      <input type="radio" name="header_bg" value="color_3" id="header_bg_3">
                      <label for="header_bg_3"></label>
                    </span>
                    <span>
                      <input type="radio" name="header_bg" value="color_4" id="header_bg_4">
                      <label for="header_bg_4"></label>                      
                    </span>                                                    
                    <span>                                                     
                      <input type="radio" name="header_bg" value="color_5" id="header_bg_5">
                      <label for="header_bg_5"></label>                      
                    </span>                                                    
                    <span>                                                     
                      <input type="radio" name="header_bg" value="color_6" id="header_bg_6">
                      <label for="header_bg_6"></label>                      
                    </span>                                                    
                    <span>                                                     
                      <input type="radio" name="header_bg" value="color_7" id="header_bg_7">
                      <label for="header_bg_7"></label>
                    </span>
                    <span>
                      <input type="radio" name="header_bg" value="color_8" id="header_bg_8">
                      <label for="header_bg_8"></label>
                    </span>
                  </li>
                  <li class="drop-title"><p>LeftSide</p></li>
                  <li class="drop-skin-li clearfix">
                    <span class="inverse">
                      <input type="radio" name="sidebar_bg" value="default" id="sidebar_bg_1" checked>
                      <label for="sidebar_bg_1"></label>
                    </span>
                    <span>
                      <input type="radio" name="sidebar_bg" value="color_2" id="sidebar_bg_2">
                      <label for="sidebar_bg_2"></label>
                    </span>
                    <span>
                      <input type="radio" name="sidebar_bg" value="color_3" id="sidebar_bg_3">
                      <label for="sidebar_bg_3"></label>
                    </span>
                    <span>
                      <input type="radio" name="sidebar_bg" value="color_4" id="sidebar_bg_4">
                      <label for="sidebar_bg_4"></label>
                    </span>
                    <span>
                      <input type="radio" name="sidebar_bg" value="color_5" id="sidebar_bg_5">
                      <label for="sidebar_bg_5"></label>
                    </span>
                    <span>
                      <input type="radio" name="sidebar_bg" value="color_6" id="sidebar_bg_6">
                      <label for="sidebar_bg_6"></label>
                    </span>
                    <span>
                      <input type="radio" name="sidebar_bg" value="color_7" id="sidebar_bg_7">
                      <label for="sidebar_bg_7"></label>
                    </span>
                    <span>
                      <input type="radio" name="sidebar_bg" value="color_8" id="sidebar_bg_8">
                      <label for="sidebar_bg_8"></label>
                    </span>
                  </li>
                </ul>
              </li>
              <!--切换主题配色-->
            </ul>
            
          </div>
        </nav>
        
      </header>
      <script>
      
      $("._logout").click(function(){

            C_remove_user_cookies();
            self.location = "<?php echo U('Index/index');?>";

      })

      </script>
    <!--End 头部信息-->
    
    <!--页面主要内容-->
    <main class="lyear-layout-content">
      
      <div class="container-fluid">
        
          
          <div class="col-sm-6 col-lg-3">
            <div class="card bg-danger">
              <div class="card-body clearfix">
                <div class="pull-right">
                  <p class="h6 text-white m-t-0">Total Users</p>
                  <p class="h3 text-white m-b-0">1,314</p>
                </div>
                <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-account fa-1-5x"></i></span> </div>
              </div>
            </div>
          </div>
          
          <div class="col-sm-6 col-lg-3">
            <div class="card bg-success">
              <div class="card-body clearfix">
                <div class="pull-right">
                  <p class="h6 text-white m-t-0">Total Events</p>
                  <p class="h3 text-white m-b-0">520</p>
                </div>
                <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-arrow-down-bold fa-1-5x"></i></span> </div>
              </div>
            </div>
          </div>
          
        </div>
        
        <div class="row">
          
          <div class="col-lg-6"> 
            <div class="card">
              <div class="card-header">
                <h4>User Activity</h4>
              </div>
              <div class="card-body">
                <canvas class="js-chartjs-bars"></canvas>
              </div>
            </div>
          </div>
          
          <div class="col-lg-6"> 
            <div class="card">
              <div class="card-header">
                <h4>Events Pageviews</h4>
              </div>
              <div class="card-body">
                <canvas class="js-chartjs-lines"></canvas>
              </div>
            </div>
          </div>
           
        </div>
        
        <!-- <div class="row">
          
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>项目信息</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>项目名称</th>
                        <th>开始日期</th>
                        <th>截止日期</th>
                        <th>状态</th>
                        <th>进度</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>设计新主题</td>
                        <td>10/02/2019</td>
                        <td>12/05/2019</td>
                        <td><span class="label label-warning">待定</span></td>
                        <td>
                          <div class="progress progress-striped progress-sm">
                            <div class="progress-bar progress-bar-warning" style="width: 45%;"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>网站重新设计</td>
                        <td>01/03/2019</td>
                       <td>12/04/2019</td>
                        <td><span class="label label-success">进行中</span></td>
                        <td>
                          <div class="progress progress-striped progress-sm">
                            <div class="progress-bar progress-bar-success" style="width: 30%;"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>模型设计</td>
                         <td>10/10/2019</td>
                         <td>12/11/2019</td>
                        <td><span class="label label-warning">待定</span></td>
                        <td>
                          <div class="progress progress-striped progress-sm">
                            <div class="progress-bar progress-bar-warning" style="width: 25%;"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>后台管理系统模板设计</td>
                        <td>25/01/2019</td>
                        <td>09/05/2019</td>
                        <td><span class="label label-success">进行中</span></td>
                        <td>
                          <div class="progress progress-striped progress-sm">
                            <div class="progress-bar progress-bar-success" style="width: 55%;"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>前端设计</td>
                        <td>10/10/2019</td>
                        <td>12/12/2019</td>
                        <td><span class="label label-danger">未开始</span></td>
                        <td>
                          <div class="progress progress-striped progress-sm">
                            <div class="progress-bar progress-bar-danger" style="width: 0%;"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>桌面软件测试</td>
                        <td>10/01/2019</td>
                        <td>29/03/2019</td>
                        <td><span class="label label-success">进行中</span></td>
                        <td>
                          <div class="progress progress-striped progress-sm">
                            <div class="progress-bar progress-bar-success" style="width: 75%;"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>7</td>
                        <td>APP改版开发</td>
                        <td>25/02/2019</td>
                        <td>12/05/2019</td>
                        <td><span class="label label-danger">暂停</span></td>
                        <td>
                          <div class="progress progress-striped progress-sm">
                            <div class="progress-bar progress-bar-danger" style="width: 15%;"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>8</td>
                        <td>Logo设计</td>
                        <td>10/02/2019</td>
                        <td>01/03/2019</td>
                        <td><span class="label label-warning">完成</span></td>
                        <td>
                          <div class="progress progress-striped progress-sm">
                            <div class="progress-bar progress-bar-success" style="width: 100%;"></div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
        </div> -->
        
      </div>
      
    </main>
    <!--End 页面主要内容-->
  </div>
</div>



<!--图表插件-->
<script type="text/javascript" src="/SoaProject/Public/Admin/js/Chart.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    var $dashChartBarsCnt  = jQuery( '.js-chartjs-bars' )[0].getContext( '2d' ),
        $dashChartLinesCnt = jQuery( '.js-chartjs-lines' )[0].getContext( '2d' );
    
    var $dashChartBarsData = {
		labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
		datasets: [
			{
				label: 'User Activity',
                borderWidth: 1,
                borderColor: 'rgba(0,0,0,0)',
				backgroundColor: 'rgba(51,202,185,0.5)',
                hoverBackgroundColor: "rgba(51,202,185,0.7)",
                hoverBorderColor: "rgba(0,0,0,0)",
				data: [2500, 1500, 1200, 3200, 4800, 3500, 1500]
			}
		]
	};
    var $dashChartLinesData = {
		labels: ['2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014'],
		datasets: [
			{
				label: 'Pageviews',
				data: [20, 25, 40, 30, 45, 40, 55, 40, 48, 40, 42, 50],
				borderColor: '#358ed7',
				backgroundColor: 'rgba(53, 142, 215, 0.175)',
                borderWidth: 1,
                fill: false,
                lineTension: 0.5
			}
		]
	};
    
    new Chart($dashChartBarsCnt, {
        type: 'bar',
        data: $dashChartBarsData
    });
    
    var myLineChart = new Chart($dashChartLinesCnt, {
        type: 'line',
        data: $dashChartLinesData,
    });
});
</script>
</body>
</html>