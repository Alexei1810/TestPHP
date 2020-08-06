<?php
class Logic{
    private $dao;

    function __construct(){
        require_once 'app/dao/DAO.php';
        $path='data/data.xml';
        $this->dao=new DAO($path);
    }

    public function registration($login, $password, $email, $name){
        $this->dao->insertUser($login, $password, $email, $name);
    }
}
?>