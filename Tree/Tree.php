<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>题库</title>
	<!-- 1.引入样式文件 -->
	<link rel="shortcut icon" type="image/x-icon" href="ztree/ztree/zTreeStyle/img/JustOnce.jpg" />
	<link rel="stylesheet" href="ztree/zTreeStyle/zTreeStyle.css" type="text/css">
	<!-- 2.引入ztreejs文件 -->
	<script type="text/javascript" src="ztree/jquery-1.4.4.min.js"></script>
	<!-- 3.引入核心文件 -->
	<script type="text/javascript" src="ztree/jquery.ztree.core.js"></script>
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
			p{padding-top: 30px;padding-bottom: 30px;}
		/*页脚*/
		/*#footer{background-color: #3d444c;width:100%;font-size:16px;position: fixed;bottom: 0px;}
		#wrap_foot{width: 1100px; height:180px;margin:0 auto;}
		.foot_left{margin-left:250px;text-align: center;line-height: 40px; float: left;}
		.foot_left img{width: 150px;margin-top: 10px;}
		.foot_center a{padding: 3px;border-radius: 4px;background: #313131;cursor: pointer;margin-left: 5px; color: #ddd;}
		.foot_center{margin-left:80px;float: left;}
		.foot_center span{display:inline-block;margin-top:20px;}
		.foot_right{margin-left:80px;text-align: center;width:180px;height:120px;line-height: 30px;margin-top:20px;float: left;border-left: 2px solid #aaa;}
			*/
		/*右侧内容*/
		.show_subject{
			background-color: red;
		}
    </style>
</head>
<body>
	<!-- 导航栏 -->
<nav>
	<div id="navContent">
		<ul>
			<li id="nav_logo"><a href="#" style="color: #fff;">Just Once</a></li>
			<li><a href="http://www.wangliguang.com/JustOnce/index.html">首页</a></li>
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
	
	<div style="height: 100%;">
		<table border=0 height=600px align=left>
		<tr>
			<!-- 存放树菜单 -->
			<td width=266px align=left valign=top style="border-right: #999999 1px dashed;"><ul id="treeDemo" class="ztree" style="width:260px; overflow:auto; position: absolute; top: 55px;left: 100px;font-size: 20px;"></ul></td>
			<!-- 放对应显示的内容 -->
			<td width=1100px align=left valign=top style="position: absolute; top: 55px;"><iframe ID="testIframe" Name="testIframe" frameborder="" =0 scrolling="" =auto width=100%  height=600px src="" frameborder="0"></iframe></td>
		</tr>
	</table>
	</div>



	<!-- 
		ul就是树菜单的容器
		id表示ul，可以自己命名
		class样式，必须为ztree
	-->

	<script>
	
	function setNextCss(treeId, treeNode) {
	return treeNode.level == 1 ? {color:"#f1879b"} : {};
	};
	//5.配置树菜单内容
	var setting = {
		view:{
			//是否显示连接线
			showLine: false,
			//是否可多选
			selectedMulti: false,
			//节点为红色
			fontCss : {color:"#02979e"},
			fontCss: setNextCss,
			//动画速度
			expandSpeed: "slow"
		},
		//事件回调
		callback:{
			//点击之前调用
			//treeId容器的id
			//treeNode点击到的节点
			beforeClick:function (treeId,treeNode,flag) {
				//找到树节点对象
				var ztree = $.fn.zTree.getZTreeObj(treeId);
				if(treeNode.isParent){
					//打开或折叠指定节点
					ztree.expandNode(treeNode);
					//不响应点击事件
					return false;
				}else{
					$("#testIframe").attr("src",treeNode.file);
					//响应点击事件
					return true;
				}
			}
		}
	};

	var zNodes = [

		{name:"HTML",open:true,
			children:[
				{name:"初级",file:"ztree/h5_a.php"},
				{name:"中级",file:"ztree/h5_b.php"},
				{name:"高级",file:"ztree/h5_c.php"}
			]
		},
		{name:"CSS",isParent:true,
			children:[
				{name:"初级",file:"ztree/css3_a.php"},
				{name:"中级",file:"ztree/css3_b.php"},
				{name:"高级",file:"ztree/css3_c.php"}
			]
		},
		{name:"JavaScript",isParent:true,
			children:[
				{name:"初级",file:"ztree/js_a.php"},
				{name:"中级",file:"ztree/js_b.php"},
				{name:"高级",file:"ztree/js_c.php"}
			]
		},
		{name:"XML",isParent:true,
			children:[
				{name:"初级",file:"ztree/xml_a.php"},
				{name:"中级",file:"ztree/xml_b.php"},
				{name:"高级",file:"ztree/xml_c.php"}
			]
		},
		{name:"Jquery",isParent:true,
			children:[
				{name:"初级",file:"ztree/jq_a.php"},
				{name:"中级",file:"ztree/jq_b.php"},
				{name:"高级",file:"ztree/jq_c.php"}
			]
		},
		{name:"PHP",isParent:true,
			children:[
				{name:"初级",file:"ztree/php_a.php"},
				{name:"中级",file:"ztree/php_b.php"},
				{name:"高级",file:"ztree/php_c.php"}
			]
		},
		{name:"JSON",isParent:true,
			children:[
				{name:"初级",file:"ztree/asp_a.php"},
				{name:"中级",file:"ztree/asp_b.php"},
				{name:"高级",file:"ztree/asp_c.php"}
			]
		},
		{name:"AJAX",isParent:true,
			children:[
				{name:"初级",file:"ztree/ajax_a.php"},
				{name:"中级",file:"ztree/ajax_b.php"},
				{name:"高级",file:"ztree/ajax_c.php"}
			]
		}

	];

	$(function(){
		/*
			$.zTree.init(object,zSetting,zNodes)
			作用：初始化树菜单
			参数1：设置树菜单的容器
			参数2：树菜单的配置信息
			参数3：树菜单的数据
		*/
			$.fn.zTree.init($("#treeDemo"), setting, zNodes);
	});

	</script>
	<!-- <div id="footer">
		<div id="wrap_foot">
			<div class="foot_left">
			  <img src="ztree/zTreeStyle/img/qq.jpg" alt="picture">
			</div>
			<div class="foot_center">
				<span>业务QQ：2665752129</span><br/>
				<span>微信：justOnce<a>关注</a></span><br/>
				<span>博客：justOnce<a>关注</a></span><br/>
			</div>
			<div class="foot_right">
				<div class="footer_contact">
					<a href="">关于我们</a>
					<a href="">加入我们</a><br/>
					<a href="">意见反馈</a>
					<a href="">企业服务</a><br/>
					<a href="">网站合作</a>
					<a href="">免责申明</a><br/>
					<a href="">友情链接</a>
				</div>
			</div>
		</div>
	</div> -->
</body>
</html>