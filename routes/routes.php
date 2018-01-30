<?php

//require_once "../Models/Membro.class.php" ;
require_once "../controller/MembrosController.class.php" ;
require_once "../controller/AdvertenciasController.class.php" ;

session_start();

    // if(isset($_POST['loginAttempt'])){
    //     $login = $_POST['login'];
    //     $password = sha1($_POST['password']);
    //                                                                     //unset($_POST['loginAttempt']);
    //     $member = new Membro($login, $password, null, null, null, null, null, null, null);
        
    //     var_dump($member);
        
    //     if($member->auth()){
    //         $_SESSION['auth'] = true;
    //         $_SESSION['uid'] = $member->getId();;
    //         $_SESSION["login"] = $member->getLogin();
    //         $_SESSION['password'] = $member->getPassword();
    //         $_SESSION["occupation"] = $member->getOccupation();
    //         $_SESSION["name"] = $member->getName();
    //         $_SESSION["privilege"] = $member->getPrivilege();
    //         $_SESSION["history"] = $member->getHistory();
    //         $_SESSION["score"] = $member->getScore();
            
    //         if($member->getPrivilege()){
    //             header("location:../Views/painel.php?op=adm");
    //         }else{
    //             header("location:../Views/painel.php?op=member");
    //         }
    //     } else {
    //         header("location:../Views/login.php?valid=false");
    //     }
    // }

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
			$_SESSION['cargo'] = $user['cargo'];
			$_SESSION['nome'] = $user['nome'];
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
    if(isset($_POST['logoff'])){
        unset($_SESSION['auth']);
        unset($_POST['logoff']);
        session_destroy();
        header("location:../view/login.php");
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
?>