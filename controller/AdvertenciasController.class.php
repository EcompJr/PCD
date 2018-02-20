<?php 
	
	require_once("../db/Connection.class.php");

	class AdvertenciasController {
		
		private $conn = null;

		function __construct()
		{
			$this->conn = Connection::getInstance();
		}

		public function getAdvertenciasDB(){

			$advertencias = [];
			$conn = Connection::getInstance();
			$query = "SELECT * FROM advertencias;";
			$sql = $conn->query($query);
			while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        	array_push($advertencias, $row);
       		}
			return $advertencias;
		}

		//Funcao que retorna as advertencias referentes ao id passado
		public function getAdvertenciasById($id){

			$advertencias = [];
			$conn = Connection::getInstance();
			$query = "SELECT * FROM advertencias WHERE id=\"$id\";";
			$sql = $conn->query($query);
			while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        	array_push($advertencias, $row);
       		}
			return $advertencias;
		}

		public function addAdvertenciaDB($motivo, $data, $pontos, $responsavel, $indeferida, $membroId){
			$conn = Connection::getInstance();
			$queryAdd = "INSERT INTO advertences (`reason`, `data`, `points`, `responsible`, `dismissed`, `memberId`) VALUES (\"$motivo\", \"$data\", \"$pontos\", \"$responsavel\", \"$indeferida\", \"$membroId\");";
			$sql = $conn->query($queryAdd);
			// $login = 'qwerty';
			// $senha = 'qwerty';
			// $nome = 'qwerty';
			// $cargo = 'qwerty';
			// $privilegio = true;
			// $queryCad = "INSERT INTO usuarios (`login`, `password`, `name`, `occupation`, `score`, `history`, `privilege`) VALUES (\"$login\", \"$senha\", \"$nome\", \"$cargo\", \"$pontos\", \" \", \"$privilegio\");";
			// $sql = $conn->query($queryCad);

			return $sql;
		}

		//Funcao que atualiza informacoes da conta
		public function editarAdvertencia($motivo, $data, $pontos, $responsavel, $indeferida, $advId){

			$conn = Connection::getInstance();
			$query = "UPDATE advertencias SET motivo=\"$motivo\", data=\"$data\", pontos=\"$pontos\", responsavel=\"$responsavel\", indeferida=\"$indeferida\" WHERE id=\"$advId\";";
			$sql = $conn->query($query);
			
			return $sql;
		}

		//Funcao que deleta a advertencia passada por parametro
		public function deletarAdvertencia($id){

			$conn = Connection::getInstance();
			$query = "DELETE FROM advertencias WHERE id=\"$id\";";
			$sql = $conn->query($query);
			
			return $sql;
		}
	}
?>