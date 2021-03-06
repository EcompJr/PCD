<?php 
	
	require_once("../db/Connection.class.php");

	class MembrosController {
		
		private $conn = null;

		function __construct()
		{
			$this->conn = Connection::getInstance();
		}

		public function auth($login, $senha){
			// acessar o banco
			// procurar por ela mesma
			// verificar se o valor de login e senha são iguais
			
			$conn = Connection::getInstance();
			$queryAuth = "SELECT * FROM usuarios WHERE login = \"$login\" AND password = \"$senha\";";
			$sql = $conn->query($queryAuth);
			$row = $sql->fetch(PDO::FETCH_ASSOC);
			
			return $row;
		}	
		
		public function cadastrarContas($login, $senha, $nome, $cargo, $privilegio){
			$conn = Connection::getInstance();
			$queryCad = "INSERT INTO usuarios (`login`, `password`, `name`, `occupation`, `score`, `history`, `privilege`) VALUES (\"$login\", \"$senha\", \"$nome\", \"$cargo\", \"20\", \" \", \"$privilegio\");";
			$sql = $conn->query($queryCad);
			return $sql;
		}

		//Funcao que retorna todas as contas cadastradas
		public function getContas(){

			$contas = [];
			$conn = Connection::getInstance();
			$query = "SELECT * FROM usuarios ORDER BY name ASC;";
			$sql = $conn->query($query);
			while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        	array_push($contas, $row);
       		}
			return $contas;
		}

		public function getContaById($id){

			$contas = [];
			$conn = Connection::getInstance();
			$query = "SELECT * FROM usuarios WHERE id=\"$id\";";
			$sql = $conn->query($query);
			while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        	array_push($contas, $row);
       		}
			return $contas;
		}
		//Funcao que retorna a conta referente ao id recebido como parametro
		public function getContaByNome($nome){

			$contas = [];
			$conn = Connection::getInstance();
			$query = "SELECT * FROM usuarios WHERE name=\"$nome\";";
			$sql = $conn->query($query);
			while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        	array_push($contas, $row);
       		}
			return $contas;
		}

		//Funcao que atualiza informacoes da conta
		public function editarConta($id, $login, $codedSenha, $nome, $cargo, $privilegio, $endereco, $foto, $email, $aniversario, $rg, $cpf, $telefone){

			$conn = Connection::getInstance();
			$query = "UPDATE usuarios SET login=\"$login\", password=\"$codedSenha\", name=\"$nome\", occupation=\"$cargo\", privilege=\"$privilegio\", address=\"$endereco\", photo=\"$foto\", email=\"$email\", birthday=\"$aniversario\", RG=\"$rg\", CPF=\"$cpf\" , phone=\"$telefone\" WHERE id=\"$id\";";
			$sql = $conn->query($query);
			
			return $sql;
		}

		//Funcao que atualiza informacoes da conta
		public function updateScore($newScore, $id){

			$conn = Connection::getInstance();
			$query = "UPDATE usuarios SET score=\"$newScore\" WHERE id=\"$id\";";
			$sql = $conn->query($query);
			
			return $sql;
		}

		//Funcao que deleta a conta
		public function deletarConta($id){

			$conn = Connection::getInstance();
			$query = "DELETE FROM usuarios WHERE id=\"$id\";";
			$sql = $conn->query($query);
			
			return $sql;
		}

		//Funcao que atualiza informacoes da conta
		public function reset($operation, $defaultValue){

			$conn = Connection::getInstance();
			if($operarion == 1){
				$query = "UPDATE usuarios SET password=\"$defaultValue\";";
			}else if($operation == 2){
				$query = "UPDATE usuarios SET score=\"$defaultValue\";";
			}else{
				return false;
			}
			$sql = $conn->query($query);
			
			return $sql;
		}

	}
?>