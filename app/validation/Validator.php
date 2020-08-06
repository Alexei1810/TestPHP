<?php 
class Validator{
    private $dao;

    function __construct(){
        require_once 'app/dao/DAO.php';
        $path='data/data.xml';
        $this->dao=new DAO($path);
    }

    public function alreadyExists($login){
        $exists=false;
        $xml=$this->dao->selectUsers();
        foreach($xml as $user){
            if($user->login==$login){
                $exists=true;
            }
        }
        return $exists;
    }
}
?>