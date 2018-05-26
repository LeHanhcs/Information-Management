<?php session_start(); ?>
<!DOCTYPE  html>
<html lang="vi">
	<head>
		<meta charset="UTF-8"/>
		<title>QUẢN LÝ THÔNG TIN LUẬN VĂN</title>
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
$sql = "SELECT TenLV,HocHam, HocVi,HoTenGV,GVHD2,hocvien.MaHV, HoTen, GhiChu
	FROM (luanvan JOIN hocvien ON luanvan.MaHV=hocvien.MaHV) JOIN giangvien ON luanvan.MaGV = giangvien.MaGV
	WHERE hocvien.MaHV like '$hv'";
$sql2 = "SELECT hocvien.MaHV, HoTen
FROM hocvien
WHERE hocvien.id like '$id'";
				$result = mysqli_query($link, $sql);
				$result2 = mysqli_query($link, $sql2);
				if(mysqli_num_rows($result2)>0){
					$row2 = mysqli_fetch_assoc($result2);
					$mahv = $row2['MaHV'];
					$hoten = $row2['HoTen'];					
					echo "<center class='p'>THÔNG TIN LUẬN VĂN</center></br>";
					echo "<center>Họ tên học viên: <strong>$hoten</strong> &nbsp&nbsp&nbsp&nbsp&nbsp-&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Mã học viên: <strong>$mahv</strong></center>";	
					echo "<p></p>";													
				while($row = mysqli_fetch_assoc($result)){
					$tendetai = $row['TenLV'];
					$hd1 = $row['HoTenGV'];
					$hh =$row['HocHam'];
					$hv =$row['HocVi'];				
					$hd2 = $row['GVHD2'];
					$ghichu = $row['GhiChu'];	
					echo "<tr>";	
					echo "<td width = '500'>Tên đề tài</td>";echo "<td>$tendetai</td>";
					echo "</tr>";
					echo "<tr>";echo "<td>Giảng viên hướng dẫn 1</td>";echo "<td>$hh&nbsp$hv&nbsp$hd1</td>";
					echo "</tr>";
					echo "<tr>";echo "<td>Giảng viên hướng dẫn 2</td>";echo "<td>$hd2</td>";	
					echo "</tr>";						
					echo "<tr>";
					echo "<td>Ghi chú</td>";echo "<td>$ghichu</td>";
					echo "</tr>";	
				}
				}
if(mysqli_num_rows($result)==0)
				{
					echo "<center><i>Hiện chưa có thông tin về luận văn thạc sĩ cho học viên</i></center>";
				}
			?>
			</table>
		</div>
	</body>
</html>