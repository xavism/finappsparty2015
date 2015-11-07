<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<?php echo $data['site_title'];?>
	<?php echo $data['meta_keywords'];?>
	<?php echo $data['meta_description'];?>
	<?php echo $data['site_icon'];?>
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,300,300italic" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/public/css/weather-icons.css">
    <link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/public/css/weather-icons-wind.css">
	<link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/public/css/main.css">
	<?php echo $data['css'];?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    <script src="<?php echo SITE_ROOT; ?>/public/js/menu.js"></script>
    <script src="<?php echo SITE_ROOT; ?>/public/js/Chart.js"></script>
    <script src="<?php echo SITE_ROOT; ?>/public/js/gauge.js"></script>
	<?php echo $data['js'];?>

</head>
	
<body>

	<?php echo $data['menu']; ?>
	<div class="right">
		<div class="wrapper">

		<?php echo $data['header'];?>
		
		<?php echo $data['content'];?>
		
		<!--?php echo $data['footer'];?-->
		</div>
	</div>

</body>


<script src="<?php echo SITE_ROOT; ?>/public/js/graficas.js"></script>
</html>