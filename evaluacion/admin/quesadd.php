<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exm = new Exam();
?>
<style>
.adminpanel{width: 480px;color: #999;margin: 20px auto 0;padding: 30px;border: 1px solid #ddd;border-radius: 10px;}	

</style>

<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$addQue = $exm->addQuestions($_POST);
	}
	//Get Total
	$total = $exm->getTotalRows();
	$next = $total+1;

 ?>

<div class="main">
<h1>Panel de administración: Añadir preguntas</h1>

<?php 
if (isset($addQue)) {
	echo $addQue;
}

?>

<div class="adminpanel">
	
	<form action="" method="post">
		<table>
			<tr>
				<td>Pregunta:</td>
				<td></td>
				<td><input type="text"  name="ques" placeholder="Ingresa la Pregunta" required></td>
			</tr>

			<tr>
				<td>Opción 1:</td>
				<td></td>
				<td><input type="text"  name="ans1" placeholder="Ingresar opción 1" required></td>
			</tr>

			<tr>
				<td>Opción 2:</td>
				<td></td>
				<td><input type="text"  name="ans2" placeholder="Ingresar opción 2" required></td>
			</tr>

			<tr>
				<td>Opción 3:</td>
				<td></td>
				<td><input type="text"  name="ans3" placeholder="Ingresar opción 3" required></td>
			</tr>

			<tr>
				<td>Opción 4:</td>
				<td></td>
				<td><input type="text"  name="ans4" placeholder="Ingresar opción 4" required></td>
			</tr>

			<tr>
				<td>No. de respuesta correcta:</td>
				<td></td>
				<td><select name="rightAns" style="width: 100px;font-size: 14px;padding: 5px;border-color: white;" required>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
				</select></td>
			</tr>

			<tr>
				
				<td colspan="3" align="center">
					<input type="submit" value="Añadir pregunta">
				</td>
			</tr>

		</table>


	</form>

</div>

	
</div>
<?php include 'inc/footer.php'; ?>