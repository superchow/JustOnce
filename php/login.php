<?php 
//使用session
session_start();
include 'db.php';
print_r($_POST);
$tel=$_POST['user'];
$password=$_POST['pwd'];
$myDB=new DB('jo_user');
$result=$myDB->find("select * from jo_user where tel='$tel' and password='$password'");
if($result['id']>0)
{
echo "<script>location.replace('../index.php');</script>";
// http://www.wangliguang.com/JustOnce/
}else{
echo "<script>alert('账号或密码错误');location.replace('../login.html');</script>";
};
?>

