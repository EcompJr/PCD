<?php

//require_once "../Models/Membro.class.php" ;
require_once "../controller/MembrosController.class.php" ;
require_once "../controller/AdvertenciasController.class.php" ;

session_start();

    //Login
	if (isset($_POST['loginAttempt'])){
		
		$login = $_POST['login'];
		$senha = $_POST['password'];
		//$codedSenha = md5($senha);
		$codedSenha = sha1($senha);
		unset($_POST['loginAttempt']);

		$membrosController = new MembrosController();
		$user = $membrosController->auth($login, $codedSenha);
		
		if ($user) {

            $_SESSION['auth']  = true;     
			$_SESSION['cargo'] = $user['occupation'];
			$_SESSION['nome'] = $user['name'];
			$_SESSION['uid'] = $user['id'];
			var_dump($user);

			//coloquei pra checar se o usuario tem a palavra "Diretor no campo "occupation" do banco.
			if (preg_match('/\Diretor\b/',$user['occupation'] )) {
				header("location:../view/painel.php");			
			}else{
				header("location:../view/contas.php");
			}

			//if($user['privilegio']=="Diretor" || $user['cargo']=="Conselheiro"){
				
			// }else{
			
			// }
		}else {
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

        $codedSenha = md5($senha);
        unset($_POST['register']);

        $membrosController = new MembrosController();
        $cad = $membrosController->cadastrarContas($login, $codedSenha, $nome, $cargo, $privilegio);
        if($cad){
            header("location:../view/cadastro.php?cad=true");
        }else{
            header("location:../view/cadastro.php?cad=false");
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