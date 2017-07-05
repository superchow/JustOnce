<?php 
//使用session
session_start();
include 'db.php';
$tel=$_POST['user'];
$password=$_POST['pwd'];
$myDB=new DB('jo_user');
$result=$myDB->find("select * from jo_user where tel='$tel'");
if($result['id']>0)
{
echo "<script>alert('该账号已存在');location.replace('../login.html');</script>";
}else{
$data["tel"]=$tel;
$data["password"]=$password;
// $data["username"]='GG';
$myDB->add($data);
$result=$myDB->find("select * from jo_user where tel='$tel'");
if($result['id']>0){
	echo "<script>location.replace('../User_info/user_center.php');alert('注册成功,请完善个人中心资料');</script>";
}else{
	echo "<script>alert('注册失败');location.replace('../login.html');</script>";
};
};
?>