$(document).ready(function () {
  $("form").submit(function (event) {
    event.preventDefault();

    var login = $("input#login").val();
    var password = $("input#password").val();

    $.ajax({
      url: "app/controllers/auth_control.php",
      type: "POST",
      dataType: "json",
      data: {
        login: login,
        password: password,
      },
      success: function (data) {
        //reset label-
        $("label#login").text("");
        $("label#password").text("");
        //------------

        if (data.status == true) {
          document.location.href = "page/my_page.php";
        }

        if (data.status == false) {
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
              });
            }
          }
          //несуществующий логин
          if (data.message === 1) {
            $("label#login").text("Такой логин не существует");
          }
          //неверный пароль
          if (data.message === 2) {
            $("label#password").text("Неверный пароль");
          }
        }
      },
    });
  });
});
