<?php
	function dbif($statement, $db){
		$tokens = preg_split("/[\s]+/",$statement);
		switch ($tokens[0]){
		case "EXISTS":
			$Type = strtoupper($tokens[1]);
			$VAL = $tokens[2];
			$sql = "SELECT count(*) FROM ". $Type ." WHERE " .strtolower($Type)." = '".$VAL."'";
			$n = $db->get_var($sql);
			return $n; 
			break;
		default:
			return 0;
		
		}
	}
?>
