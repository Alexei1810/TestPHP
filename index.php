<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Регистрация</title>
</head>
<body>
<div>
<h3>Регистрация</h3>
<form action="app/controllers/reg_control.php" method="post">
<input type="text" name="login" placeholder="Введите логин"/><br>
<input type="password" name="password" placeholder="Введите пароль"/><br>
<input type="password" name="confirm_password" placeholder="Подтвердите пароль"/><br>
<input type="text" name="email" placeholder="Введите ваш email"/><br>
<input type="text" name="name" placeholder="Введите имя"/><br>
<input type="submit" id="button" name="submit" value="Отправить"/><br>
</form>
<label>У вас уже есть аккаунт?</label>
<a href="auth.php">Войти</a>
</div>
<script src="js/jquery.js"></script>
<script src="js/script.js"></script>
</body>
</html>

<?php 
// require_once 'app/logic/Logic.php';
// $l=new Logic();
// $l->registration(1,1,1,1);
require_once 'app/validation/Validator.php';
$v=new Validator();
$b=$v->alreadyExists('hhh');
var_dump($b);
?>