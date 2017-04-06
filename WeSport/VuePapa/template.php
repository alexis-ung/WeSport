<?php 
	if(!defined('CONST_INCLUDE'))
	die('Acces direct interdit!');
	$titre=$print_data['titre'];
	$contenu=$print_data['contenu'];

?>			
<html>
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>	<?php echo"$titre";?></title>
	</head>
	<body>


		<section>
			<?php echo "$contenu";?>
		</section>


	</body>
</html>