<?php

//require_once "../Models/Membro.class.php" ;
require_once "../controller/MembrosController.class.php" ;
require_once "../controller/AdvertenciasController.class.php" ;

session_start();

	if(isset($_POST['resetAttempt'])){
		$operation = 1;
		$senha = "12345";
		$codedSenha = sha1($senha);
		$membrosController = new MembrosController();
		$done = $membrosController->reset($operation, $codedSenha);
		if($done){
			header("location:../view/login.php?reset=1");
		}
		header("location:../view/login.php?reset=1");	
	}

	if(isset($_POST['resetAttempt2'])){
		$score = 20;
		$operation = 2;
		$membrosController = new MembrosController();
		$done = $membrosController->reset($operation, $score);
		if($done){
			header("location:../view/login.php?reset=1");
		}
		header("location:../view/login.php?reset=1");	
	}

    //Login	
	if (isset($_POST['loginAttempt'])){
		
		$login = $_POST['login'];
		$senha = $_POST['password'];
		$codedSenha = sha1($senha);
		unset($_POST['loginAttempt']);

		$membrosController = new MembrosController();
		$user = $membrosController->auth($login, $codedSenha);
		if ($user) {

            $_SESSION['auth']  = true;     
			$_SESSION['cargo'] = $user['occupation'];
			$_SESSION['nome'] = $user['name'];
			$_SESSION['uid'] = $user['id'];

			//coloquei pra checar se o usuario tem a palavra "Diretor no campo "occupation" do banco.
			if (preg_match('/\Diretor\b/',$user['occupation'] )) {
				header("location:../view/perfil.php?id=".$user['id']);			
			}else if (preg_match('/\Conselheiro\b/',$user['occupation'] )){
				header("location:../view/perfil.php?id=".$user['id']);
			}else{
				header("location:../view/perfil.php?id=".$user['id']);
			}
			
		}else {
			//var_dump($user);
			header("location:../view/login.php?valid=false");
	
		}
    }
    
    //Logout
    if (isset($_GET['action']) && $_GET['action'] == "logoff") {
       
        unset($_SESSION['auth']);
        unset($_GET['action']);
        // header("location:../view/login.php");
        session_destroy();     
	}

	//Cadastro
	if(isset($_POST['register'])){
        
        $login = $_POST['loginCad'];
        $senha = $_POST['senhaCad'];
        $nome = $_POST['nomeCad'];
        $cargo = $_POST['selectCargo'];
        
        $privilegio = null;
        if($cargo=="Conselheiro" || $cargo=="Diretor"){
            $privilegio = '1';
        }else {
            $privilegio = '0';
        }

        $codedSenha = sha1($senha);
        unset($_POST['register']);

        $membrosController = new MembrosController();
        $cad = $membrosController->cadastrarContas($login, $codedSenha, $nome, $cargo, $privilegio);
        if($cad){
            header("location:../view/contas.php?cad=true");
        }else{
            header("location:../view/contas.php?cad=false");
        }
	}

	//Editar Conta
	if(isset($_POST['editConta'])){
        
        $login = $_POST['loginCad'];
        $senha = $_POST['senhaCad'];
        $nome = $_POST['nomeCad'];
		$cargo = $_POST['selectCargo'];
		$id = $_POST['Id'];
		$endereco = $_POST['enderecoCad'];
		$foto = $_POST['fotoCad'];
		$email = $_POST['emailCad'];
		$aniversario = $_POST['aniversarioCad'];
		$rg = $_POST['rgCad'];
		$telefone = $_POST['telefoneCad'];
		$cpf = $_POST['cpfCad'];
		
        $privilegio = null;
        if($cargo=="Conselheiro" || $cargo=="Diretor"){
            $privilegio = '1';
        }else {
            $privilegio = '0';
        }

        $codedSenha = sha1($senha);
        unset($_POST['register']);

        $membrosController = new MembrosController();
        $c = $membrosController-> editarConta($id, $login, $senha, $nome, $cargo, $privilegio, $endereco, $foto, $email, $aniversario, $rg, $cpf, $telefone);

        if($c){
            header("location:../view/contas.php?cad=true");
        }else{
            header("location:../view/contas.php?cad=false");
        }
	}

	
	//Delete Account
	if(isset($_GET['delAcc'])){
	
        $membrosController = new MembrosController();
		$del = $membrosController->deletarConta($_GET['delAcc']);	
		//nao funcionou a verificacao, mas a funcao sim
		if($del > '0'){
			header("location:../view/advertencias.php?delete=true");
		}else{
			header("location:../view/advertencias.php?delete=false");
		}
	}

	//Carregar Contas
    if (isset($_POST['loadContas']) && $_POST['loadContas'] == "contas") {

		unset($_POST['loadContas']);
		$membrosController = new MembrosController();
		$contas = $membrosController->getContas();
		echo json_encode($contas);  
	}

	//Carregar Advertencias
	if (isset($_POST['loadAdvs']) && $_POST['loadAdvs'] == "advertences") {

		unset($_POST['loadAdvs']);
		$advController = new AdvertenciasController();
		$advertencias = $advController->getAdvertenciasDB();
		echo json_encode($advertencias);  
	}

	//Editar uma advertencia específica
	if (isset($_POST['editAdvertence'])) {
		
		$idAdv = $_POST['idAdv'];
		$motivo = $_POST['selectMotivo'];
        //$qtdDias= $_POST['qtdDias'];
		$data = $_POST['dataAdv'];
		$qtdAtualDePontos = $_POST['pontos'];
		$penalizado = $_POST['penalizado'];
		$responsavel = $_POST['responsavel'];
		$indeferida = $_POST['indeferida'];

        $advsController = new AdvertenciasController();
		
		$adv = $advsController->searchForWarning($idIdv);
		$qtdAnteriorDePontos = $adv[0]['points'];
		$membroId = $adv[0]["memberId"];
		
		/*var_dump($idAdv);
		var_dump($motivo);
		var_dump($data);
		var_dump($pontos);
		var_dump($penalizado);
		var_dump($responsavel);
		var_dump($indeferida);
		*/
		
		$membrosController = new MembrosController();
		$a = $advsController->editarAdvertencia($penalizado, $motivo, $data, $pontos, $responsavel, $indeferida, $idAdv, $membroId);
		if($a == TRUE){
			$conta = $membrosController->getContaById($membroId);
			$newScore = ($conta[0]['score'] + $qtdAnteriorDePontos) - $qtdAtualDePontos;
			$membrosController->updateScore($newScore, $membroId);
			header("location:../view/advertencias.php?edit=true");
		}else{
			header("location:../view/advertencias.php?edit=false");
		}
		
			
	}

    //Adicionar advertencia
	if(isset($_POST['addAdvertence'])){
		
		unset($_POST['addAdvertence']);
		
		$motivo = $_POST['selectMotivo'];
		$data = $_POST['dataAdv'];
		$pontos = $_POST['pontos'];
		$responsavel = $_POST['responsavel'];
		$indeferida = $_POST['selectIndef'];
		$membroId = $_POST['selectPenalizado'];

		$membrosController = new MembrosController();
		$conta = $membrosController->getContaById($membroId);
		$membro = $conta[0]['name'];

		$advController = new AdvertenciasController();
		$add = $advController->addAdvertenciaDB($motivo, $data, $pontos, $responsavel, $indeferida, $membroId, $membro);
		
		if($add){
			$newScore = $conta[0]['score'] - $pontos;
			$membrosController->updateScore($newScore, $membroId);
			header("location:../view/advertencias.php?add=true");
		}else{
			header("location:../view/advertencias.php?add=false");
		}

	}

	//Delete ADV
	if(isset($_GET['delAdv'])){
		$idAdv = $_GET['delAdv'];
		
		$advController = new AdvertenciasController();
		$adv = $advController->searchForWarning($idAdv);
		
		$points = $adv[0]['points'];
		$membroId = $adv[0]["memberId"];
		
		$membrosController = new MembrosController();
		$del = $advController->deletarAdvertencia($_GET['delAdv']);	
		//nao funcionou a verificacao, mas a funcao sim
		
		//esse método n está sendo usando, pq tem uma rotina em javascript sobrescrevendo ela em advetencias.js
		if($del > '0'){
			$conta = $membrosController->getContaById($membroId);
			$newScore = $conta[0]['score'] + $points;
			$b = $membrosController->updateScore($newScore, $membroId);
			if($b)
				header("location:../view/advertencias.php?delete=true");
			else{
				var_dump($b);
			}
		}else{
			header("location:../view/advertencias.php?delete=false");
		}
	}
?>