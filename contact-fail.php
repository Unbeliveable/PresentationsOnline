<html>
<head>
	<meta charset="UTF-8">
	<title>Presentation Online</title>
	<link rel="icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/contactfail-style.css"/>
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
				<a href="home.php"><div class="menu-1">HOME</div></a>
				<a href="about.php"><div class="menu-2">ABOUT</div></a>
				<a href="portfolio.php"><div class="menu-3">PORTFOLIO</div></a>
				<a href="up.php"><div class="menu-4">UPLOAD</div></a>
				<div class="menu-5"><fonts style="color:#6ED9A1;">CONTACT</fonts></div>
			</div>
		</div>
		<div class="detail-bg-box">
			<div class="detail-box">
				PRESENTATION<br>
				ONLINE
			</div>
		</div>
	</div>
	<div class="contact-header-box">
			<div class="detail-header-box">CONTACT US</div>
	</div>
	<div class="body-bg-box">
		<div class="bg-box">
			<div class="left-bg-box">
				<form action="contact_api.php" method="POST">
						<div class="text-1"><input type="text" id="p_name" name="p_name" placeholder="Name" value="<?=$_COOKIE[ "p_name" ]; ?>" ></div>
						<div class="text-2"><input type="text" id="p_lastname" name="p_lastname" placeholder="Last Name" value="<?=$_COOKIE[ "p_lastname" ]; ?>" ></div>
						<div class="text-3"><input type="text" id="p_email" name="p_email" placeholder="Email" value="<?=$_COOKIE[ "p_email" ]; ?>" ></div>
						<div class="text-4"><input type="text" id="p_phone" name="p_phone" placeholder="Phone" value="<?=$_COOKIE[ "p_phone" ]; ?>" ></div>
						<textarea class="message" class="materialize-textarea" rows="15" cols="15" name="p_message" placeholder="Message"></textarea>
						<div class="detail-nav-box">ไม่สามารถส่งการติดต่อได้ กรุณาลองติดต่อใหม่อีกครั้ง</div>
						<div class="submit"><input type="submit" value="SEND"></div>
				</form>
			</div>
			<div class="right-bg-box">
				<div class="header-right-bg-box">CONTACT US</div>
				<div class="detail-right-bg-box">
					<div class="detail-right-box"><i class="fa fa fa-phone"></i> 0866330221</div>
					<div class="detail-right-box"><i class="fa fa fa-envelope"></i> mone_unbeliveable@hotmail.com</div>
				</div>
				<div class="header-right-bg-box">ADDRESS</div>
				<div class="detail-right-bg-box">
					<div class="detail-right-box"><i class="fa fa-map-marker"></i> 57/11 Banpork Meung,<br>&nbsp;&nbsp;Samutsongkhram 75000</div>
				</div>
				<div class="header-right-bg-box">SOCIAL CONNECTED</div>
				<div class="detail-social-box">
					<div class="detail-right-box-1"><i class="fa fa-facebook-square"></i></div>
					<div class="detail-right-box-2"><i class="fa fa-google-plus-square"></i></div>
					<div class="detail-right-box-3"><i class="fa fa-twitter-square"></i></div>
				</div>
			</div>
		</div>
	</div>
	<div class="copy-bg-box">
		<div class="copy-box">© Copyright 2017 Presentations Online - All Rights Reserved. License: Thailand</div>
	</div>
</body>
</html>