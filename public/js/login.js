//Validation before submitting the form to upload a new game
$(document).ready(function () {
  $("#login").click(function (e) {
    let email = $("#email").val();
    let password = $("#password").val();

    let data = {
      email: email,
      password: password,
      login_validation: true,
    };

    $.ajax({
      type: "POST",
      url: "/indieabode/login/loginValidation",
      data: data,
      success: function (response) {
        console.log(response);
        if (response == "success") {
          $("#login").addClass("loading");
          $("#login").html("<i class='fa fa-spinner fa-spin'></i>");
          $("#form").submit();
        } else {
          $("#login-check").show();
          $("#login-check").text("Incorrect Username or Password");
        }
      },
    });
  });
});
