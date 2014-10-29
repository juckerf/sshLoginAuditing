<?php
class EntrySet{
	private $entrySet;

	function __construct(){
		$this->entrySet=new ArrayObject();
	}

	public function append($entry){
		$this->entrySet->append(new Entry($entry['logDate'],$entry['logTime'],$entry['server'],$entry['sessionId'],$entry['loginType'],$entry['user'],$entry['sourceIp'],$entry['pubkeyType'],$entry['pubkey']));
	}
	
	public function getJSON(){
		echo '{ "entries": [';
		$length=count($this->entrySet);
		for($i=0; $i<$length; $i++){
			$this->entrySet[$i]->getJSON();
			if($i<($length-1)){
				echo ',';
			}
		}
		echo ']}';
	}
}

