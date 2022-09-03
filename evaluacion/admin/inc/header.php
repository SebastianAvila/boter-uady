<?php 

    include_once ("../lib/Session.php");
    Session::checkAdminSession();
    include_once ("../lib/Database.php");
    include_once ("../helpers/Format.php");
	$db  = new Database();
	$fm  = new Format();

?>
<?php
header("Content-Type: text/html; charset=utf-8");
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); 
header("Pragma: no-cache"); 
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<!doctype html>
<html>
<head>
	<title>Profesor</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<link rel="shortcut icon" href="../../img/iconBOTER.png" type="image/x-icon">
	<link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="phpcoding">
	<section class="headeroption"></section>

	<?php 
	if (isset($_GET['action']) && $_GET['action'] == 'logout') {
		Session::destroy();
		header("Location:login.php");
		exit();
	}
	 ?>
		<section class="maincontent">
		<div class="menu">
		<ul>
			<li><a href="inicio.php">Inicio</a></li>
			<li><a href="users.php">Administrar usuario</a></li>
			<li><a href="quesadd.php">Añadir pregunta</a></li>
			<li><a href="queslist.php">Lista de preguntas</a></li>
			<li><a href="?action=logout">Cerrar sesión</a></li>
		</ul>
	 </div>
	