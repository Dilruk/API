<?php
class dbInsert {
	function __construct() {		
	}    
	function insertToDB() {
		$connection = $this->getConnection("localhost","root","root","phpapi1");
		if($connection != null){
			$result = mysqli_query($connection,"INSERT INTO test (firstName, lastName, age, description)VALUES ('" . $_GET['firstName'] . "', '" . $_GET['lastName'] . "', " . $_GET['age'] . ", '" . $_GET['description'] . "')");
			//echo "INSERT INTO test (firstName, lastName, age, description)VALUES ('" . $_GET['firstName'] . "', '" . $_GET['lastName'] . "', " . $_GET['age'] . ", '" . $_GET['description'] . "')";
			if (!$result) {
				$contentAry = array('status' => 'error', 'message' => 'Error in query', 'error' =>array('error_message' => 'Error trying to execute code', 'code' => '501'));
				$this->sendResponce(501 , 'error' , $contentAry);
			} else {
				$contentAry = array('status' => 'created', 'message' => 'Successfully created', 'list' =>array('list_message' => 'insertion success', 'code' => '201'));
				$this->sendResponce(201 , 'created' , $contentAry);
			}
		} else {
			$contentAry = array('status' => 'error', 'message' => 'DB Connection Failed', 'error' =>array('error_message' => 'Error trying to connect to DB', 'code' => '500'));
			$this->sendResponce(500 , 'error' , $contentAry);
		}
		mysqli_close($connection);
	}
	
	function sendResponce($code, $status, $contentArray) {

		header('Content-Type: application/json');
		http_response_code($code);
		header('Code: ' .$code);
		header('Status: ' . $status);
		echo json_encode($contentArray);
		
	} 

	function getConnection($host, $userName, $password, $database) {
		// Create connection
		$con=mysqli_connect($host, $userName, $password, $database);

		// Check connection
		if (mysqli_connect_errno()) {
			$con = null;
		}
		return $con;
	} 	
}
?>
