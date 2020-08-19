$(document).ready(function () {
  $("form").submit(function (event) {
    event.preventDefault();

    var login = $("#login").val();
    var password = $("#password").val();
    var confirm_password = $("#confirm_password").val();
    var email = $("#email").val();
    var name = $("#name").val();
    console.log("before");

    $.ajax({
      url: "app/controllers/reg_control.php",
      type: "POST",
      dataType: "json",
      data: {
        login: login,
        password: password,
        confirm_password: confirm_password,
        email: email,
        name: name,
      },
      success: function (data) {
        //reset label-
        $("label#login").text("");
        $("label#password").text("");
        $("label#confirm_password").text("");
        $("label#email").text("");
        $("label#name").text("");
        //------------
        if (data.status === true) {
          document.location.href = "auth.php";
        }
        if (data.status === false) {
          //для пустых полей
          if (data.message === 0) {
            for (var i = 0; i < data.error.length; i++) {
              $("label#" + data.error[i]).text(function () {
                var str = "Введите ";
                if (data.error[i] === "login") {
                  str += "логин";
                  return str;
                }
                if (data.error[i] === "password") {
                  str += "пароль";
                  return str;
                }
                if (data.error[i] === "confirm_password") {
                  str += "пароль";
                  return str;
                }
                if (data.error[i] === "email") {
                  str += "ваш email";
                  return str;
                }
                if (data.error[i] === "name") {
                  str += "ваше имя";
                  return str;
                }
              });
            }
          }
          //существующий логин
          if (data.message === 1) {
            $("label#login").text("Такой логин уже занят");
          }
          //email занят
          if (data.message === 2) {
            $("label#email").text("Такой email уже занят");
          }
          //неверный email
          if (data.message === 3) {
            $("label#email").text("Неверный email");
          }
          //неверный пароль
          if (data.message === 4) {
            $("label#password").text("Неверный пароль");
          }
        }
      },
    });
  });
});
