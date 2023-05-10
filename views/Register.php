<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

    <div class="wrapper register-box">
        <div class="btn-box">
            <a href="/indieabode/login"><button type="button" class="toggle-btn">Login</button></a>
            <a href="/indieabode/register"><button type="button" class="toggle-btn">Register</button></a>
        </div>
        <form action="/indieabode/register/signup" method="POST" id="form">
            <!--register form-->
            <div class="full-name">
                <div class="first-name">
                    <label class="form-login-label">First Name</label>
                    <input type="text" name="firstname" id="firstname" placeholder="firstname" required />
                </div>
                <div class="last-name">
                    <label class="form-login-label">Last Name</label>
                    <input type="text" name="lastname" id="lastname" placeholder="lastname" required /><br>
                </div>
            </div>
            <div class="full-name-errors">
                <div class="error-msg" id="firstname-check"></div>
                <div class="error-msg" id="lastname-check"></div>
            </div>

            <div class="username">
                <label class="form-login-label">Username</label> <br>
                <input type="text" name="username" id="user-name" placeholder="username" required /><br>
            </div>
            <div class="error-msg" id="username-check"></div>

            <div class="userrole">
                <label for="userrole" class="form-login-label">Who are you?</label>
                <select id="userrole" name="userrole">
                    <?php foreach ($this->userRoles as $userRole) { ?>
                        <option value="<?= $userRole['roleType']; ?>"><?= $userRole['roleType']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-login-label">Select your avatar</div>
            <div class="avatars">

                <div class="container">
                    <input type="radio" id="avatar1" name="avatar" class="radio-btn" value="avatar1.png" />
                    <label for="avatar1">
                        <img src="/indieabode/public/images/avatars/avatar1.png" />
                    </label>
                </div>
                <div class="container">
                    <input type="radio" id="avatar2" name="avatar" class="radio-btn" value="avatar2.png" checked />
                    <label for="avatar2">
                        <img src="/indieabode/public/images/avatars/avatar2.png" />
                    </label>
                </div>
                <div class="container">
                    <input type="radio" id="avatar3" name="avatar" class="radio-btn" value="avatar3.png" />
                    <label for="avatar3">
                        <img src="/indieabode/public/images/avatars/avatar3.png" />
                    </label>
                </div>
                <div class="container">
                    <input type="radio" id="avatar4" name="avatar" class="radio-btn" value="avatar4.png" />
                    <label for="avatar4">
                        <img src="/indieabode/public/images/avatars/avatar4.png" />
                    </label>
                </div>

            </div>


            <div class="email">
                <label class="form-login-label">Email</label><br>
                <input type="text" name="email" id="email" placeholder="email" required /><br>
            </div>
            <div class="error-msg" id="email-check"></div>



            <div class="field password-field">
                <label class="form-login-label">Password</label><br>
                <input type="password" name="password" id="password" placeholder="Password" class="password" required />
                <i class="fa fa-eye" id="eye"></i>
            </div>
            <div class="error-msg" id="password-check"></div>



            <div class="field password-field">
                <label class="form-login-label">Confirm Password</label><br>
                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" class="password" />
                <i class="fa fa-eye" id="confirm-eye"></i>

            </div>
            <div class="error-msg" id="confirmpassword-check"></div>

            <div class="terms">
                <input type="checkbox" name="" id="checkbox" value="" onclick="checkboxClicked()">
                <label for="" id="tos">I accept the terms of service </label>
            </div>

            <!-- <button type="submit" name="submit" id="register">Register</button><br><br> -->

            <div class="error-msg" id="backend-check"></div>
            <div class="register">Register</div>

        </form>

    </div>

    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/register.js"></script>

    <script>
        let passwordField = document.getElementById("password")
        let confirmPasswordField = document.getElementById("confirmPassword");
        let toggleIcon = document.getElementById("eye");
        let confirmToggleIcon = document.getElementById("confirm-eye");

        toggleIcon.onclick = () => {
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.add("active");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("active");
            }
        }

        confirmToggleIcon.onclick = () => {
            if (confirmPasswordField.type === "password") {
                confirmPasswordField.type = "text";
                confirmToggleIcon.classList.add("active");
            } else {
                confirmPasswordField.type = "password";
                confirmToggleIcon.classList.remove("active");
            }
        }
    </script>



</body>



</html>