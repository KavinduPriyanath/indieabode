$(document).ready(function () {
  //hide all the error message showing boxes when the page loads initially
  $("#firstname-check").hide();
  $("#lastname-check").hide();
  $("#username-check").hide();
  $("#password-check").hide();
  $("#confirmpassword-check").hide();
  $("#email-check").hide();
  $("#backend-check").hide();

  $("#firstname").keyup(function () {
    if ($("#firstname").length != 0) {
      $("#firstname-check").hide();
      $(".full-name-errors").height("0px");
    }
  });

  $("#lastname").keyup(function () {
    if ($("#lastname").length != 0) {
      $("#lastname-check").hide();
      $(".full-name-errors").height("0px");
    }
  });

  $("#user-name").keyup(function () {
    validateUsername();
  });

  $("#email").keyup(function () {
    validateEmail();
    console.log("fdef");
  });

  $("#password").keyup(function () {
    validatePassword();
  });

  $("#confirmPassword").keyup(function () {
    validateConfirmPassword();
  });

  function validateUsername() {
    let username = $("#user-name").val();
    if (username.length < 3 || username.length > 10) {
      $("#username-check").show();
      $("#username-check").html("length of username must between 3 and 10");
      return false;
    } else {
      $("#username-check").hide();
      return true;
    }
  }

  function validateEmail() {
    let email = $("#email").val();

    if (email.length > 0) {
      if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        $("#email-check").hide();
        return true;
      } else {
        $("#email-check").show();
        $("#email-check").html("invalid email address");
        return false;
      }
    }
  }

  function validatePassword() {
    let password = $("#password").val();
    let strongPassword = false;

    let uppercase = /[A-Z]/.test(password);
    let lowercase = /[a-z]/.test(password);
    let number = /[0-9]/.test(password);
    let specialChars = /[^\w]/.test(password);

    if (password.length == 0) {
      $("#password-check").show();
      $("#password-check").css("background-color", "rgb(225, 132, 132)");
      $("#password-check").html("Password cannot be empty");
      return false;
    } else if (
      !uppercase ||
      !lowercase ||
      !number ||
      !specialChars ||
      (password.length < 8 && password.length > 0)
    ) {
      $("#password-check").show();
      $("#password-check").css("background-color", "rgb(225, 132, 132)");
      $("#password-check").html("Password is not strong enough");
      return true;
    } else {
      $("#password-check").show();
      $("#password-check").css("background-color", "rgb(132, 225, 180)");
      $("#password-check").html("Password is strong");
      return true;
    }
  }

  function validateConfirmPassword() {
    let confirmPassword = $("#confirmPassword").val();
    let password = $("#password").val();

    if (password == confirmPassword) {
      $("#confirmpassword-check").show();
      $("#confirmpassword-check").css("background-color", "rgb(132, 225, 180)");
      $("#confirmpassword-check").html("Passwords match");
      return true;
    } else {
      $("#confirmpassword-check").show();
      $("#confirmpassword-check").css("background-color", "rgb(225, 132, 132)");
      $("#confirmpassword-check").html("Passwords do not match");
      return false;
    }
  }

  $(".register").click(function (e) {
    let firstnameEmpty;
    let lastnameEmpty;

    let firstname = $("#firstname").val();
    let lastname = $("#lastname").val();
    let username = $("#user-name").val();
    let email = $("#email").val();
    let password = $("#password").val();
    let avatar = $('input[name="avatar"]:checked').val();
    let userrole = $("#userrole option:selected").val();
    let proceed = false;

    if (
      validateUsername() &&
      validateEmail() &&
      validatePassword() &&
      validateConfirmPassword()
    ) {
      proceed = true;
    }

    if (firstname.length == 0) {
      $("#firstname-check").show();
      $(".full-name-errors").height("20px");
      $("#firstname-check").html("Cannot be empty");
      firstnameEmpty = true;
    }

    if (lastname.length == 0) {
      $("#lastname-check").show();
      $(".full-name-errors").height("20px");
      $("#lastname-check").html("Cannot be empty");
      lastnameEmpty = true;
    }

    if (email.length == 0) {
      $("#email-check").show();
      $("#email-check").html("Email cannot be empty");
    }

    if (firstnameEmpty || lastnameEmpty) {
      proceed = false;
    }

    var data = {
      register: proceed,
      firstname: firstname,
      lastname: lastname,
      username: username,
      email: email,
      password: password,
      userrole: userrole,
      avatar: avatar,
    };

    $.ajax({
      type: "POST",
      url: "/indieabode/register/signup",
      data: data,
      success: function (response) {
        // alert(response);

        if (response == "1") {
          $("#backend-check").show();
          $("#backend-check").html("Fix all the errors");
        } else if (response == "2") {
          $("#backend-check").show();
          $("#backend-check").html("User already exists with this email");
        } else if (response == "3") {
          window.location.href = "/indieabode/games";
        }
      },
    });
  });
});
