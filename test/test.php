<?php
include("../php/db.php");
    $html_db = new DB("jo_html");
	$ajax_db = new DB("jo_ajax");
	$asp_db = new DB("jo_asp.net");
	$css_db = new DB("jo_css3");
	$js_db = new DB("jo_javascript");
	$jq_db = new DB("jo_jquery");
	$php_db = new DB("jo_php");
	$xml_db = new DB("jo_xml");

    $name_db = new DB("jo_name");

    // name测试
    $name_count=mysqli_query($name_db->conn,"select ID from jo_name");
	if($name_count->num_rows != 0){
		$num = rand2($name_count->num_rows)[0];
		$name_result1 = $html_db->find("select * from jo_name where ID = $num");
		$num = rand2($name_count->num_rows)[1];
		$name_result2 = $html_db->find("select * from jo_name where ID = $num");
	}
	else{
		$name_result1= null;
		$name_result2= null;
	}


	//html---随机选出两道面试题
	$ht_count=mysqli_query($html_db->conn,"select ID from jo_html5");
	if($ht_count->num_rows != 0){
		$num = rand2($ht_count->num_rows)[0];
		$html_result1 = $html_db->find("select * from jo_html5 where ID = $num");
		$num = rand2($ht_count->num_rows)[1];
		$html_result2 = $html_db->find("select * from jo_html5 where ID = $sum");
	}
	else{
		$html_result1= null;
		$html_result2= null;
	}

    	// 产生两个不一样的随机数
	function rand2($count){
		$ranNum = Array();
		$num1=0;
		$num2=0;
		do{
			$num1 = rand(1,$count);
			$num2 = rand(1,$count);
		}while($num1==$num2);
		$ranNum[] = $num1;
		$ranNum[] = $num2;
		// print_r($ranNum);
		return $ranNum;
	}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="../css/main.css" />
        <script type="text/javascript" src="../js/main.js"></script>
        <style>
        #name_test{
            width:1100px;
            margin:0 auto;
        }
        </style>
    </head>
    <body>
    <div id="zhuanti">
            <div class="show">
                <h2><a href="#">HTML面试题</a><span onclick="exit(this)">X</span></h2>
                <hr/>
                <div class="show_subject">
                    <a href="#">
                        <?php echo $html_result1["Title"] ?>
                    </a><button class="detailed" onclick="detailed(this)">详解</button>
                    <p style="display: none;">
                        <?php echo $html_result1["Detailed"]?>
                    </p>
                    <div class="show_pr"><span>阅读量：<?php echo $html_result1["Reading"] ?></span><span>赞：<?php echo $html_result1["Like"] ?></span><span>评论：40</span><span>收藏：<?php echo $html_result1["Collect"] ?></span></div>
                </div>
            </div>
    </div>

    <div id="name_test">
        <?php echo $name_result1["ID"]?>&nbsp;<?php echo $name_result1["NAME"]?><br>
        <?php echo $name_result2["ID"]?>&nbsp;<?php echo $name_result2["NAME"]?><br><br><br><br>
        <?php print_r($html_result2["Title"])?><br>
        <div>
    	<a href="test.php"><button>刷新</button></a>
    </div>
    </div>
    
    </body>
</html>
