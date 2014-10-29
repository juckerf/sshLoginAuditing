<?php
function __autoload($className){
	include "classes/class$className.php";
}
	if(count($argv)>1&&file_exists($argv[1])){
		$file = new SplFileObject($argv[1]);
		while(!$file->eof()){
			$line=explode(" ",$file->fgets());
			if(count($line)>1){
				$dateObject=DateTime::createFromFormat('M/d/Y',"$line[0]/$line[1]/".date('Y'));
				$date=$dateObject->format('Y-m-d');
				$time=$line[2];
				$server=$line[3];
				$sessionId=preg_replace('/(sshd).(\d+)../','$2',$line[4]);
				$messageType=strtolower($line[5]);
				switch($messageType){
					case 'found':
						$pubkeyType=$line[7];
						$pubkey=str_replace(array("\n","\r"),"",$line[9]);
						$entry=new Found($date,$time,$server,$sessionId,$pubkeyType,$pubkey);
						break;
					case 'accepted':
						$loginType=$line[6];
						$user=$line[8];
						$sourceIp=$line[10];
						$entry=new Accepted($date,$time,$server,$sessionId,$loginType,$user,$sourceIp);
						break;
					default:
						echo date("Y-m-d H:i:s").": ERROR - Unknown entry: '$line'\n";
						break;
				}
				echo date("Y-m-d H:i:s").": Succesfully inserted logs\n";
				$entry->insert();
			}
		}
	} else {
		echo date("Y-m-d H:i:s").": ERROR - invalid arguments\n";
		print_r($argv);
		echo "\n";
	}
	echo "\n";
?>
