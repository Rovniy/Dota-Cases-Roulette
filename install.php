<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dota2.gg Install</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/controls.js"></script>
</head>
<body>
<?php
require "/sys/api.php";

function install() {
	mysql_query("
	CREATE TABLE blog (
	  id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
	  tema VARCHAR(255),
	  text TEXT,  
	  date TIMESTAMP,
	  INDEX (tema)
	) DEFAULT CHARSET=cp1251;" 
	);

	if (mysql_error()) { echo mysql_error(); }
	else { echo "Готово!"; };
}
?>
<div class="container">
	<div class="row ptop50">
		<a class="btn btn-large btn-danger" href="?run=1">Запустить установку</a>
	</div>
</div>
<?php
	if (isset($_GET['run']==1)) {
		install();
}
?>
</body>
</html>