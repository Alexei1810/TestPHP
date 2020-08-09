<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Авторизация</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div>
<h3>Авторизация</h3>
<form>
<input type="text" id="login" placeholder="Введите логин"/>
<label id="login" class="error"></label>
<br>
<input type="password" id="password" placeholder="Введите пароль"/>
<label id="password" class="error"></label>
<br>
<input type="submit" name="submit" value="Войти"/><br>
</form>
<label>У вас нет аккаунта?</label>
<a href="index.php">Регистрация</a>
</div>
<script src="js/jquery.js"></script>
<script src="js/auth.js"></script>
</body>
</html>