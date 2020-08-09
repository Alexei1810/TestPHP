<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Регистрация</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div>
<h3>Регистрация</h3>
<form>
<input type="text" id="login" name="login" placeholder="Введите логин"/>
<label id="login" class="error"></label>
<br>
<input type="password" id="password" name="password" placeholder="Введите пароль"/>
<label id="password" class="error"></label>
<br>
<input type="password" id="confirm_password" name="confirm_password" placeholder="Подтвердите пароль"/>
<label id="confirm_password" class="error"></label>
<br>
<input type="text" id="email" name="email" placeholder="Введите ваш email"/>
<label id="email" class="error"></label>
<br>
<input type="text" id="name" name="name" placeholder="Введите имя"/>
<label id="name" class="error"></label>
<br>
<input type="submit" id="button" name="submit" value="Отправить"/>
<br>
</form>
<label>У вас уже есть аккаунт?</label>
<a href="auth.php">Войти</a>
</div>
<script src="js/jquery.js"></script>
<script src="js/reg.js"></script>
</body>
</html>

