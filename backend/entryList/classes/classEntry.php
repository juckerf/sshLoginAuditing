<?php
class Entry{
	private $date;
	private $time;
	private $server;
	private $sessionId;
	private $loginType;
	private $user;
	private $sourceIp;
	private $pubkeyType;
	private $pubkey;

	function __construct($date, $time, $server, $sessionId, $loginType, $user, $sourceIp, $pubkeyType, $pubkey){
		$this->date=$date;
		$this->time=$time;
		$this->server=$server;
		$this->sessionId=$sessionId;
		$this->loginType=$loginType;
		$this->user=$user;
		$this->sourceIp=$sourceIp;
		if($this->loginType=="publickey"){
			$this->pubkeyType=$pubkeyType;
			$this->pubkey=$pubkey;
		}	
	}

	public function getJSON(){
		echo '{ "date":"'.$this->date.'", "time":"'.$this->time.'", "server":"'.$this->server.'", "sessionId":"'.$this->sessionId.'", "loginType":"'.$this->loginType.'", "user":"'.$this->user.'", "sourceIp":"'.$this->sourceIp.'", "pubkeyType":"'.$this->pubkeyType.'", "pubkey":"'.$this->pubkey.'" }';
	}
}

