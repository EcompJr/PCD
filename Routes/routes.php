<?php

require_once "../Models/Membro.class.php" ;
require_once "../Controllers/MembrosController.class.php" ;
require_once "../Controllers/AdvertenciasController.class.php" ;

session_start();

if(isset($_POST['loginAttempt'])){
    $login = $_POST['login'];
    $password = sha1($_POST['password']);
                                                                       //unset($_POST['loginAttempt']);
    $member = new Member($login, $password);
    
    var_dump($member);
    
    if($member->auth()){
        $_SESSION['auth'] = true;
        $_SESSION['uid'] = $member->getId();;
        $_SESSION["login"] = $member->getLogin();
        $_SESSION['password'] = $member->getPassword();
        $_SESSION["occupation"] = $member->getOccupation();
        $_SESSION["name"] = $member->getName();
        $_SESSION["privilege"] = $member->getPrivilege();
        $_SESSION["history"] = $member->getHistory();
        $_SESSION["score"] = $member->getScore();
        
        if($member->getPrivilege()){
            header("location:../Views/painel.php?op=adm");
        }else{
            header("location:../Views/painel.php?op=member");
        }
    } else {
        header("location:../Views/login.php?valid=false");
    }
}
if(isset($_POST['logoff'])){
    unset($_SESSION['auth']);
    unset($_POST['logoff']);
    session_destroy();
    header("location:../Views/login.php");
}

?>