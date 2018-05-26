<?php session_start(); ?>
<!DOCTYPE  html>
<html lang="vi">
	<head>
		<meta charset="UTF-8"/>
		<title>THÔNG TIN GIẢNG VIÊN</title>
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
			<label><center class='pa'>GIẢNG VIÊN CẦN TRA CỨU</center></br></label>
			<input name="gv" type="text" value=""placeholder="Nhập tên giảng viên tại đây"/>
			<button type='submit' name='sub'>Xem thông tin</button>			
			</form>
		</div>
		<p></p>
		<div>
				<?php
				if(isset($_POST["gv"]))
				{
					$tengv = $_POST["gv"];
				}
				else {
					$tengv = "";
				}
				$sql = "SELECT * FROM giangvien WHERE giangvien.HoTenGV like '$tengv'";
				$result = mysqli_query($link, $sql);			
				if(mysqli_num_rows($result)>0){
					echo "<table border='1' cellspacing='0' cellpadding='5' class='' width='100%'>";
					echo "<p></p>";						
					echo "<center class='p'>THÔNG TIN GIẢNG VIÊN</center></br>";	
					echo "<p></p>";	
					echo "<tr class= 't'>";			
					echo "<th>Mã GV</th>";
					echo "<th>Học hàm, học vị</th>";
					echo "<th>Họ tên GV</th>";
					echo "<th>Giới tính</th>";
					echo "<th>Năm sinh</th>";
					echo "<th>Nơi công tác</th>";
					echo "<th>Chức vụ</th>";
					echo "<th>Email</th>";
					echo "<th>Số ĐT</th>";
					echo "</tr>";													
				while($row = mysqli_fetch_assoc($result)){
					$magv = $row['MaGV'];
					$tengv = $row['HoTenGV'];				
					$hh= $row['HocHam'];
					$hv = $row['HocVi'];
					$gioitinh = $row['GioiTinh'];
					$namsinh = $row['NamSinh'];
					$noict = $row['NoiCT'];
					$chucvu = $row['ChucVu'];
					$email = $row['Email'];
					$sdt = $row['SDT'];	
					echo "<tr class= 'bg'>";					
					echo "<td>$magv</td>";
					echo "<td>$hh&nbsp$hv</td>";
					echo "<td>$tengv</td>";
					echo "<td>$gioitinh</td>";
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