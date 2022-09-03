<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exm = new Exam();
?>
<?php 

if (isset($_GET['delque'])) {
		$quesno = (int)$_GET['delque'];
		$delQue = $exm->delQuestion($quesno);
	}
 ?>

<div class="main">
	<h1>Panel de administración: Lista de preguntas</h1>

	<?php 
		if (isset($delQue)) {
			echo $delQue;
		}
	 ?>

<div class="quelist">
	<table class="tblone">
		
		<tr>
			<th width="10%">No.</th>
			<th width="70%">Preguntas</th>
			<th width="20%">Acción</th>
		</tr>

<?php 

$getData = $exm->getQueByOrder();
if ($getData) {
	$i = 0;
	while ($result = $getData->fetch_assoc()) {
		$i++;

 ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $result['ques']; ?></td>
			<td>
				<a href="?delque=<?php echo $result['quesNo'];?>">Eliminar</a>
			</td>

		</tr>

	<?php  }} ?>

	</table>

</div>

	
</div>
<?php include 'inc/footer.php'; ?>