<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Indieabode</title>


    <style>
        <?php
        include('public/css/login.css');
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/loginnavbar.php';
    ?>

    <?php if ($this->linkValidity) { ?>
        <div class="wrapper">

            <div class="reset-header">
                <h3>Reset Password</h3>
                <div class="sub-heading">Please provide a new password for the account <span>Prend</span></div>
            </div>

            <div class="field">
                <label class="form-login-label" id="username">Password</label><br>
                <input type="password" placeholder="Password" name="password" id="password"><br>
            </div>
            <div class="error-msg" id="password-check"></div>
            <div class="field" id="password-field">
                <label class="form-login-label">Repeat Password</label><br>
                <input type="password" placeholder="Confirm Password" name="repeat-password" id="repeat-password">
                <i class="fa fa-eye" id="eye"></i>
            </div>

            <div class="error-msg" id="confirm-password-check"></div>

            <div class="reset-btn" id="resetPassword">Submit</div>

        </div>

        <script>
            $(document).ready(function() {

                $("#password-check").hide();
                $("#confirm-password-check").hide();

                $("#password").keyup(function() {
                    validatePassword();
                });

                $("#repeat-password").keyup(function() {
                    validateConfirmPassword();
                });

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
                    let confirmPassword = $("#repeat-password").val();
                    let password = $("#password").val();

                    if (password == confirmPassword) {
                        $("#confirm-password-check").show();
                        $("#confirm-password-check").css("background-color", "rgb(132, 225, 180)");
                        $("#confirm-password-check").html("Passwords match");
                        return true;
                    } else {
                        $("#confirm-password-check").show();
                        $("#confirm-password-check").css("background-color", "rgb(225, 132, 132)");
                        $("#confirm-password-check").html("Passwords do not match");
                        return false;
                    }
                }


                $("#resetPassword").click(function(e) {

                    let newPassword = $('#password').val();
                    let userID = <?= $_GET['id'] ?>;
                    let userToken = '<?= $_GET['token'] ?>';

                    let passwordMatch = false;

                    if (validatePassword() && validateConfirmPassword()) {
                        passwordMatch = true;
                    }

                    var data = {
                        'userID': userID,
                        'newPassword': newPassword,
                        'token': userToken,
                        'password_reset': passwordMatch
                    };

                    $.ajax({
                        type: "POST",
                        url: "/indieabode/forgotpassword/updateUserPassword",
                        data: data,
                        success: function(response) {
                            // alert(response);


                            if (response == "1") {



                                window.location.href = "/indieabode/login";



                            }
                        },
                    });

                });

            });
        </script>
    <?php } else { ?>
        <h3>This link has expired</h3>
    <?php } ?>

    <?php
    include 'includes/footer.php';
    ?>

</body>



</html>