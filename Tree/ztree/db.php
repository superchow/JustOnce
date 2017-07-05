<?php

	class DB{
		public $conn;
		public $table;
		public function __construct($table)
		{

			$this->table = $table;

			$this->conn = mysqli_connect("localhost","wangligu","Niepangg511472","wangligu_JustOnce");

			mysqli_query($this->conn,"set names utf8");
		}
		public function find($sql)
		{

			$result = mysqli_query($this->conn,$sql);

			$row = mysqli_fetch_assoc($result);

			return $row;

		}
		public function select($sql)
		{

			$result = mysqli_query($this->conn,$sql);

			$arr = array();

			while($row = mysqli_fetch_assoc($result)){
				$arr[] = $row;
			}

			return $arr;

		}
		public function delete($sql)
		{
			$result = mysqli_query($this->conn,$sql);
			return $result;
		}

		public function add($data)
		{
			
			$sql = "insert into $this->table set ";

			foreach ($data as $key => $value) {
				$sql .= "$key='$value',";
			}
			$sql = substr($sql,0,strlen($sql)-1);

			$result = mysqli_query($this->conn,$sql);
			return $result;

		}
		public function update($data,$where)
		{
			$sql = "update $this->table set ";

			foreach ($data as $key => $value) {
				$sql .= "$key='$value',";
			}
			$sql = substr($sql,0,strlen($sql)-1);

			$sql .= " where $where";

			$result = mysqli_query($this->conn,$sql);
			return $result;
		}

	}

?>