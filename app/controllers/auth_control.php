<?php

require_once './../validation/Validator.php';
$validator=new Validator();

$error=Array();

if($_POST['login']===''){
    $error[]='login';
}
if($_POST['password']===''){
    $error[]='password';
}

$response=[
    'status' => true,
    'error' => $error
];

//validation not empty

if(!empty($response['error'])){
    $response['status']=false;
    $response['message']=0;
    echo json_encode($response);
    die();
}else{

     //validation is login exist

     if(!$validator->loginExists($_POST['login'])){
        $response['status']=false;
        $response['message']=1;
        echo json_encode($response);
        die();
    }

    //validation is password right

    if(!$validator->checkPassword($_POST['login'], $_POST['password'])){
        $response['status']=false;
        $response['message']=2;
        echo json_encode($response);
        die();
    }
    require_once '../logic/Logic.php';
    $logic=new Logic();
    $logic->authorization($_POST['login']);

    $response['name']=$_COOKIE['name'];

    echo json_encode($response);
}

?>