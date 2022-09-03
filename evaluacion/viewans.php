<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();

$arregloAleatorioQuestNo = $_SESSION["numerosAleatorios"];


?>
<div class="main">
<h1>Retroalimentación de las <?php echo "10"; ?> preguntas</h1>
	<div class="viewans">
		<center><h4 style="background-color: #f4f4f4 ; border-radius: 5px; box-shadow: 1px 1px 1px 1px #999;">Las respuestas remarcadas en color <strong style="color:blue;">azul</strong> son las respuestas correctas.</h4></center>
		<br>
		<table> 
			<?php 
				$numPreguntasRealizadas = [];
				$preguntasRealizadas = [];
				$contador = 0;
				$getQues = $exm->getQueByOrder();

				if ($getQues) {
					while ($question = $getQues->fetch_assoc()) {

						$i = 0;

						for ($i=0; $i < 10; $i++) { 
							if ($arregloAleatorioQuestNo[$i] === $question['quesNo']) {
								$numPreguntasRealizadas[$i] = $question['quesNo'];
								$preguntasRealizadas[$i] = $question['ques'];
								$contador++;
							}
						}

						if ($contador >= 10) {
							break;
						}
					}
				}
			?>

			<?php 
				$j = 0;

				for ($j=0; $j < 10; $j++){ 
			?>
					<tr>
						<td colspan="2">
							<br>
					 		<h3>Pregunta <?php echo $j+1; ?>: <?php echo $preguntasRealizadas[$j]; ?></h3>
						</td>
					</tr>

					<?php 
						$number = $numPreguntasRealizadas[$j];
						$answer = $exm->getAnswer($number);
						if ($answer) {
							while ($result = $answer->fetch_assoc()) {
					?>

								<tr>
									<td>
									 <input type="radio"/>
									 	<?php 
											if ($result['rightAns'] == '1') {
											 	echo "<span style='color:blue'>".$result['ans']."</span>"; 
											 }else{
											 echo $result['ans']; 
											}
									 	?>
									</td>
								</tr>
					<?php
							}
						} 
					?>

			<?php
				}
			?>
			
		</table>
		<a href="starttest.php">Iniciar de nuevo</a>
	</div>
</div>
<?php include 'inc/footer.php'; ?>