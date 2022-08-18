<?php
/**
 *		[HoaKhuya] (C)2010-2099 Hacking simple source Orzg.
 *		Drark license payto BitcoinAddress: 1HikvH2jnMNg4rDJHykMMk31gpyr2qrhU4
 *		Coders : develop@execs.com;yuna.elin@yandex.ru;tonghua@dr.com;
 *
 *		$Id: else.php [BuildDB.155478522] 10/07/2017 5:20 CH $
	
*/

include 'incl/database.php';
$U = new user;
?>
<html>
<head>
<title><?php echo title;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta name="referrer" content="always">
<meta name="keywords" content="Shota, Shota.one, Shota URL, Shortener, shorten" />
<meta name="description" content="<?php echo description;?>" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<!-- CSS -->
	<link href="incl/theme/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="incl/theme/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="incl/theme/css/main.css" rel="stylesheet" type="text/css">
	<link href="incl/theme/css/my-custom-styles.css" rel="stylesheet" type="text/css">
	<link href="incl/theme/css/skins/transparent.css" rel="stylesheet" type="text/css">
	<script src="incl/theme/js/jquery/jquery-2.1.0.min.js"></script>
	<script src="incl/theme/js/clipboard.min.js"></script>
	<script src="incl/theme/js/plugins/jquery-gritter/jquery.gritter.min.js"></script>
	<!--[if lte IE 9]>
		<link href="assets/css/main-ie.css" rel="stylesheet" type="text/css"/>
		<link href="assets/css/main-ie-part2.css" rel="stylesheet" type="text/css"/>
	<![endif]-->

</head>
<body  class="sidebar-fixed topnav-fixed dashboard2">
	<!-- WRAPPER -->
	<div id="wrapper" class="wrapper">
		<!-- TOP BAR -->
		<div class="top-bar navbar-fixed-top">
			<div class="container">
				<div class="clearfix">
					<a href="#" class="pull-left toggle-sidebar-collapse"><i class="fa fa-bars"></i></a>
					<!-- logo -->
					<div class="pull-left left logo">

					</div>
					<!-- end logo -->
					<div class="pull-right right">
						<!-- search box -->
						<!-- end search box -->
						<!-- top-bar-right -->
						<div class="top-bar-right">
							<!-- logged user and the menu -->
							<?php $U = new user;echo $U->topmenu();?>

							<!-- end logged user and the menu -->
						</div>
						<!-- end top-bar-right -->
					</div>
				</div>
			</div>
			<!-- /container -->
		</div>
</div>
		<!-- END TOP BAR -->
		<!-- LEFT SIDEBAR -->
		<div id="left-sidebar" class="left-sidebar ">
			<!-- main-nav -->
			<div class="sidebar-scroll">
				<nav class="main-nav">
					<ul class="main-menu">
						<li class="active"><a href="#" class="js-sub-menu-toggle"><i class="fa fa-dashboard fa-fw"></i><span class="text">Home</span>
							<i class="toggle-icon fa fa-angle-left"></i></a>
							<ul class="sub-menu open">
								<li><a href="index.php"><span class="text">Shorten</span></a></li>
								<li class="active"><a href="else.php?user=top"><span class="text">Management</span></a></li>
						<!--
								<li><a href="?user=login"><span class="text">Login</span></a></li>
								!-->
							</ul>
						</li>
					</ul>
				</nav>
				<!-- /main-nav -->
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN CONTENT WRAPPER -->
		<div id="main-content-wrapper" class="content-wrapper ">
			<!-- top general alert -->

			<!-- end top general alert -->
			<div class="row">
				<div class="col-lg-4 ">
					<ul class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="#">Home</a></li>
						<li><a class="active" href="#">Management</a></li>
					</ul>
				</div>
			</div>
			<!-- main -->
			<div class="content">
				<div class="main-header" style="margin-bottom: 20px;">
					<h2><?php echo sitename;?></h2>
					<em>Management</em>
				</div>
				<div class="main-content">
					<div class="widget-content">
						<div class="row">
<?php
				echo $U->theme();
				
				
				
				
?>

				</div>
			</div>
	</div>
			<!-- /main -->
			<!-- FOOTER -->
			<footer class="footer footer-fixed">
				<?php echo footer;?>
			</footer>
			<!-- END FOOTER -->
		</div>
		<!-- END CONTENT WRAPPER -->
	</div>
	<script src="incl/theme/js/bootstrap/bootstrap.js"></script>
	<script src="incl/theme/js/plugins/modernizr/modernizr.js"></script>
	<script src="incl/theme/js/plugins/bootstrap-tour/bootstrap-tour.custom.js"></script>
	<script src="incl/theme/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="incl/theme/js/king-common.js"></script>
	<script src="incl/theme/js/plugins/jquery-maskedinput/jquery.masked-input.min.js"></script>

	
		<script type="text/javascript" charset="utf-8">
			
		var flashMsgSound = new Audio();
		var offlineSound = new Audio();

		if ( navigator.userAgent.match("Firefox/") ) {
			flashMsgSound.src = "incl/theme/audio/flash-message.ogg";
			offlineSound.src = "incl/theme/audio/offline.ogg";
		}else {
			flashMsgSound.src = "incl/theme/audio/flash-message.mp3";
			offlineSound.src = "incl/theme/audio/offline.mp3";
		}
		
		</script>

</body>
</html>
	