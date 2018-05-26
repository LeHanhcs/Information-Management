<html lang="vi">
	<head>
		<meta charset="UTF-8"/>
		<title>ĐĂNG NHẬP HỆ THỐNG QUẢN LÝ ĐIỂM</title>
    </head>
    <body>
       <?php
session_start();
ob_start();
$username=$_POST['username'];
$password=$_POST['password'];
$link = mysqli_connect('localhost', 'Hanh','123456', 'ql_diem');
$s = "SELECT Id, MaHV FROM hocvien WHERE MaHV = '$username' AND Id = '$password'";
$re = mysqli_query($link, $s);
$row1 = mysqli_fetch_assoc($re);
if(mysqli_num_rows($re)>0)
{
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	echo "<script language='javascript'>alert('Đăng nhập thành công');";
			echo "location.href='tracuu.php';</script>";
}
if(($username=='A')&&($password=='1'))
{
$_SESSION['username']=$username;
$_SESSION['password']=$password;
echo "<script language='javascript'>alert('Đăng nhập thành công');";
			echo "location.href='main.php';</script>";
}
else
{
echo "<script language='javascript'>alert('Thông tin đăng nhập chưa đúng, vui lòng đăng nhập lại');";
			echo "location.href='hvlog.php';</script>";
}
?>
    </body>
</html>	




