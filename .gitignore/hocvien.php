<?php session_start(); ?>
<!DOCTYPE  html>
<html lang="vi">
	<head>
		<meta charset="UTF-8"/>
		<title>KẾT QUẢ HỌC TẬP</title>
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
		  header("location:login.php");
       }
				$sql = "SELECT khoahoc.MaKH, TenKH, khoahoc.TrangThai, diem.MaHV, HoTen, Diem1, Diem2, Diem3, diem.GhiChu 
FROM (diem JOIN hocvien ON diem.MaHV=hocvien.MaHV) JOIN khoahoc ON diem.MaKH=khoahoc.MaKH 
WHERE hocvien.id like '$id' AND diem.MaHV like '$hv' AND khoahoc.TrangThai like '1'";
$sql2 = "SELECT hocvien.MaHV, HoTen, NgaySinh
FROM hocvien
WHERE hocvien.id like '$id' AND hocvien.MaHV like '$hv'";
				$result = mysqli_query($link, $sql);
				$result2 = mysqli_query($link, $sql2);
				if(mysqli_num_rows($result2)>0){
					$row2 = mysqli_fetch_assoc($result2);
					$i=0;
					$ns = $row2['NgaySinh'];
					$mahv = $row2['MaHV'];
					$hoten = $row2['HoTen'];					
					echo "<center class='p'>BẢNG ĐIỂM HỌC VIÊN</center></br>";
					echo "<center>Họ và tên: <strong>$hoten</strong> &nbsp&nbsp&nbsp&nbsp&nbsp-&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Mã học viên: <strong>$mahv</strong></center>";	
					echo "<p></p>";										
					echo "<tr class= 't'>";		
					echo "<th>Stt</th>";	
					echo "<th>Mã lớp</th>";
					echo "<th>Tên môn học</th>";
					echo "<th>Điểm giữa kỳ</th>";
					echo "<th>Điểm cuối kỳ</th>";
					echo "<th>Điểm học phần</th>";
					echo "<th>Ghi chú</th>";
					echo "</tr>";				
				while($row = mysqli_fetch_assoc($result)){
					$i++;
					$mon = $row['MaKH'];
					$tenmon = $row['TenKH'];				
					$giuaky = $row['Diem1'];
					$cuoiky = $row['Diem2'];
					$diemhp = $row['Diem3'];
					$ghichu = $row['GhiChu'];
					echo "<tr class= 'bg'>";	
					echo "<td>$i</td>";				
					echo "<td>$mon</td>";
					echo "<td>$tenmon</td>";
					echo "<td>$giuaky</td>";
					echo "<td>$cuoiky</td>";
					echo "<td>$diemhp</td>";
					echo "<td>$ghichu</td>";
				}
				}
			?>
			</table>
		</div>
		
	</body>
</html>