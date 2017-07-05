﻿<?php
	class DB{

		public $conn;
		public $table;

		public function __construct($table){
			$this->table = $table;
			$this->conn = mysqli_connect("localhost","wangligu","Niepangg511472","wangligu_JustOnce");
			mysqli_query($this->conn,"set names utf8");
		}

		//查询一条
		public function find($sql){
			$result = mysqli_query($this->conn,$sql);
			$row = mysqli_fetch_assoc($result);
			return $row;
		}

		//查询多条
		public function select($sql){
			// $conn = mysqli_connect("localhost","root","","person");
			// mysqli_query($conn,"set names utf8");
			$result = mysqli_query($this->conn,$sql);
			$Arr = Array();
			while ($row = mysqli_fetch_assoc($result)) {
				$Arr[] = $row;
			}
			return $Arr;
		}

		public function delete($sql){
			$result = mysqli_query($this->conn,$sql);
			return $result;
		}

		public function add($data)
		{	
			$sql = "insert into ".$this->table." set";
			foreach ($data as $key => $value) {
				$sql .= " $key='$value',";
			}
			$sql = substr($sql, 0,strlen($sql)-1);
			$result = mysqli_query($this->conn,$sql);
			return $result;
		}

		public function update($data,$where){
			$sql = "update ".$this->table." set";
			foreach ($data as $key => $value) {
				$sql .= " $key='$value',";
			}
			$sql = substr($sql, 0,strlen($sql)-1);
			$sql .= " where ".$where;
			$result = mysqli_query($this->conn,$sql);
			return $result;
		}


	}

?>