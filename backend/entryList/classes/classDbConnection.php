<?php
	class DbConnection{
		private $server="localhost";
		private $user="root";
		private $password="abc123";
		private $db="sshLoginAuditing";
		private $conn;
		
		private function connect(){
			try{
				$this->conn=new PDO("mysql:host=$this->server;dbname=$this->db",$this->user,$this->password);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		public function insert($statement, $values){
			$this->connect();
			/*echo $statement;
			print_r($values);*/
			$pStatement=$this->conn->prepare($statement);
			try{
				$pStatement->execute($values);
			} catch(PDOException $e){
				if($e->getCode()==23000){
					if($e->errorInfo[1]==1062){
						;
					}
				}else{
					echo $e->getMessage();
				}	
			}
		}

		public function fetch($statement){
			$this->connect();
			$result=$this->conn->query($statement);
			return $result->fetchAll();
		}

	}
?>
