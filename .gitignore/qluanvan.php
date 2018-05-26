<?php session_start(); ?>
<!DOCTYPE  html>
<html lang="vi">
	<head>
		<meta charset="UTF-8"/>
		<title>QUẢN LÝ THÔNG TIN LUẬN VĂN</title>
		<link rel="stylesheet" type="text/css" href="./style.css" />
		<link rel="stylesheet" href="./stylenav.css" type="text/css" media="all">
		<?php
		$link = mysqli_connect('localhost', 'Hanh','123456', 'ql_diem');
		mysqli_query($link,'SET NAMES UTF8');
		?>
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
		<p></p>
		<div>
			<table border="1" cellspacing="0" cellpadding="5" class="ra" width="100%">
				<?php 
       if (isset($_SESSION['username']) && $_SESSION['password']){
       	$id = $_SESSION['password'];
       }
	   
       else{
           echo 'Bạn chưa đăng nhập';
		  header("location:hvlog.php");
       }
				$sql = "SELECT luanvan.MaLV, HocHam, HocVi, TenLV,HoTenGV, GVHD2, Email, SDT, GhiChu, hocvien.MaHV, HoTen 
FROM (luanvan JOIN hocvien ON luanvan.MaHV=hocvien.MaHV) JOIN giangvien ON luanvan.MaGV = giangvien.MaGV";
				$result = mysqli_query($link, $sql);
				if(mysqli_num_rows($result)>0){
					$i=0;			
					echo "<center class='p'>THÔNG TIN LUẬN VĂN</center></br>";	
					echo "<p></p>";	
					echo "<tr class= 't'>";		
					echo "<th>Stt</th>";	
					echo "<th>Mã học viên</th>";
					echo "<th>Họ tên học viên</th>";
					echo "<th>Tên đề tài</th>";
					echo "<th>Giảng viên hướng dẫn 1</th>";
					echo "<th>Giảng viên hướng dẫn 2</th>";
					echo "<th>Email GVHD</th>";
					echo "<th>Số ĐT GVHD</th>";
					echo "</tr>";												
				while($row = mysqli_fetch_assoc($result)){
					$i++;
					$hh = $row['HocHam'];
					$hv = $row['HocVi'];
					$mahv = $row['MaHV'];
					$tenhv = $row['HoTen'];
					$tendetai = $row['TenLV'];
					$hd1 = $row['HoTenGV'];				
					$hd2 = $row['GVHD2'];
					$email = $row['Email'];
					$sdt = $row['SDT'];	
					echo "<tr class= 'bg'>";	
					echo "<td>$i</td>";				
					echo "<td>$mahv</td>";
					echo "<td>$tenhv</td>";
					echo "<td>$tendetai</td>";
					echo "<td>$hh&nbsp$hv&nbsp$hd1</td>";
					echo "<td>$hd2</td>";
					echo "<td>$email</td>";
					echo "<td>$sdt</td>";
					echo "</tr>";	
				}
				}
			?>
			</table>
		</div>
	</body>
</html>