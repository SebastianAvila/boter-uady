<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
$userid = Session::get("userid");
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$updateUser = $usr->updateUserData($userid, $_POST);

}

?>
<style>
	.profile{width: 440px;margin: 0 auto;border: 1px solid #ddd;padding: 30px 50px 50px 138px;}
</style>

<div class="main">
<h1>Tu perfil</h1>
<div class="profile">

   <?php 
if (isset($updateUser)) {
	echo $updateUser;
}

	 ?>
	<form action="" method="post">
	<?php
	$getData = $usr->getUserData($userid);
	if ($getData) {
	//here we can skip while loop for fetching 1 row data
		$result = $getData->fetch_assoc();
	?>
		<table class="tbl"> 
		     <tr>
			   <td>Nombre: </td>
			   <td><input name="name" type="text" value="<?php echo $result['name'] ?>" /></td>
			 </tr> 
			  <tr>
			   <td>Usuario: </td>
			   <td><input name="username" type="text" value="<?php echo $result['username'] ?>"/></td>
			 </tr>  
			 <tr>
			   <td>Correo: </td>
			   <td><input name="email" type="text" value="<?php echo $result['email'] ?>"/></td>
			 </tr>		 
			  <tr>
			  <td></td>
			   <td><input type="submit" value="Actualizar">
			   </td>
			 </tr>
       </table>

   <?php } ?>
	   </form>	
	   </div>
</div>
<?php include 'inc/footer.php'; ?>