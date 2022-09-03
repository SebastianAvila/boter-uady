<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
?>
<div class="main">
<h1>Resultados</h1>

<div class="starttest">
	<center><p>¡Felicitaciones! Acaba de completar la prueba.</p></center>
	<center><p>Puntuación final: 

		<?php 
		if (isset($_SESSION['score'])) {
			echo $_SESSION['score'];
			unset($_SESSION['score']);
		}
		 ?>

	</p></center>

	<a href="viewans.php">Retroalimentación</a>
	<a href="exam.php">Iniciar de nuevo</a>
	<br>
</div>
	
  </div>
<?php include 'inc/footer.php'; ?>