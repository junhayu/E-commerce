<?php
class DbData {
	private $num_data = 0;
	function __construct(){
        if(!isset($this->db)){
            // Connect to the database
				require('database.php');
                $this->db = $conn;
            
        }
    }
	
	function getDbData($query){
			$dbData = array();
            $result = $this->db->query($query) or die("Error : ". $this->db->error);
				$this->num_data = $result->num_rows;
				while($row = $result->fetch_assoc()) {
				$dbData[] = $row;
				}
				$result->close();
			
        //Return user data
        return $dbData;
    }
	
	function getNumofdata(){
		return $this->num_data;
	}
}
?>