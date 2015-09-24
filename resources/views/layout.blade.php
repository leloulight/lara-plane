<!doctype html>
<html>
<head>
	<title>Sass Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- BXSLIDER -->
	<link rel="stylesheet" href="css/jquery.bxslider.css">

	<!-- FONT-AWESOME -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css" >

	<!--[if lt IE 9]>
		<script src="js/libs/html5shiv.min.js"></script>
	<![endif]-->
</head>
<body>

	<!-- begin wrap  -->
	<div class="wrap container">

		@yield('content');

	</div>
	<!-- end wrap -->

	<footer class="footer">

	</footer>

	<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src='js/libs/bootstrap.min.js'></script>
	<script src='js/libs/jquery.bxslider.min.js'></script>
	<script src='js/common.js'></script>
	<!-- <script src="js/build/global.min.js"></script> -->
</body>
</html>