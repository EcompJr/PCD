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
			$query = "SELECT * FROM advertences;";
			$sql = $conn->query($query);
			while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        	array_push($advertencias, $row);
       		}
			return $advertencias;
		}

		function searchForWarning($id){
            //conectar ao banco, criar a query, receber as linhas,  retornar a lista.
            $conn = Connection::getInstance();
            $query = "SELECT * FROM advertences WHERE id = \"$id\" ";
            $sql = $conn->query($query);
            $warning = $sql->fetch(PDO::FETCH_ASSOC);
            return $warning;
        }    

		//Funcao que retorna as advertencias referentes ao id passado
		public function getAdvertenciasById($id){

			$advertencias = [];
			$conn = Connection::getInstance();
			$query = "SELECT * FROM advertences WHERE id=\"$id\";";
			$sql = $conn->query($query);
			while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        	array_push($advertencias, $row);
       		}
			return $advertencias;
		}

		public function addAdvertenciaDB($motivo, $data, $pontos, $responsavel, $indeferida, $membroId, $membro){
			$conn = Connection::getInstance();
			$queryAdd = "INSERT INTO advertences (`reason`, `data`, `points`, `responsible`, `dismissed`, `memberId`, `member`) VALUES (\"$motivo\", \"$data\", \"$pontos\", \"$responsavel\", \"$indeferida\", \"$membroId\", \"$membro\");";
			$sql = $conn->query($queryAdd);
			return $sql;
		}

		//Funcao que atualiza informacoes da conta
		public function editarAdvertencia($member, $motivo, $data, $pontos, $responsavel, $indeferida, $advId, $memberId){

			$conn = Connection::getInstance();
			$query = "UPDATE advertences SET reason=\"$motivo\", data=\"$data\", points=\"$pontos\", responsible=\"$responsavel\", dismissed=\"$indeferida\", member=\"$member\", memberId=\"$memberId\" WHERE id=\"$advId\";";
			$sql = $conn->query($query);
			
			return $sql;
		}

		//Funcao que deleta a advertencia passada por parametro
		public function deletarAdvertencia($id){

			$conn = Connection::getInstance();
			$query = "DELETE FROM advertences WHERE id=\"$id\";";
			$sql = $conn->query($query);
			
			return $sql;
		}
	}
?>