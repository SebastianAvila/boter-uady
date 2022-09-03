<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
//Session::init();

class Process{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function processData($data){
		$selectedAns    = $this->fm->validation($data['ans']);
		$number         = $this->fm->validation($data['number']);
		$selectedAns    = mysqli_real_escape_string($this->db->link,$selectedAns);
		$number         = mysqli_real_escape_string($this->db->link,$number);
		$next           = $_SESSION["p"]++;

		$numAleatorio   = $_SESSION["numerosAleatorios"];
		$q = $numAleatorio[$number];
		$validacionResp = '';

		$_SESSION["q"] = $q;

		if (!isset($_SESSION['score'])) {
			$_SESSION['score'] = '0';
		}

		$total = $this->getTotal();
		$right = $this->rightAns($numAleatorio[$number-1]);

		if ($right == $selectedAns) {
			$_SESSION['score']++;
			$validacionResp = 'correcto';
			$_SESSION["validacionResp"] = $validacionResp;
		}else{
			$validacionResp = 'incorrecto';
			$_SESSION["validacionResp"] = $validacionResp;
		}

		if ($number >= 10) {
			header("Location:final.php");
			exit();
		}else{
			header("Location:test.php");
		}

	}

	private function getTotal(){
		$query = "SELECT * FROM tbl_ques";
		$getResult = $this->db->select($query);
		$total = $getResult->num_rows;
		return $total;

	}
	private function rightAns($number){
		$query = "SELECT * FROM tbl_ans WHERE quesNo = '$number' AND rightAns = '1'";
		$getdata = $this->db->select($query)->fetch_assoc();
		$result = $getdata['id'];
		return $result;
	}

}

?>