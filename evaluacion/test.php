<?php include 'inc/header.php'; ?>
<?php

	Session::checkSession();

	if (isset($_SESSION['q']) && isset($_SESSION['p'])) {
		$number = (int) $_SESSION['q'];
		$numPregunta = (int) $_SESSION['p'];
	}else{
		header("Location:Exam.php");
	}

	if ($numPregunta > 1) {
		$validacionResp = $_SESSION['validacionResp'];
		if ($validacionResp === "correcto") {
			echo '<script>swal("¡Correcto!", "Sigue sumando puntos", "info")</script>';
		}else{
			echo '<script>swal("Incorrecto", "Punto no concedido", "error")</script>';
		}
	}

	$total = $exm->getTotalRows();
	$question = $exm->getQuesByNumber($number);
?>

<?php 

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$process = $pro->processData($_POST);
	}

?>

<div class="main">
	<h1>Pregunta <?php echo $numPregunta; ?> de <?php echo "10"; ?></h1>
	<div class="test">
		<form method="post" action="">
			<table> 
				<tr>
					<td colspan="2">
						<h3>Pregunta <?php echo $numPregunta; ?>: <?php echo $question['ques']; ?></h3>
					</td>
				</tr>

				<?php 

				$answer = $exm->getAnswer($number);
				if ($answer) {
					while ($result = $answer->fetch_assoc()) {

				?>

						<tr>
							<td>
								<input type="radio" name="ans" value="<?php echo $result['id']; ?>" /><?php echo $result['ans']; ?>
							</td>
						</tr>
				
				<?php }} ?>

					<tr>
						<td>
							<input type="submit" name="submit" value="Siguiente"/>
							<input type="hidden" name="number" value="<?php echo $numPregunta; ?>" />
						</td>
					</tr>

				</table>
			</form>
			<center><p>Puntuación actual:

				<?php 
				
					if (isset($_SESSION['score'])) {
						echo $_SESSION['score'];
					}else{
						echo 0;
					}

				?>

			</p></center>
		</div>
	</div>
<?php include 'inc/footer.php'; ?>