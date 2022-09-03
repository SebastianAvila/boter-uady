<?php 
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class User{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function userRegistration($name,$username,$password,$email){
    
    $name = $this->fm->validation($name);
    $username = $this->fm->validation($username);
    $password = $this->fm->validation($password);
    $email = $this->fm->validation($email);

    $name = mysqli_real_escape_string($this->db->link,$name);
    $username = mysqli_real_escape_string($this->db->link,$username);
    $email = mysqli_real_escape_string($this->db->link,$email);

    if ($name == "" || $username == "" || $password == "" || $email == "") {
      /*echo '<script>swal("Algo salió mal!", "Campos vacios", "error")</script>';*/
      echo "<br><div  style='padding: 5px;background-color: #f44336;color: white;border-radius: 5px;'><span style='margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #f44336;' onclick= this.parentElement.style.display='none';>&times;</span><strong style='background-color: #f44336;'>Mensaje: </strong>¡Los campos no deben estar vacíos!</div>";
      exit();
    }elseif (filter_var($email,FILTER_VALIDATE_EMAIL) === false) {
      /*echo '<script>swal("Algo salió mal", "Correo electrónico no válido", "error")</script>';*/
      echo "<br><div  style='padding: 5px;background-color: #f44336;color: white;border-radius: 5px;'><span style='margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #f44336;' onclick= this.parentElement.style.display='none';>&times;</span><strong style='background-color: #f44336;'>Mensaje: </strong>¡Dirección de correo no válido!</div>";
      exit();
    }else{
      $chkquery = "SELECT * FROM tbl_user WHERE email = '$email'";
      $chkresult = $this->db->select($chkquery);
      if ($chkresult != false) {
        /*echo '<script>swal("Algo salió mal", "La dirección ya existe", "error")</script>';*/
        echo "<br><div  style='padding: 5px;background-color: #f44336;color: white;border-radius: 5px;'><span style='margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #f44336;' onclick= this.parentElement.style.display='none';>&times;</span><strong style='background-color: #f44336;'>Mensaje: </strong>¡La dirección de correo ya existe!</div>";
        exit();
      }else{

         $password = mysqli_real_escape_string($this->db->link,md5($password));
        $query = "INSERT INTO tbl_user(name, username, password, email) VALUES('$name','$username','$password','$email')";
         $inserted_row = $this->db->insert($query);
         if ($inserted_row) {
            /*echo '<script>swal("Muy bien", "¡Registro exitoso!", "success")</script>';*/
            /*echo "<br><div  style='padding: 5px;background-color: #04AA6D;color: white;border-radius: 5px;'><span style='margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #04AA6D;' onclick= this.parentElement.style.display='none';>&times;</span><strong style='background-color: #04AA6D;'>Mensaje: </strong>¡Registro exitoso!</div>";*/
            echo '<script> location.href="inicio.php"; </script>';
            exit();
         }else{
            /*echo '<script>swal("Algo salió mal", "¡Registro no exitoso","error")</script>';*/
            echo "<br><div  style='padding: 5px;background-color: #f44336;color: white;border-radius: 5px;'><span style='margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #f44336;' onclick= this.parentElement.style.display='none';>&times;</span><strong style='background-color: #f44336;'>Mensaje: </strong>¡Registro no exitoso!</div>";
            exit();
         }
      }
    }

	}

  public function userLogin($email,$password){
    $email = $this->fm->validation($email);
    $password = $this->fm->validation($password);
    $email = mysqli_real_escape_string($this->db->link, $email);
   

    if ($email == "" || $password == "") {
      echo "empty";
      exit();
    }else{
      $password = mysqli_real_escape_string($this->db->link,md5($password));
      $query = "SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
      $result = $this->db->select($query);
      if ($result != false) {
       $value = $result->fetch_assoc();
       if ($value['status'] == '1') {
         echo "disable";
         exit();
       }else{

            Session::init();
            Session::set("login", true);
            Session::set("userid", $value['userid']);
            Session::set("username", $value['username']);
            Session::set("name", $value['name']);
            
       }
      }else{
        echo "error";
         exit();
      }
    }
    
  }

  public function getUserData($userid){
      $query = "SELECT * FROM tbl_user ORDER BY userid DESC";
       $result = $this->db->select($query);
       return $result;
  }

  public function updateUserData($userid, $data){

   $name = $this->fm->validation($data['name']);
    $username = $this->fm->validation($data['username']);
    $email = $this->fm->validation($data['email']);

    $name = mysqli_real_escape_string($this->db->link,$name);
    $username = mysqli_real_escape_string($this->db->link,$username);
    $email = mysqli_real_escape_string($this->db->link,$email);

    $query = "UPDATE tbl_user 
                SET
                name = '$name',
                username = '$username',
                email = '$email'
                WHERE userid = '$userid'";
                $updated_row = $this->db->update($query);
              if ($updated_row) {
                  $msg = "<br><div  style='padding: 5px;background-color: #04AA6D;color: white;border-radius: 5px;'><span style='margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #04AA6D;' onclick= this.parentElement.style.display='none';>&times;</span><strong style='background-color: #04AA6D;'>Mensaje: </strong>¡Datos de usuario actualizados!</div><br>";
                  return $msg;
                }else{
                     $msg = "<br><div  style='padding: 5px;background-color: #f44336;color: white;border-radius: 5px;'><span style='margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #f44336;' onclick= this.parentElement.style.display='none';>&times;</span><strong style='background-color: #f44336;'>Mensaje: </strong>¡Datos de usuario no actualizados!</div><br>";
                  return $msg;
                } 
  }

     public function getAllUser(){
       $query = "SELECT * FROM tbl_user";
       $result = $this->db->select($query);
       return $result;
    }

    public function disableUser($userid){
      $query = "UPDATE tbl_user 
                SET
                status = '1'
                WHERE userid = '$userid'";
                $updated_row = $this->db->update($query);
              if ($updated_row) {
                  /*$msg = "<center><div  style='padding: 5px;background-color: #04AA6D;color: white;border-radius: 5px;'><span style='margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #04AA6D;' onclick= this.parentElement.style.display='none';>&times;</span><strong style='background-color: #04AA6D;'>Mensaje: </strong>¡Usuario deshabilitado!</div></center>";*/
                  /*return $msg;*/
                  echo '<script> location.href="users.php"; </script>';
                }else{
                     $msg = "<center><div  style='padding: 5px;background-color: #f44336;color: white;border-radius: 5px;'><span style='margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #f44336;' onclick= this.parentElement.style.display='none';>&times;</span><strong style='background-color: #f44336;'>Mensaje: </strong>¡Usuario no deshabilitado!</div></center>";
                  return $msg;
                } 
    }

    public function enableUser($userid){

         $query = "UPDATE tbl_user 
                SET
                status = '0'
                WHERE userid = '$userid'";
                $updated_row = $this->db->update($query);
              if ($updated_row) {
                  /*$msg = "<center><div  style='padding: 5px;background-color: #04AA6D;color: white;border-radius: 5px;'><span style='margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #04AA6D;' onclick= this.parentElement.style.display='none';>&times;</span><strong style='background-color: #04AA6D;'>Mensaje: </strong>¡Usuario habilitado!</div></center>";*/
                  /*return $msg;*/
                  echo '<script> location.href="users.php"; </script>';
                }else{
                     $msg = "<center><div  style='padding: 5px;background-color: #f44336;color: white;border-radius: 5px;'><span style='margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #f44336;' onclick= this.parentElement.style.display='none';>&times;</span><strong style='background-color: #f44336;'>Mensaje: </strong>¡Usuario no habilitado!</div></center>";
                  return $msg;
                } 

    }

    public function deleteUser($userid){
             $query = "DELETE FROM tbl_user WHERE userid = '$userid'";
                $deldata = $this->db->delete($query);
              if ($deldata) {
                  /*$msg = "<center><div  style='padding: 5px;background-color: #04AA6D;color: white;border-radius: 5px;'><span style='margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #04AA6D;' onclick= this.parentElement.style.display='none';>&times;</span><strong style='background-color: #04AA6D;'>Mensaje: </strong>¡Usuario eliminado con éxito!</div></center>";*/
                  /*return $msg;*/
                  echo '<script> location.href="users.php"; </script>';
                }else{
                     $msg = "<center><div  style='padding: 5px;background-color: #f44336;color: white;border-radius: 5px;'><span style='margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #f44336;' onclick= this.parentElement.style.display='none';>&times;</span><strong style='background-color: #f44336;'>Mensaje: </strong>¡Usuario no eliminado!</div></center>";
                  return $msg;
                } 
    }
}


 ?>