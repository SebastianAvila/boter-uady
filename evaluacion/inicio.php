<?php include 'inc/header.php'; ?>

<?php Session::checkLogin(); ?>

<div class="main">
	
	<h1>Evaluación - Inicio de Sesión</h1>
	
	<center><div class="segment">
		<br>
		<form action="" method="post">
			<table class="tbl">    
				<tr>
					<td>Correo: </td>
					<td><input name="email" type="text" id="email"></td>
				</tr>
				<tr>
					<td>Contraseña: </td>
					<td><input name="password" type="password" id="password"></td>
				</tr>
				
				<tr>
					<td></td>
					<td><input type="submit" id="loginsubmit" value="Ingresar">
					<a href="register.php">Registrarse</a></td>
				</tr>
			</table>
		</form>

		<br>

		<div class="segment2">
			<p><a href="../contenedor.html" class="exitC">Regresar</a></td></p>
		</div>
			
		<br>

		<div class="empty" style="display: none;padding: 5px;background-color: #f44336;color: white;border-radius: 5px;">
			<span style="margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #f44336;" onclick="this.parentElement.style.display='none';">&times;</span> 
			<strong style="background-color: #f44336;">Mensaje: </strong> Los campos no deben estar vacíos
		</div>

		<div class="error" style="display: none;padding: 5px;background-color: #f44336;color: white;border-radius: 5px;">
			<span style="margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #f44336;" onclick="this.parentElement.style.display='none';">&times;</span> 
			<strong style="background-color: #f44336;">Mensaje: </strong>El correo electrónico o la contraseña no coinciden
		</div>

		<div class="disable" style="display: none;padding: 5px;background-color: #f44336;color: white;border-radius: 5px;">
			<span style="margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #f44336;" onclick="this.parentElement.style.display='none';">&times;</span> 
			<strong style="background-color: #f44336;">Mensaje: </strong>Identificación de usuario inhabilitada
		</div>
	</div></center>
</div>

<?php include 'inc/footer.php'; ?>