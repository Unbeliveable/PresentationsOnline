<html>
<head>
	<meta charset="UTF-8">
	<title>Presentation Online</title>
	<link rel="icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/upload-style.css"/>
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class="banner-box">
		<div class="logout-box">
			<div class="name-login-box">
				<div class="name-box">
					<?=$_COOKIE[ "p_name" ]." (".$_COOKIE[ "p_id" ].") "; ?>
				</div>
				<div class="detail-logout-box"><a href="index.html"><i class="fa fa-lock"></i></a></div>
			</div>
		</div>
		<div class="logo-bg-box">
			<div class="logo-box"><img src="img/logo.png"></div>
		</div>
		<div class="menu-bg-box">
			<div class="menu-box">
				<a href="home.php"><div class="menu-1">HOME</div></a>
				<a href="about.php"><div class="menu-2">ABOUT</div></a>
				<a href="portfolio.php"><div class="menu-3">PORTFOLIO</div></a>
				<div class="menu-4"><fonts style="color:#6ED9A1;">UPLOAD</fonts></div>
				<a href="contact.php"><div class="menu-5">CONTACT</div></a>
			</div>
		</div>
		<div class="container-banner-box">
			<div class="photo-bg-box"></div>
			<div class="detail-bg-box">
				<div class="detail-box">
					<?=$_COOKIE[ "p_name" ]; ?>
				</div>
				<div class="detail-box">
					<?=$_COOKIE[ "p_lastname" ]; ?>
				</div>
				<div class="detail-box-2">
					<?=$_COOKIE[ "p_tagname" ]; ?>
				</div>
			</div>
			<div class="credit-bg-box">
				<div class="detail-box-3">
					CREDIT
				</div>
			</div>
			<div class="credit-box">
				<div class="detail-box-4">
					<div class="icon-bg-box-1">
						<div class="icon-box-1"><i class="fa fa-heart"></i></div>
						<div class="statistic-box-1"><?=$_COOKIE[ "p_like" ]; ?></div>
					</div>
					<div class="icon-bg-box-2">
						<div class="icon-box-2"><i class="fa fa-eye"></i></div>
						<div class="statistic-box-2"><?=$_COOKIE[ "p_view" ]; ?></div>
					</div>
					<div class="icon-bg-box-3">
						<div class="icon-box-3"><i class="fa fa-folder-o"></i></div>
						<div class="statistic-box-3">0</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="box-upload-header">
		<div class="box-upload">UPLOAD</div>
	</div>
	<div class="box-bg-upload">
		<div class="box-bg">
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<div class="upload-box">
					<div class="upload-box-2">PORTFOLIO</div>
						<div class="box-pname"><input type="text" id="p_namepic" name="p_namepic" placeholder="ชื่อรูป"></div>
						<div class="select-box">
							<select name="p_tagname">
							  <option value="design">Design</option>
							  <option value="logo">Logo</option>
							  <option value="graphic">Graphic</option>
							  <option value="art">Art</option>
							  <option value="infographic">Infographic</option>
							  <option value="icon">Icon</option>
							</select>
						</div>
						<div class="des-box"><input type="text" id="p_description" name="p_description" placeholder="กรอกรายละเอียด"></div>
						<div class="box2"><input type="file" name="p_picture" multiple/></div>
						<div class="box3"><input type="submit" value="Upload"/></div>
					<div class="menu-upload-box2">
					</div><br>
				</div>
			</form>
		</div>
		<div class="box-bg-2">
			<div class="box-bg-2-2">PROFILES</div>
			<form action="uploadprofile.php" method="post" enctype="multipart/form-data">
				<div class="upload-box">
					<div class="text-nav-1">UPLOAD PROFILE</div>
						<div class="box2"><input type="file" name="pic[]" multiple/></div>
						<div class="box4"><input type="submit" value="Upload Profile"/></div>
					<div class="menu-upload-box2">
					</div><br>
				</div>
			</form>
			<form action="uploadcover.php" method="post" enctype="multipart/form-data">
				<div class="upload-box">
					<div class="text-nav-2">UPLOAD COVER</div>
						<div class="box2"><input type="file" name="pic[]" multiple/></div>
						<div class="box4"><input type="submit" value="Upload Cover"/></div>
					<div class="menu-upload-box2">
					</div><br>
				</div>
			</form>
		</div>
	</div>
	<div class="space-box"></div>
	<div class="contact-header-box">
			<div class="detail-header-box">CONTACT</div>
	</div>
	<div class="contact-bg-box">
		<div class="contact-box">
			<div class="detail-contact-box">
				<div class="header-right-bg-box">CONTACT US
					<div class="detail-right-bg-box">
						<div class="detail-right-box"><i class="fa fa fa-phone"></i> 0866330221</div>
						<div class="detail-right-box"><i class="fa fa fa-envelope"></i> mone_unbeliveable@hotmail.com</div>
					</div>
				</div>
				<div class="header-right-bg-box-2">ADDRESS
					<div class="detail-right-bg-box">
						<div class="detail-right-box"><i class="fa fa-map-marker"></i> 57/11 Banpork Meung,<br>&nbsp;&nbsp;Samutsongkhram 75000</div>
					</div>
				</div>
			</div>
			<div class="header-right-bg-box-3">SOCIAL
				<div class="detail-right-bg-box">
					<div class="facebook-box"><i class="fa fa-facebook-square"></i></div>
					<div class="google-box"><i class="fa fa-google-plus-square"></i></div>
					<div class="twitter-box"><i class="fa fa-twitter-square"></i></div>
				</div>
			</div>
		</div>
	</div>
	<div class="copy-bg-box">
		<div class="copy-box">© Copyright 2017 Presentations Online - All Rights Reserved. License: Thailand</div>
	</div>
</body>
</html>