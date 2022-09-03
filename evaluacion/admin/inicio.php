<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<style>
.adminpanel{width: 700px;color: #999;margin: 30px auto 0;padding: 50px;border: 1px solid #ddd;}	

</style>

<div class="main">
<center><h1>Panel Administrativo</h1></center>

<div class="adminpanel">
	<center><h2>Bienvenido al panel de administración</h2></center>
	<center><p>Puede administrar los estudiantes y el sistema de evaluación.</p></center>
</div>

	
</div>
<?php include 'inc/footer.php'; ?>