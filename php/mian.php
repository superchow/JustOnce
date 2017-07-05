<?php
    include ("./db.php");

//判断请求的返回类型
    $type = $_POST["type"];
    switch($type){
        case "html5":
            find_html();
        break;
        case "css3":
            find_css();
        break;
        case "javascript":
            find_javascript();
        break;
        case "php":
            find_php();
        break;
    }

    //查找html真题
    function find_html(){
         $html_db = new DB("jo_html5");
         $result=[];
        //html---随机选出两道面试题
        $ht_count=mysqli_query($html_db->conn,"select ID from jo_html5");
        if($ht_count->num_rows != 0){
            $num = rand2($ht_count->num_rows)[0];
            $html_result1 = $html_db->find("select * from jo_html5 where ID = $num");
            $num = rand2($ht_count->num_rows)[1];
            $html_result2 = $html_db->find("select * from jo_html5 where ID = $num");

            $result[]=$html_result1;
            $result[]=$html_result2;
            print_r(json_encode($result));
        }
        else{
            $html_result1= null;
            $html_result2= null;
        }
    }

    //查找css真题
    function find_css(){
        $css_db = new DB("jo_css3");
        $result=[];
        //css---随机选出两道面试题
        $css_count=mysqli_query($css_db->conn,"select ID from jo_css3");
        if($css_count->num_rows != 0){
            $num = rand2($css_count->num_rows)[0];
            $css_result1 = $css_db->find("select * from jo_css3 where ID = $num");
            $num = rand2($css_count->num_rows)[1];
            $css_result2 = $css_db->find("select * from jo_css3 where ID = $num");

            $result[]=$css_result1;
            $result[]=$css_result2;
            print_r(json_encode($result));
        }
        else{
            $css_result1= null;
            $css_result2= null;
        }
    }

    //查找javascript真题
    function find_javascript(){
        $js_db = new DB("jo_javascript");
        $result=[];

        $js_count=mysqli_query($js_db->conn,"select ID from jo_javascript");
        if($js_count->num_rows != 0){
            $num = rand2($js_count->num_rows)[0];
            $js_result1 = $js_db->find("select * from jo_javascript where ID = $num");
            $num = rand2($js_count->num_rows)[1];
            $js_result2 = $js_db->find("select * from jo_javascript where ID = $num");

            $result[]=$js_result1;
            $result[]=$js_result2;
            print_r(json_encode($result));
        }
        else{
            $js_result1= null;
            $js_result2= null;
        }
    }

    //查找php
    function find_php(){
        $php_db = new DB("jo_php");
        $result = [];
        // //php---随机选出两道面试题
        $php_count=mysqli_query($php_db->conn,"select ID from jo_php");
        if($php_count->num_rows != 0){
            $num = rand2($php_count->num_rows)[0];
            $php_result1 = $php_db->find("select * from jo_php where ID = $num");
            $num = rand2($php_count->num_rows)[1];
            $php_result2 = $php_db->find("select * from jo_php where ID = $num");

            $result[]=$php_result1;
            $result[]=$php_result2;
            print_r(json_encode($result));
        }
        else{
            $php_result1= null;
            $php_result2= null;
        }
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