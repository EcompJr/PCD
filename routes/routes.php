<?php

//require_once "../Models/Membro.class.php" ;
require_once "../controller/MembrosController.class.php" ;
require_once "../controller/AdvertenciasController.class.php" ;

session_start();

    //Login
	if (isset($_POST['loginAttempt'])){
		
		$login = $_POST['login'];
		$senha = $_POST['password'];
		$codedSenha = md5($senha);

		unset($_POST['loginAttempt']);

		$membrosController = new MembrosController();
		$user = $membrosController->auth($login, $codedSenha);

		if ($user) {

            $_SESSION['auth']  = true;     
			$_SESSION['cargo'] = $user['occupation'];
			$_SESSION['nome'] = $user['name'];
			$_SESSION['uid'] = $user['id'];

            header("location:../view/pcd.php");

			// if($user['cargo']=="Diretor" || $user['cargo']=="Conselheiro"){
				
			// 	header("location:../view/profileAdm.php");
			// }else{
			// 	header("location:../view/profile.php");
			// }
		}else{
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
		$membro = $_POST['selectPenalizado'];
	
		$membrosController = new MembrosController();
   		$conta = $membrosController->getContaByNome($membro);
		$membroId = $conta[0]['id'];
		print_r($membroId);

		$advController = new AdvertenciasController();
		$add = $advController->addAdvertenciaDB($motivo, $data, $pontos, $responsavel, $indeferida, $membroId, $membro);
		
		if($add){
			header("location:../view/painel.php?add=true");
		}else{
			header("location:../view/painel.php?add=false");
		}

	}
?>