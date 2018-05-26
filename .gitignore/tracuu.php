<?php session_start(); ?>
<!DOCTYPE  html>
<html lang="vi">
	<head>
		<meta charset="UTF-8"/>
		<title>TRA CỨU THÔNG TIN HỌC VIÊN</title>
		<link rel="stylesheet" href="./stylenav.css" type="text/css" media="all">
		<link rel="stylesheet" type="text/css" href="./style.css" />
		<?php
		$link = mysqli_connect('localhost', 'Hanh','123456', 'ql_diem');
		mysqli_query($link,'SET NAMES UTF8');
		?>
	</head>
	
	<body width = "100%">
       <table class="example">
		<tr>
			<td class="tit2">PHÒNG QUẢN LÝ KHOA HỌC - HỢP TÁC QUỐC TẾ VÀ SAU ĐẠI HỌC</td>
			<td class="rj" width="12%">
				<?php echo "<strong>Chào học viên:</strong>";?>
			</td>
		</tr>
		<tr>
			<td class="tit2">TRANG QUẢN LÝ HỌC VIÊN</td>
			<td class="rj" width="15%">
				<?php 
       if (isset($_SESSION['username']) && $_SESSION['password']){
       	$user = $_SESSION['username'];
		$p = $_SESSION['password'];
		$s = "SELECT hocvien.MaHV, HoTen
					FROM hocvien
					WHERE hocvien.id like '$p' AND hocvien.MaHV like '$user'";
		$re = mysqli_query($link, $s);
		$r = mysqli_fetch_assoc($re);
		$hoten = $r['HoTen'];				
       	echo "<strong>$hoten</strong>";
       }
       else{
           echo 'Vui lòng đăng nhập để tra cứu thông tin';
		  header("location:hvlog.php");
       }
       ?>
			</td>
		</tr>
		<tr>
			<td class="tit2">*****</td>
		</tr>
		<tr>
			<td class="menuholder">
				<ul class="menu slide">
				<li><a href="http://sdh.upt.edu.vn" class="red" name="home">Trang chủ SĐH</a></li>
				<li><a href="luanvan.php" class="green">Thông tin luận văn</a></li>
				<li><a href="gvhd.php" class="green">Thông tin GVHD</a></li>
				<li><a href="hocvien.php" class="green">Kết quả học tập</a></li>
				<li><a href="logout.php" class="violet">Đăng xuất</a></li>
				</ul>
			</td>
		</tr>
	</table>
	</body>
</html>