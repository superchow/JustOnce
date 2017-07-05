<?php

	class DB{

		//属性：在构造函数中实例化出来的一个数据库对象
		public $conn;

		//该对象要操纵的表
		public $table;

		//构造函数，传入表名
		public function __construct($table)
		{

			$this->table = $table;

			$this->conn = mysqli_connect("localhost","root","","dd");

			mysqli_query($this->conn,"set names utf8");
		}

		//用来查询一条数据
		public function find($sql)
		{

			$result = mysqli_query($this->conn,$sql);

			$row = mysqli_fetch_assoc($result);

			return $row;

		}

		//查询多条数据
		public function select($sql)
		{

			$result = mysqli_query($this->conn,$sql);

			$arr = array();

			while($row = mysqli_fetch_assoc($result)){
				$arr[] = $row;
			}

			return $arr;

		}

		//删除
		public function delete($sql)
		{
			$result = mysqli_query($this->conn,$sql);
			return $result;
		}

		//插入数据
		public function add($data)
		{
			
			$sql = "insert into $this->table set ";

			foreach ($data as $key => $value) {
				//拼接要插入的值
				$sql .= "$key='$value',";
			}

			//去掉逗号
			$sql = substr($sql,0,strlen($sql)-1);

			$result = mysqli_query($this->conn,$sql);
			return $result;

		}


		//修改数据
		public function update($data,$where)
		{
			$sql = "update $this->table set ";

			foreach ($data as $key => $value) {
				//拼接要插入的值
				$sql .= "$key='$value',";
			}

			//去掉逗号
			$sql = substr($sql,0,strlen($sql)-1);

			$sql .= " where $where";

			$result = mysqli_query($this->conn,$sql);
			return $result;
		}

	}

	//打开数据库，并指定要操纵的表
	$myDB = new DB("stuudent");
	//print_r($myDB->delete("delete from student where name='菜鸡珂'"));

	// print_r($myDB->find("select * from stuudent"));

	//$data["name"] = "小妖精";
	//$data["age"] = 5;
	//$myDB->add($data);

	//$myDB->update($data,"age=1");






	//关闭数据库
	//mysqli_close($myDB->conn);



?>