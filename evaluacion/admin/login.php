<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/loginheader.php');
	include_once ($filepath.'/../classes/Admin.php');
	$ad = new Admin();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$adminData = $ad->getAdminData($_POST);
}

  ?>
<center><div class="main">
<center><h1>Inicio de Sesión de Administrador</h1></center>
<div class="adminlogin">
	<form action="" method="post">
		<table>
			<tr>
				<td>Usuario:</td>
				<td><input type="text" name="adminUser"/></td>
			</tr>
			<tr>
				<td>Contraseña:</td>
				<td><input type="password" name="adminPass"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login" value="Ingresar"/>
				<a href="../../contenedor.html">Regresar</a></td>
			</tr>

			<tr>
				<td colspan="2">
					<?php 
					if (isset($adminData)) {
						echo $adminData;
					}
					 ?>
				</td>
			</tr>
		</table>
	</from>

</div>
</div></center>

<?php include 'inc/footer.php'; ?>