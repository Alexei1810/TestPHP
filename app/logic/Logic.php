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
        //!!!!!!!!!!!!!!!!!!!!!!!
        // $password=md5($password);
        $password=htmlspecialchars($password);
        $email=htmlspecialchars($email);
        $name=htmlspecialchars($name);
        $this->dao->insertUser($login, $password, $email, $name);
    }

    public function authorization($login){
        $login=htmlspecialchars($login);

        $xml=$this->dao->selectUsers();
        foreach($xml as $user){
            if($user->login==$login){

               $_SESSION['login']=$user->login;
               $_SESSION['password']=$user->password;
               $_SESSION['email']=$user->email;
               $_SESSION['name']=$user->name;

               $_COOKIE['login']=$user->login;
               $_COOKIE['password']=$user->password;
               $_COOKIE['email']=$user->email;
               $_COOKIE['name']=$user->name;
            }
        }
    }
}
?>