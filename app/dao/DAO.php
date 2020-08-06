<?php 
class DAO{
private $path;
private $xml;
private $dom_xml;

function __construct($path){

$this->xml=simplexml_load_file($path);
$this->dom_xml=new DomDocument();
$this->dom_xml->load($path);
$this->path=$path;
}

public function selectUsers(){
   return $this->xml;
}

public function insertUser($login, $password, $email, $name){
    $users=$this->dom_xml->documentElement;
    $user=$this->dom_xml->createElement('user');

    $userLogin=$this->dom_xml->createElement('login', $login);
    $userPassword=$this->dom_xml->createElement('password', $password);
    $userEmail=$this->dom_xml->createElement('email', $email);
    $userName=$this->dom_xml->createElement('name', $name);

    $user->appendChild($userLogin);
    $user->appendChild($userPassword);
    $user->appendChild($userEmail);
    $user->appendChild($userName);

    $users->appendChild($user);
    $this->dom_xml->save($this->path);
}


}
?>