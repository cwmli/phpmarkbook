<?php	
	function QuerySQL($sql, $database){
		$r = $database->query($sql);
		return $r;
	}	

	function SelectData($data = '*', $table){
		$sql = "SELECT $data FROM $table";
		return $sql;
	}	
	
	function AddNewStudent($data1, $data2, $data3, $table = "Markbook"){
		$sql = "INSERT INTO $table (FirstName, LastName, StudentNum)
				VALUES('$data1', '$data2', '$data3')";
		
		return $sql;
	}
	
	function DeleteStudent($info, $tablecol, $table = "Markbook"){
		$sql = "DELETE FROM $table WHERE $tablecol = '$info'";
		return $sql;
	}
	
	function UpdateInfo($data, $editcol, $info, $infocol, $table){
		$sql = "UPDATE $table
				SET $col = [$data]
				WHERE $infocol = '$name'";
		QuerySQL($sql);		
	}
?>