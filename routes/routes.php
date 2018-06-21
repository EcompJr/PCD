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
		$done = $membrosController->resetSenhas($operation, $codedSenha);
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
				header("location:../view/painel.php");			
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
		$motivo = $_POST['motivo'];
        $qtdDias= $_POST['qtdDias'];
        $pontos = $_POST['points'];
		$membro = $_POST['membro'];
		$responsavel = $_POST['resp'];
		$indeferida = $_POST['idIndef'];

        $advsController = new AdvertenciasController();
        $a = $advsController->editarAdvertencia($membro, $motivo, $data, $pontos, $responsavel, $indeferida, $idAdv);
        if($a){
            header("location:../view/advertencias.php?cad=true");
        }else{
            header("location:../view/advertencias.php?cad=false");
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
			header("location:../view/painel.php?add=true");
		}else{
			header("location:../view/painel.php?add=false");
		}

	}

	//Delete ADV
	if(isset($_GET['delAdv'])){
		
		$advController = new AdvertenciasController();

		$del = $advController->deletarAdvertencia($_GET['delAdv']);	
		//nao funcionou a verificacao, mas a funcao sim
		if($del > '0'){
			header("location:../view/advertencias.php?delete=true");
		}else{
			header("location:../view/advertencias.php?delete=false");
		}
	}
?>