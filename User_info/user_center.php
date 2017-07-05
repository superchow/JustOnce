<?php 
//使用session
session_start();
include '../PHP/db.php';
print_r($_POST);
$tel=$_POST['user'];
$myDB=new db("student");
$result=$myDB->find("select * from student where tel='$tel'");
if($result['username']!=null){
	$username=$result['username'];
}else{
	$username=$result['tel'];
	echo "$username";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Author" content="">
    <link rel="stylesheet" type="text" href=".css">
    <style type="text/css">
    /*导航栏*/
  		*{margin:0; padding:0; font-family:"微软雅黑";}
	    a{text-decoration: none; color: #000;}
	    nav{width: 100%; height: 50px;background:#0DBBA1; position: fixed; top: 0;z-index: 100;}
	    #navContent{width:1100px; margin: 0 auto;overflow:hidden;}
	    #navContent>ul{ float:left;list-style-type:none; margin:0px;padding:0px;}
			#navContent>ul li{ float:left;width:80px;height:50px;font-size:17px;text-align:center;line-height:50px;}
			#navContent>ul li:hover{background:#079F88;}
			#navContent #nav_logo{font-size: 17px;width: 120px;}
			#nav_right{float: right;font-size: 17px;line-height:50px;height:50px;}
			#nav_right a{display:inline-block;text-align:center;width:70px;vertical-align:middle;}
			#nav_right input{border-radius:5px;position:relative;border:none;}
			#USER_INFO{display:inline-block;height:50px;line-height:50px;font-size:14px;}
			#USER_INFO a{display:inline-block;height:50px;}
			#USER_INFO a div{display:inline-block;overflow:hidden;height:40px;width:40px;border-radius:50%;margin-top:2px;}
			#USER_INFO a img{height:40px;width:40px;vertical-align:middle;}
		/*主体*/
			#warp{width:1100px;position:relative;}
		/*左侧*/
			
    </style>
	<title>个人中心</title>
</head>
<body>
<!-- 导航栏 -->
<nav>
	<div id="navContent">
		<ul>
			<li id="nav_logo"><a href="#" style="color: #fff;">Just Once</a></li>
			<li><a href="#">首页</a></li>
			<li><a href="#">题库</a></li>
			<li><a href="#">求职</a></li>
			<li><a href="#">讨论</a></li>
		</ul>
		<div id="nav_right">
		    <a href="#">搜索</a>
		    <input type="text">
		    <button style="display:none;"><a href="../login.html">登录/注册</a></button>	
			<div id="USER_INFO">
				<a href="user_center.php">
					<div class="a-img"><img src="../images/user/1164480.png" alt="用户头像"></div>
					<div style="display:none;"></div>
				</a>
			</div>
		</div>
	</div>
</nav>
<div id="warpper">
<!-- 侧边栏 -->
	<div id="left_silde">
		<ul class="nav" id="side-menu">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
<!-- 内容框 -->
	<iframe src="" frameborder="0">
	</iframe>
</div>
</body>
</html>