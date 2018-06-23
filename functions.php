<?php

function askDB($type, $objID, $db){
	$sql = "SELECT password FROM $type WHERE ".strtolower($type)."= '".$objID."'"; 
	$n = $db->get_var($sql);
	return $n;
}

function evalExpression($expr, $db){
	preg_match("/(.+\))\.(.+)/", $expr, $re);
	$row = $re[1];
	$field = $re[2];

	preg_match("/(.+)\((.+)\)/", $row, $rowRe);
	$type = $rowRe[1];
	$objID = $rowRe[2];
	return askDB($type, $objID,  $db);

	}
	function match($expression, $value, $db){
		$expressionValue = evalExpression($expression, $db);
		//echo "matching ".$expressionValue ." with ".$value;
		return ($expressionValue == $value);
	}

	function dbif($statement, $db){
		$tokens = preg_split("/[\s]+/",$statement);
		switch ($tokens[0]){
		case "exists":
			$Type = strtoupper($tokens[1]);
			$VAL = $tokens[2];
			$sql = "SELECT count(*) FROM ". $Type ." WHERE " .strtolower($Type)." = '".$VAL."'";
			$n = $db->get_var($sql);
			return $n; 
			break;
		case "match":
			return (match ($tokens[1],  $tokens[2], $db));
			break;
		default:
			return 0;
		
		}
	}
?>
