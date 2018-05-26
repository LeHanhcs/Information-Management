<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta charset="UTF-8"/>
<link rel="stylesheet" href="./stylenav.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="./style.css" />
<?php
		$link = mysqli_connect('localhost', 'Hanh','123456', 'ql_diem');
		mysqli_query($link,'SET NAMES UTF8');
		?>
<title>Trang chủ</title>
</head>
<body>
	<table class="example">
		<tr>
			<td class="tit2">PHÒNG QUẢN LÝ KHOA HỌC - HỢP TÁC QUỐC TẾ VÀ SAU ĐẠI HỌC</td>
			<td class="rj" width="10%"><?php 
       if (isset($_SESSION['username']) && $_SESSION['password']){			
       	echo "<strong>Giáo vụ sdh</strong>";
       }
       else{
           echo 'Vui lòng đăng nhập để tra cứu thông tin';
		  header("location:hvlog.php");
       }
       ?></td>
		</tr>
		<tr>
			<td class="tit2">TRANG QUẢN LÝ HỌC VIÊN</td>
		</tr>
		<tr>
			<td class="tit2">*****</td>
		</tr>
		<tr>
			<td class="menuholder">
				<ul class="menu slide">
				<li><a href="http://sdh.upt.edu.vn" class="red" name="home">Trang chủ SĐH</a></li>
				<li><a href="qluanvan.php" class="green">Thông tin luận văn</a></li>
				<li><a href="giaovu.php" class="green">Kết quả học tập</a></li>
				<li><a href="gvinfo.php" class="green">Thông tin giảng viên</a></li>
				<li><a href="logout.php" class="violet">Đăng xuất</a></li>
				</ul>
			</td>
		</tr>
	</table>
</body>
</html>