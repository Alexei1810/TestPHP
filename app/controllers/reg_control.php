<?php 
//create obj Validator
require_once './../validation/Validator.php';
$validator=new Validator();

$error=Array();
if(trim($_POST['login'])===''){
    $error[]='login';
}
if(trim($_POST['password'])===''){
    $error[]='password';
}
if(trim($_POST['confirm_password'])===''){
    $error[]='confirm_password';
}
if(trim($_POST['email'])===''){
    $error[]='email';
}
if(trim($_POST['name'])===''){
    $error[]='name';
}


$response=[
    'status'=> true,
    'error'=> $error
];
//validation not empty
if(!empty($response['error'])){
    $response['status']=false;
    $response['message']=0;
    echo json_encode($response);
    die();
}else{
    

    //validation is login exist

    if($validator->loginExists($_POST['login'])){
        $response['status']=false;
        $response['message']=1;
        echo json_encode($response);
        die();
    }

    //validation is email exist

    if($validator->emailExists($_POST['email'])){
        $response['status']=false;
        $response['message']=2;
        echo json_encode($response);
        die();
    }

    //validation is email right

    if(!$validator->emailValidate($_POST['email'])){
        $response['status']=false;
        $response['message']=3;
        echo json_encode($response);
        die();
    }

    //validation is password appropriate 

    if(!$validator->checkPasswords($_POST['password'], $_POST['confirm_password'])){
        $response['status']=false;
        $response['message']=4;
        echo json_encode($response);
        die();
    }

    //create account
    require_once '../logic/Logic.php';
    $logic=new Logic();
    $logic->registration($_POST['login'], $_POST['password'], $_POST['email'], $_POST['name']);
    


}


echo json_encode($response);
?>