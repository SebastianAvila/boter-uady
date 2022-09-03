<?php include 'inc/header.php'; ?>
<?php

	function numRandom($minimo, $maximo){
		$rand = range($minimo, $maximo);
		shuffle($rand);
		return $rand;
	}

	Session::checkSession();
	$question = $exm->getQuestion();
	$total = $exm->getTotalRows();
	$numAleatorios = numRandom(0,$total-1);

	$arregloQuestNo = $exm->idPreguntas();
	$arregloAleatorioQuestNo = Array();

	for ($i=0; $i < count($arregloQuestNo); $i++) { 
		$arregloAleatorioQuestNo[$i] = $arregloQuestNo[$numAleatorios[$i]];
	}

	$_SESSION["numerosAleatorios"] = $arregloAleatorioQuestNo;

	$q = $arregloAleatorioQuestNo[0];
	$p = 1;

	$_SESSION["q"] = $q;
	$_SESSION["p"] = $p;


?>
<div class="main">
<h1>Bienvenido a la Evaluación de ER</h1>
	<div class="starttest">
		<h2>Prueba tus conocimientos</h2>
		<center><p>Este es un cuestionario de opción múltiple para poner a prueba sus conocimientos</p></center>

		<ul>
			<center><li><strong>Numero de preguntas:</strong> <?php echo "10"; ?></li></center>
			<center><li><strong>Tipo de preguntas:</strong> Opción Múltiple</li></center>
		</ul>

		<a href="test.php">Iniciar Cuestionario</a>
		<br>

	</div>

  </div>
<?php include 'inc/footer.php'; ?>