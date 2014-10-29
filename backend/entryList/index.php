<?php
	function __autoload($className){
		include "classes/class$className.php";
	}

	header("Access-Control-Allow-Orgin: *");
    header("Access-Control-Allow-Methods: *");
    header("Content-Type: application/json");
	
	$connection=new DbConnection();
	$statement="SELECT a.logDate, a.logTime, a.server, a.sessionId, a.loginType, f.pubkeyType, f.pubkey, a.user, a.sourceIp FROM accepted a LEFT JOIN found f ON (f.logDate=a.logDate AND f.logTime=a.logTime AND f.server=a.server AND f.sessionId=a.sessionId) ORDER BY a.logDate DESC, a.logTime DESC";
	$result=$connection->fetch($statement);
	$entrySet=new EntrySet();
	foreach($result as $entry){
		$entrySet->append($entry);	
	}
	$entrySet->getJSON();
?>		
