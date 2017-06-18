<html>
<head>
	<meta charset="UTF-8">
	<title>Presentation Online</title>
	<link rel="icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/home-style.css"/>
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
	<script  src="js/jquery-3.2.1.min.js"></script>
	<script>

		var MainStateWidth        = 1024;
		var MainStateHeight       = 475;

		var PictureBoxWidthRange  = 500;
		var PictureBoxHeightRange = 100;

		var PictureBoxWidthSize   = 200;

		var PictureBoxWidthIndex  = 200;

		var MinimumX_speed        = 0.2;
		var MaximumX_speed        = 0.8;

		var MousemoveFactor       = 0.01;
		var DecreasingFactor      = 0.05;

		var _MainStateWidth_half  = MainStateWidth * 0.5;
		var _MainStateHeight_half = MainStateHeight * 0.5;

		var _GlobalSpeedFactor    = 1;

		var _MouseEventFlag       = 0;
		var _OldMousePositionX    = 0;

		function randomPictureBox()
		{

			var pictureBoxes = $( '.picture_box' );

			$.each( pictureBoxes, function( index, pictureBox ) 
			{

				var index = parseInt( $( pictureBox ).attr( "index" ) );

				// 
				// Position
				// 

				var randomWidth   = ( Math.random() * 2 ) - 1;
				var newMarginLeft = _MainStateWidth_half + randomWidth * PictureBoxWidthRange 
									+ index * PictureBoxWidthIndex;

				var randomHeight  = ( Math.random() * 2 ) - 1;
				var newMarginTop  = _MainStateHeight_half + randomHeight * PictureBoxHeightRange;

				$( pictureBox ).css( "margin-left", newMarginLeft );
				$( pictureBox ).css( "margin-top", newMarginTop );

				// 
				// Speed
				// 

				var translateX_speed = Math.random() * ( MaximumX_speed - MinimumX_speed ) + MinimumX_speed;
				translateX_speed *= -1;
				$( pictureBox ).attr( "translateX_speed", translateX_speed );

				//
				//	Size
				//

				var pictureBoxWidth  = ( Math.random() * 0.5 + 0.8 ) * PictureBoxWidthSize;
				var pictureBoxHeight = pictureBoxWidth * 0.5625;

				$( pictureBox ).css( "width", pictureBoxWidth );
				$( pictureBox ).css( "height", pictureBoxHeight );
			} );
		}

		function translatePictureBox()
		{
			var pictureBoxes = $( '.picture_box' );

			$.each( pictureBoxes, function( index, pictureBox ) 
			{

				var translateX_speed = parseFloat( $( pictureBox ).attr( "translateX_speed" ) );

				var currentMarginLeft = $( pictureBox ).css( "margin-left" );
				var newMarginLeft = parseFloat( currentMarginLeft ) + translateX_speed * _GlobalSpeedFactor;

				if( newMarginLeft > 1400 )
				{
					$( pictureBox ).hide();
				}
				else
				{
					$( pictureBox ).show();
				}

				$( pictureBox ).css( "margin-left", newMarginLeft );

			} );
		}

		function showPicture()
		{
			randomPictureBox();

			setInterval( function()
			{ 
				translatePictureBox();

				if( _GlobalSpeedFactor > 1 )
				{
					_GlobalSpeedFactor -= DecreasingFactor;
				}
				else if( _GlobalSpeedFactor < 1 )
				{
					_GlobalSpeedFactor += DecreasingFactor;
				}

			} , 1 );

			$( "body" ).mousedown( function( event )
			{
				_MouseEventFlag = 1;

				_OldMousePositionX = event.pageX;
			} );

			$( "body" ).mousemove( function( event )
			{
				
				if( _MouseEventFlag == 1 )
				{
					_GlobalSpeedFactor = ( _OldMousePositionX - event.pageX ) * MousemoveFactor;
				}

			} );

			$( "body" ).mouseup( function()
			{
				_MouseEventFlag = 0;
			} );
		}


        $( document ).ready( function()
        {

			$.ajax( {
				url: "queryAllImage.php",
				context: document.body
			} ).done( function( data ) 
			{
				jsonObject = jQuery.parseJSON( data );
				// console.log( jsonObject )

				var index = 0;
				$.each( jsonObject, function( key, value )
				{
					index += 1;
					$( "body" ).append( "<a href='" + value + "'><div class='picture_box' id='pic_" + index + "' index='" + index + "'><div class='triangle-topleft'><div class='triangle-text'>" + index + "</div></div></div></a>" )
					$( "#pic_" + index ).css( "background-image", "url( " + value +" )" );
				} );

				showPicture();

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
				<div class="menu-1"><fonts style="color:#6ED9A1;">HOME</fonts></div>
				<a href="about.php"><div class="menu-2">ABOUT</div></a>
				<a href="portfolio.php"><div class="menu-3">PORTFOLIO</div></a>
				<a href="up.php"><div class="menu-4">UPLOAD</div></a>
				<a href="contact.php"><div class="menu-5">CONTACT</div></a>
			</div>
		</div>
		<div class="detail-bg-box">
			<div class="detail-box">
				PRESENTATION<br>
				ONLINE
			</div>
		</div>
	</div>
	<div class="about-bg-box">
		<div class="about-box">
			<div class="detail-header-box">ABOUT</div>
		</div>
		<div class="detail-about-bg-box">
			<div class="detail-about-box">เว็บไซต์ Presentation Online เป็นเว็บนำเสนอผลงาน<br>
				โดยสามารถนำงานมาแสดงได้ รวมถึงการให้ผู้ที่สนใจ<br>
				เข้ามารับชมเพื่อเป็นแรงบันดาลใจในการทำงาน
			</div>
		</div>
	</div>
	<div class="cata-bg-box">
		<div class="cata-header-bg-box">
			<div class="cata-header-box">TOP POPULAR</div>
		</div>
		<div class="cata-detail-bg-box">
			<div class="cata-subdetail-bg-box">
				<div class="cata-box-1">DESIGN</div>
				<a href="homeh-logo.php"><div class="cata-box-2">LOGO</div></a>
				<a href="homeh-graphic.php"><div class="cata-box-3">GRAPHIC</div></a>
				<a href="homeh-art.php"><div class="cata-box-4">ART</div></a>
				<a href="homeh-info.php"><div class="cata-box-5">INFOGRAPHIC</div></a>
				<a href="homeh-icon.php"><div class="cata-box-6">ICON</div></a>
			</div>
		</div>
	</div>
	<div class="show-box">
		<div class="show-bg-box">
			<div class="show-bg-subbox">
				<div class="show-box-1">
					<div class="status-box-1">
						<div id="name-status-box-1">SAMAPON BOONCHAMOI</div>
						<div id="tagname-status-box-1">DESIGNER-WEBSITE</div>
						<div id="statuslist-box-1">
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
				<div class="show-box-2">
					<div class="status-box-1">
						<div id="name-status-box-1">SAMAPON BOONCHAMOI</div>
						<div id="tagname-status-box-1">DESIGNER-WEBSITE</div>
						<div id="statuslist-box-1">
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
				<div class="show-box-3">
					<div class="status-box-1">
						<div id="name-status-box-1">SAMAPON BOONCHAMOI</div>
						<div id="tagname-status-box-1">DESIGNER-WEBSITE</div>
						<div id="statuslist-box-1">
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
				<div class="show-box-4">
					<div class="status-box-1">
						<div id="name-status-box-1">SAMAPON BOONCHAMOI</div>
						<div id="tagname-status-box-1">DESIGNER-WEBSITE</div>
						<div id="statuslist-box-1">
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
				<div class="show-box-5">
					<div class="status-box-1">
						<div id="name-status-box-1">SAMAPON BOONCHAMOI</div>
						<div id="tagname-status-box-1">DESIGNER-WEBSITE</div>
						<div id="statuslist-box-1">
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
				<div class="show-box-6">
					<div class="status-box-1">
						<div id="name-status-box-1">SAMAPON BOONCHAMOI</div>
						<div id="tagname-status-box-1">DESIGNER-WEBSITE</div>
						<div id="statuslist-box-1">
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
		</div>
	</div>
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