<?php session_start(); ?>
<!DOCTYPE  html>
<html lang="vi">
	<head>
		<meta charset="UTF-8"/>
		<title>THÔNG TIN GIẢNG VIÊN</title>
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
			<td class="rj" width="15%">
				<?php echo "<strong>Học viên:</strong>";?>
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
		<p></p>
		<div>
			<table border="1" cellspacing="0" cellpadding="5" class="ra" width="100%">
				<?php 
       if (isset($_SESSION['username']) && $_SESSION['password']){
       	$id = $_SESSION['password'];
		$hv = $_SESSION['username'];
       }
	   
       else{
           echo 'Bạn chưa đăng nhập';
		  header("location:hvlog.php");
       }
$sql = "SELECT HocHam, HocVi,HoTenGV,NamSinh, NoiCT, ChucVu, Email, SDT
	FROM (luanvan JOIN hocvien ON luanvan.MaHV=hocvien.MaHV) JOIN giangvien ON luanvan.MaGV = giangvien.MaGV
	WHERE hocvien.MaHV like '$hv'";
$sql2 = "SELECT hocvien.MaHV, HoTen, NgaySinh
FROM hocvien
WHERE hocvien.id like '$id' AND hocvien.MaHV like '$hv'";
				$result = mysqli_query($link, $sql);
				$result2 = mysqli_query($link, $sql2);
				if(mysqli_num_rows($result2)>0){
					echo "<table border='1' cellspacing='0' cellpadding='5' class='' width='100%'>";
					echo "<p></p>";						
					echo "<center class='p'>THÔNG TIN GIẢNG VIÊN HƯỚNG DẪN LUẬN VĂN</center></br>";	
					echo "<p></p>";	
					echo "<tr class= 't'>";			
					echo "<th>Học hàm, học vị</th>";
					echo "<th>Họ tên GV</th>";
					echo "<th>Năm sinh</th>";
					echo "<th>Nơi công tác</th>";
					echo "<th>Chức vụ</th>";
					echo "<th>Email</th>";
					echo "<th>Số ĐT</th>";
					echo "</tr>";													
				while($row = mysqli_fetch_assoc($result)){
					$tengv = $row['HoTenGV'];				
					$hh= $row['HocHam'];
					$hv = $row['HocVi'];
					$namsinh = $row['NamSinh'];
					$noict = $row['NoiCT'];
					$chucvu = $row['ChucVu'];
					$email = $row['Email'];
					$sdt = $row['SDT'];	
					echo "<tr class= 'bg'>";					
					echo "<td>$hh&nbsp$hv</td>";
					echo "<td>$tengv</td>";
					echo "<td>$namsinh</td>";
					echo "<td>$noict</td>";
					echo "<td>$chucvu</td>";
					echo "<td>$email</td>";
					echo "<td>$sdt</td>";
				}
				}
			?>
			</table>
		</div>
		
	</body>
</html>