<?php
class Found extends Entry{
	private $pubkeyType;
	private $pubkey;	

	function __construct($date,$time,$server,$sessionId,$pubkeyType,$pubkey){
		$this->date=$date;
		$this->time=$time;
		$this->server=$server;
		$this->sessionId=$sessionId;
		$this->pubkeyType=$pubkeyType;
		$this->pubkey=$pubkey;	
		$this->connection=new DbConnection();
	}

	public function insert(){
		$statement="INSERT INTO found (logDate, logTime, server, sessionId, pubkeyType, pubkey) VALUES (:date, :time, :server, :sessionId, :pubkeyType, :pubkey)";
		$values=array(
			"date" => $this->date,
			"time" => $this->time,
			"server" => $this->server,
			"sessionId" => $this->sessionId,
			"pubkeyType" => $this->pubkeyType,
			"pubkey" => $this->pubkey
		);	
		$this->connection->insert($statement,$values);
	}

	public function printIt(){
		echo "$this->date $this->time @$this->server sessionId:$this->sessionId with $this->pubkeyType key: $this->pubkey\n";	
	}
}
