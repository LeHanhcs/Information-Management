<!DOCTYPE  html>
<html lang="vi">
	<head>
		<meta charset="UTF-8"/>
		<title>ĐĂNG NHẬP HỆ THỐNG QUẢN LÝ HỌC VIÊN</title>
		<link rel="stylesheet" type="text/css" href="./style.css" />
    </head>
<head>
<style>
*{ FONT-SIZE: 12pt; FONT-FAMILY: verdana; } b { FONT-WEIGHT: bold; } .listtitle { BACKGROUND: #425984; COLOR: #EEEEEE; white-space: nowrap; } td.list { BACKGROUND: #EEEEEE; white-space: nowrap; } </style>
</head>
<img width="100%" height="100%" src="./bg.jpg">
<body bgcolor="#e2e2e2" onload="document.form.username.focus();if(document.form.referer.value.indexOf('#')==-1)document.form.referer.value+=location.hash;">

<center><br><br><br><br>
<div>
			<center><div class="tit2">PHÒNG QUẢN LÝ KHOA HỌC - HỢP TÁC QUỐC TẾ VÀ SAU ĐẠI HỌC</div></center>
			<center><div class="tit2">HỆ THỐNG QUẢN LÝ HỌC VIÊN CAO HỌC</div></center>			
		</div>
		<p>*****</p>
<table cellspacing=1 cellpadding=5>
<tr>
<td class=listtitle colspan=2>Đăng nhập với thông tin tài khoản đã được cung cấp</td></tr>
<form name="form1" method="post" action="checklogin.php">
<input type=hidden name=referer value="/">
<tr><td class=list align=right>Mã học viên:</td><td class=list><input type=text name=username></td></tr>
<tr><td class=list align=right>Mật khẩu:</td><td class=list><input type=password name=password></td></tr>
<tr><td class=listtitle align=right colspan=2><input type=submit value='Đăng nhập'></td></tr>
</form>
</table>
</center></body></html>
