<?php
class Logic{
    private $dao;

    function __construct(){
        require_once '../dao/DAO.php';
        $path='../../data/data.xml';
        $this->dao=new DAO($path);
    }

    public function registration($login, $password, $email, $name){
        $login=htmlspecialchars($login);
        $password=md5($password);
        $email=htmlspecialchars($email);
        $name=htmlspecialchars($name);
        $this->dao->insertUser($login, $password, $email, $name);
    }

    public function authorization($login){
        $login=htmlspecialchars($login);

        $xml=$this->dao->selectUsers();
        foreach($xml as $user){
            if($user->login==$login){
                
                setcookie('login', $user->login, 0, '/');
                setcookie('password', $user->password, 0, '/');
                setcookie('email', $user->email, 0, '/');
                setcookie('name', $user->name, 0, '/');
            }
        }
    }
}
?>