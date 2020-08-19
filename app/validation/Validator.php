<?php 
class Validator{
    private $dao;

    function __construct(){
        require_once '../dao/DAO.php';
        $path='../../data/data.xml';
        $this->dao=new DAO($path);
    }

    public function loginExists($login){
        $exists=false;
        if($login!=''){
        $xml=$this->dao->selectUsers();
        foreach($xml as $user){
            if($user->login==$login){
                $exists=true;
            }
        }
    }
        return $exists;
    }

    public function emailExists($email){
        $exists=false;
        $xml=$this->dao->selectUsers();
        foreach($xml as $user){
            if($user->email==$email){
                $exists=true;
            }
        }
        return $exists;
    }

    public function emailValidate($email){
        $right=false;
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $right=true;
        }
        return $right;
    }


    public function checkPasswords($password, $confirm_password){
        if($password===$confirm_password){
            return true;
        }else{
            return false;
        }
    }

    public function checkPassword($login, $password){
        $exists=false;
        $xml=$this->dao->selectUsers();
        foreach($xml as $user){
            if($user->login==$login){
                if($user->password==md5($password)){
                $exists=true;
                }
            }
        }
        return $exists;  
    }
}
?>