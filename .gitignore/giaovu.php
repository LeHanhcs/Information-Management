<?php session_start(); ?>
<!DOCTYPE  html>
<html lang="vi">
	<head>
		<meta charset="UTF-8"/>
		<title>QUẢN LÝ ĐIỂM</title>
		<link rel="stylesheet" type="text/css" href="./style.css" />
		<link rel="stylesheet" href="./stylenav.css" type="text/css" media="all">
		<?php
		$link = mysqli_connect('localhost', 'Hanh','123456', 'ql_diem');
		mysqli_query($link,'SET NAMES UTF8');
		?>
    </head>	
	<body>
		<p></p>
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
				<li><a href="logout.php" class="orange">Đăng xuất</a></li>
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
	   ?>
		<p></p>
		<div class="r">	
			<form action='' method='post'>	
			<label><center class='p'>CHỌN LỚP CẦN XEM ĐIỂM</center></br></label>
			<select name="chon_lop">
				
				<option value="">Click để chọn lớp</option>
				<?php
				$s = "SELECT MaKH, TenKH FROM khoahoc";
				$result1 = mysqli_query($link, $s);							
				while ($r = mysqli_fetch_assoc($result1)) {					
				?>
				<option value="<?php echo $r['MaKH']; ?>"><?php echo $r['MaKH']?></option><?php } ?>
			</select>
			<button type='submit' name='sub'>Xem điểm</button>			
			</form>
		</div>
		<p></p>
		<div>
			<table border="1" cellspacing="0" cellpadding="5" class="r" width="100%">
				<?php
				if(isset($_POST["chon_lop"]))
				{
					$malop = $_POST["chon_lop"];
				}
				else {
					$malop = "";
				}
				$sql = "SELECT khoahoc.MaKH, TenKH, diem.MaHV, HoTen, Diem1, Diem2, Diem3, diem.GhiChu 
FROM (diem JOIN hocvien ON diem.MaHV=hocvien.MaHV) JOIN khoahoc ON diem.MaKH=khoahoc.MaKH 
WHERE diem.MaKH like '$malop'";
$sql2 = "SELECT khoahoc.MaKH, TenKH
FROM khoahoc
WHERE khoahoc.MaKH like '$malop'";
				$result = mysqli_query($link, $sql);
				$result2 = mysqli_query($link, $sql2);				
				if(mysqli_num_rows($result)>0){
					$row2 = mysqli_fetch_assoc($result2);
					$mamon = $row2['MaKH'];
					$tenmon = $row2['TenKH'];
					echo "<p></p>";
					echo "<center class='p'>BẢNG ĐIỂM</center></br>";
					echo "<center>Môn	: $tenmon &nbsp&nbsp&nbsp-&nbsp&nbsp&nbsp Mã lớp: $mamon</center>";					
					$i=0;							
					echo "<tr class= 't'>";			
					echo "<th>Stt</th>";
					echo "<th>Mã học viên</th>";
					echo "<th>Họ tên</th>";
					echo "<th>Điểm giữa kỳ</th>";
					echo "<th>Điểm cuối kỳ</th>";
					echo "<th>Điểm học phần</th>";
					echo "<th>Ghi chú</th>";
					echo "</tr>";							
				while($row = mysqli_fetch_assoc($result)){
					$i++;
					$mahv = $row['MaHV'];
					$ten = $row['HoTen'];				
					$giuaky = $row['Diem1'];
					$cuoiky = $row['Diem2'];
					$diemhp = $row['Diem3'];
					$ghichu = $row['GhiChu'];
					echo "<tr class= 'bg'>";					
					echo "<td>$i</td>";
					echo "<td>$mahv</td>";
					echo "<td>$ten</td>";
					echo "<td>$giuaky</td>";
					echo "<td>$cuoiky</td>";
					echo "<td>$diemhp</td>";
					echo "<td>$ghichu</td>";
				}
				echo "<p></p>";
				echo "Danh sách có $i học viên</br>";
				echo "<p></p>";
				}
			?>
			</table>
		</div>
	</body>
</html>