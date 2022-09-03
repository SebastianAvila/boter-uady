<?php 
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Exam{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

  public function addQuestions($data){
    
    $query = "SELECT MAX(quesNo) AS id FROM tbl_ques";
    $getData = $this->db->select($query);
    $result = $getData->fetch_assoc();

    $quesNo = $result["id"];
    $quesNo++;
    
    echo "<script>console.log('Console: " . $quesNo . "' );</script>";
    
    $ques = mysqli_real_escape_string($this->db->link,$data['ques']);
    $ans = array();
    $ans[1] = $data['ans1'];
    $ans[2] = $data['ans2'];
    $ans[3] = $data['ans3'];
    $ans[4] = $data['ans4'];
    $rightAns = $data['rightAns'];
    $query = "INSERT INTO tbl_ques(quesNo,ques) VALUES('$quesNo','$ques')";
    $inserted_row = $this->db->insert($query);
    if ($inserted_row) {
      foreach ($ans as $key => $ansName) {
        if ($ansName != '') {
         if ($rightAns == $key) {
           $rquery = "INSERT INTO tbl_ans(quesNo,rightAns,ans) VALUES('$quesNo','1','$ansName')";

         }else{
          $rquery = "INSERT INTO tbl_ans(quesNo,rightAns,ans) VALUES('$quesNo','0','$ansName')";
         }
         $insertrow = $this->db->insert($rquery);
         if ($insertrow) {
           continue;
         }else{
          die('Error....');
         }

        }
      }
     $msg = "<center><div  style='padding: 5px;background-color: #04AA6D;color: white;border-radius: 5px;'><span style='margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #04AA6D;' onclick= this.parentElement.style.display='none';>&times;</span><strong style='background-color: #04AA6D;'>Mensaje: </strong>¡Pregunta agregada!</div></center>";
     return $msg;

    }
  }

  public function getQueByOrder(){
    $query = "SELECT * FROM  tbl_ques ORDER BY quesNo ASC";
    $result = $this->db->select($query);
    return $result;
  }

  public function delQuestion($quesNo){

    $tables = array("tbl_ques","tbl_ans");
    foreach ($tables as $table) {
      $delquery = "DELETE FROM $table WHERE quesNo ='$quesNo'";
      $deldata = $this->db->delete($delquery);
    }
    if ($deldata) {
      $msg = "<center><div  style='padding: 5px;background-color: #04AA6D;color: white;border-radius: 5px;'><span style='margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #04AA6D;' onclick= this.parentElement.style.display='none';>&times;</span><strong style='background-color: #04AA6D;'>Mensaje: </strong>¡Datos eliminados!</div></center>";
      return $msg;
    }else{
      $msg = "<center><div  style='padding: 5px;background-color: #f44336;color: white;border-radius: 5px;'><span style='margin-left: 15px;color: white; font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;background-color: #f44336;' onclick= this.parentElement.style.display='none';>&times;</span><strong style='background-color: #f44336;'>Mensaje: </strong>¡Datos no eliminados!</div></center>";
      return $msg;
    }

  }

  public function getTotalRows(){
    $query = "SELECT * FROM tbl_ques";
    $getResult = $this->db->select($query);
    $total = $getResult->num_rows;
    return $total;
  }

  public function getQuestion(){

    $query = "SELECT * FROM tbl_ques";
    $getData = $this->db->select($query);
    $result = $getData->fetch_assoc();
    return $result;

  }

  public function idPreguntas(){
    $query = "SELECT quesNo FROM tbl_ques";
    $getData = $this->db->select($query);
    while ($row = $getData->fetch_assoc()) {
      $columnaQuestNo[] =  $row['quesNo'];  
    }
    return $columnaQuestNo;
  }

  public function getQuesByNumber($number){
    $query = "SELECT * FROM tbl_ques WHERE quesNo ='$number'";
    $getData = $this->db->select($query);
    $result = $getData->fetch_assoc();
    return $result;
  }

  public function getAnswer($number){
    $query = "SELECT * FROM tbl_ans WHERE quesNo ='$number'";
    $getData = $this->db->select($query);
    return $getData;
  }
}


 ?>