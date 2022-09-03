<?php include 'inc/header.php'; ?>
<div class="main">
<h1>Evaluación - Registro de Estudiante</h1>
	<center><div class="segment">
	<form action="" method="post">
		<table>
		<tr>
           <td>Nombre: </td>
           <td><input type="text" name="name" id="name"></td>
         </tr>
		<tr>
           <td>Usuario: </td>
           <td><input name="username" type="text" id="username"></td>
         </tr>
         <tr>
           <td>Correo: </td>
           <td><input name="email" type="text" id="email" ></td>
         </tr>
         
         <tr>
           <td>Contraseña: </td>
           <td><input type="password" name="password" id="password"></td>
         </tr>
         <tr>
           <td></td>
           <td><input href="inicio.php" type="submit" id="regsubmit" value="Inscribirse">
           </td>
         </tr>
       </table>
	   </form>
     
     <span id="state"></span>
	</div></center>


	
</div>
<?php include 'inc/footer.php'; ?>