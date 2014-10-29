<?php
class Accepted extends Entry{
	private $loginType;
	private $user;	
	private $sourceIp;

	function __construct($date,$time,$server,$sessionId,$loginType,$user,$sourceIp){
		$this->date=$date;
		$this->time=$time;
		$this->server=$server;
		$this->sessionId=$sessionId;
		$this->loginType=$loginType;
		$this->user=$user;	
		$this->sourceIp=$sourceIp;
		$this->connection=new DbConnection();
	}


	public function insert(){
		$statement="INSERT INTO accepted (logDate, logTime, server, sessionId, loginType, user, sourceIp) VALUES (:date, :time, :server, :sessionId, :loginType, :user, :sourceIp)";
		$values=array(
			"date" => $this->date,
			"time" => $this->time,
			"server" => $this->server,
			"sessionId" => $this->sessionId,
			"loginType" => $this->loginType,
			"user" => $this->user,
			"sourceIp" => $this->sourceIp
		);	
		$this->connection->insert($statement,$values);
	}

	public function printIt(){
		echo "$this->date $this->time $this->user@$this->server sessionId:$this->sessionId per $this->loginType from $this->sourceIp\n";	
	}
}
