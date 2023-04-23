<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <div class="wrapper">
        <div class="btn-box">
            <a href="/indieabode/login"><button type="button" class="toggle-btn login-toggle-btn">Login</button></a>
            <a href="/indieabode/register"><button type="button" class="toggle-btn">Register</button></a>
        </div>
        <form action="/indieabode/login/signin" method="POST" id="form">
            <div class="field">
                <label class="form-login-label" id="username">Email or Username</label><br>
                <input type="text" placeholder="email" name="email"><br>
            </div>
            <div class="field" id="password-field">
                <label class="form-login-label">Password</label><br>
                <input type="password" placeholder="Password" name="password" id="password">
                <i class="fa fa-eye" id="eye"></i><br>
            </div>


            <!-- checkbox -->
            <div class="check-bar">
                <label for="robot" id="robotlabel">
                    <input type="checkbox" name="robot" id="robot" onclick="checkboxClicked()"> I'm not a Robot
                </label>
            </div>
            <!-- checkbox closed -->


            <!-- Add Recaptcha -->
            <div class="captcha" id="captcha">
                <!-- <label for="captcha-input"> Enter Captcha</label> -->
                <div class="preview"><span></span></div>
                <div class="captcha-form">
                    <input type="text" id="captcha-input" placeholder="Enter Captcha Text" />
                    <button class="captcha-refresh"><i class="fa fa-refresh"></i></button>
                </div>
                <div class="status-text"></div>
            </div>
            <!-- End of Recaptcha -->



            <button type="submit" name="submit" id="login">Login</button>



        </form>
        <div class="forgot-pw">
            <div> Forgot Password? </div><a href="/indieabode/forgotpassword">Reset Password</a>
        </div>
    </div>

    <?php
    include 'includes/footer.php';
    ?>

    <script>
        let passwordField = document.getElementById("password");
        let toggleIcon = document.getElementById("eye");

        toggleIcon.onclick = () => {
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.add("active");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("active");
            }
        }
    </script>

    <script>
        document.getElementById("login").addEventListener("click", function() {
            this.classList.add("loading");
            this.innerHTML = "<i class='fa fa-spinner fa-spin'></i>";
        });
    </script>

</body>



</html>