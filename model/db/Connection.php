<?php
require_once("connectionVars.php");

class Connection{
	
    private $con;
    
	function __construct(){
		$this->con = mysqli_connect(
            SERVER_NAME, 
            USERNAME, 
            PASSWORD, 
            DB_NAME
        ) or die("Connection failed: " . mysqli_connect_error());

		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
	}

	function execute($query){
		return mysqli_query($this->con, $query);
	}

	function executeToJSON($query){
		$response = array();
		$result = $this->execute($query);

		while($row = mysqli_fetch_object($result)){
            $response[] = $row;
		}
		
		return json_encode($response);
	}
}

?>