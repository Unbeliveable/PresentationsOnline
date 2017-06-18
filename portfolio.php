<html>
<head>
	<meta charset = "uft-8">
	<title>Presentation Online</title>
	<link rel="icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/portfolio-style.css"/>
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
	<script  src="js/jquery-3.2.1.min.js"></script>
<script>
	$( document ).ready( function()
        {

			$.ajax( {
				url: "queryAllImages.php",
				context: document.body
			} ).done( function( data ) 
			{
				jsonObject = jQuery.parseJSON( data );
				console.log( jsonObject )

				var indexs = 0;
				var index = 0;
				$.each( jsonObject, function( key, value )
				{
					index += 1;
					$( ".picture-all-box" ).append( "<a href='" + value + "'><div class='picture-bg-box-1' id='pic_" + index + "' index=" + index + "><div class='sub-picture-detail'>" + key + "</div></div></div></a>" )
					$( "#pic_" + index ).css( "background-image", "url( " + value +" )" );
				} );
				console.log( jsonObject )
			} );

		} );
</script>

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
				<div class="menu-3"><fonts style="color:#6ED9A1;">PORTFOLIO</fonts></div></a>
				<a href="up.php"><div class="menu-4">UPLOAD</div></a>
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
	<div class="cata-bg-box">
		<div class="cata-header-bg-box">
			<div class="cata-header-box">CATEGORY</div>
		</div>
		<div class="cata-detail-bg-box">
			<div class="cata-subdetail-bg-box">
				<div class="cata-box-1">DESIGN</div>
				<div class="cata-box-2">LOGO</div>
				<div class="cata-box-3">GRAPHIC</div>
				<div class="cata-box-4">ART</div>
				<div class="cata-box-5">INFOGRAPHIC</div>
				<div class="cata-box-6">ICON</div>
			</div>
		</div>
	</div>
	<div class="show-bg-box">
		<div class="show-header-box">
			<div class="show-header-text-box">PRESENTATION</div>
		</div>
		<div class="picture-all-box">
			<!-- <div class="picture-bg-box-test">
				<div class="sub-picture-detail">
					<div class="box-status">
						<div class="icon-box-9"><i class="fa fa-heart"></i></div>
						<div class="statistic-box-9"><?=$_COOKIE[ "p_like" ]; ?></div>
						<div class="icon-box-5"><i class="fa fa-eye"></i></div>
						<div class="statistic-box-5"><?=$_COOKIE[ "p_view" ]; ?></div>
					</div>
				</div>
			</div> -->
			<!-- <div class="sub-picture-detail">
				<div id="sub-names-box">Name Picture</div>
				<div id="sub-status-box">s</div>
			</div> -->
			<!-- <div class="picture-bg-box-4"></div>
			<div class="picture-bg-box-5"></div>
			<div class="picture-bg-box-6"></div>
			<div class="picture-bg-box-7"></div>
			<div class="picture-bg-box-8"></div>
			<div class="picture-bg-box-9"></div>
			<div class="picture-bg-box-10"></div>
			<div class="picture-bg-box-11"></div>
			<div class="picture-bg-box-12"></div> -->
		</div>
	</div>
	<!-- <div class="footer-box"></div> -->
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