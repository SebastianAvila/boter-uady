<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');
	$usr = new User();
?>
<?php 
	if (isset($_GET['dis'])) {
		$dblid = (int)$_GET['dis'];
		$dblUser = $usr->disableUser($dblid);
	}

	if (isset($_GET['ena'])) {
		$ebllid = (int)$_GET['ena'];
		$eblUser = $usr->enableUser($ebllid);
	}

	if (isset($_GET['del'])) {
		$delid = (int)$_GET['del'];
		$delUser = $usr->deleteUser($delid);
	}


 ?>

<div class="main">
	<center><h1>Panel de administración: Estudiantes</h1></center>

	<?php 
		if (isset($dblUser)) {
			echo $dblUser;
		}

		if (isset($eblUser)) {
			echo $eblUser;
		}

		if (isset($delUser)) {
			echo $delUser;
		}

	 ?>
<div class="manageuser">
	<table class="tblone">
		
		<tr>
			<th>No</th>
			<th>Nombre</th>
			<th>Usuario</th>
			<th>Email</th>
			<th>Acción</th>
		</tr>

<?php 
$userData = $usr->getAllUser();
if ($userData) {
	$i = 0;
	while ($result = $userData->fetch_assoc()) {
		$i++;

 ?>
		<tr>
			<td><?php 
				if ($result['status'] == '1') {
					echo "<span class='error'>".$i."</span>"; 
				}else{
					echo $i;
				}
			

			?></td>
			<td><?php echo $result['name'] ; ?></td>
			<td><?php echo $result['username'] ; ?></td>
			<td><?php echo $result['email'] ; ?></td>
			<td>

				<?php
					if ($result['status'] == '0') { ?>
						<a style="color: white;background-color: red;" href="?dis=<?php echo $result['userid'];?>">Deshabilitar</a>
					<?php } else{ ?>
						<a style="color: white;background-color: green;" href="?ena=<?php echo $result['userid'];?>">Habilitar</a>
					<?php }?>
				<a style="color: black;background-color: white;" href="?del=<?php echo $result['userid'];?>">Eliminar</a>
			</td>

		</tr>

	<?php }} ?>

	</table>

</div>

	
</div>
<?php include 'inc/footer.php'; ?>