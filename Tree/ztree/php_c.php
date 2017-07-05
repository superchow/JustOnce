<?php
	include("db.php");
	$myDB = new DB("jo_php");
	$a = $myDB->select("select * from jo_php");
	$aa = json_encode($a);//关键
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="ztree/zTreeStyle/tree.css">
</head>
<body>
	<script>

	var a = <?php echo $aa;?>;
	var b = [];
	for (var i = 0; i < a.length; i++) {
		if(a[i]["Level"] == 3){
			b.push(a[i]);
		}
	}
	
	var body = document.getElementsByTagName("body");
	var i = 0;
		function Title() {
				
				var h3 = document.createElement("h3");
				var div1 = document.createElement("div");
				div1.className = "show_subject";
				var p = document.createElement("p");
				var div3 = document.createElement("div");
				div3.className = "show_pr";
				div3.innerHTML = "<span>阅读量："+b[i]['Reading']+"</span><span>赞："+b[i]['Like']+"</span><span>评论："+b[i]['Comment']+"</span><span>收藏："+b[i]['Collect']+"</span>";
				var btn1 = document.createElement("button");
				var btn2 = document.createElement("button");
				btn1.innerHTML = "上一题";
				btn2.innerHTML = "下一题";
				var h4 = document.createElement("h4");
				h4.innerHTML = "评论区"
				var div4 = document.createElement("div");
				div4.className = "show_pl";



				h3.innerHTML = b[i]["Title"];
				p.innerHTML = b[i]["Detailed"];

				body[0].appendChild(div1);
				div1.appendChild(h3);
				div1.appendChild(p);
				div1.appendChild(div3);
				div1.appendChild(btn1);
				div1.appendChild(btn2);
				div1.appendChild(h4);
				div1.appendChild(div4);

				btn1.onclick = function () {
					
					if(i > 0){
						i--;
						body[0].removeChild(div1);
						Title();
					};
				};
				
				btn2.onclick = function () {
					
					if(i < b.length-1){
						i++;
						body[0].removeChild(div1);
						Title();
					};
				};
			
		}
		Title();
	</script>

</body>
</html>