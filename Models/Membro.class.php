<?php
//selecione todas as variaveis com 1ou  + 'ctrl + d' e altere todos ao mesmo tempo! 
require_once '../DB/Connection.class.php';

class Membro {

    public $id = null;
    public $login =  null;
    public $senha = null;
    public $foto = null;
    public $cargo = null;
    public $nome = null;
    public $privilegio = null;
    public $historico = null;

    function __construct($login, $senha, $foto, $cargo, $nome, $privilegio, $historico, $id){
        $this->login = $login;
        $this->senha = $senha;
        $this->foto = $foto;
        $this->cargo = $cargo;
        $this->nome = $nome;
        $this->privilegio = $privilegio;
        $this->historico = $historico;
        $this->id = $id;
    }

    function auth(){
        $conn = Connection::getInstance();
        $query = "SELECT * FROM usuarios WHERE login = \"$this->login\" AND  senha = \"$this->senha\"";
        $sql = $conn->query($query);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        if($row){
                return true;    
        }else{
                return false;
        }
    }

    function getLogin(){
        return $this->login;
    }

    function setLogin($login){
        $this->login = $login;
    }

    function getSenha(){
        return $this->senha;
    }

    function setSenha($senha){
        $this->senha = $senha;
    }

    function getNome(){
        return $this->nome;
    }

    function setNome($nome){
        $this->nome = $nome;
    }

    function getFoto(){
        return $this->foto;
    }

    function setfoto($foto){
        $this->foto = $foto;
    }

    function getCargo(){
        return $this->cargo;
    }

    function setCargo($cargo){
        $this->cargo = $cargo;
    }

    function getPrivilegio(){
        return $this->privilegio;
    }

    function setPrivilegio($privilegio){
        $this->privilegio = $privilegio;
    }

    function getHistorico(){
        return $this->historico;
    }

    function setHistorico($historico){
        $this->historico = $historico;
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

}


?>