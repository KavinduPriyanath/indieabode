<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a href="/indieabode/pages/login.php"><button type="button" class="toggle-btn">Login</button></a>
            <a href="/indieabode/pages/register.php"><button type="button" class="toggle-btn">Register</button></a>
        </div>
        <form action="/indieabode/register/signup" method="POST" id="form">
            <!--register form-->
            <div class="full-name">
                <div class="first-name">
                    <label class="form-login-label" id="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" placeholder="firstname" required />
                </div>
                <div class="last-name">
                    <label class="form-login-label" id="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" placeholder="lastname" required /><br>
                </div>
            </div>
            <label class="form-login-label">Username</label> <br>
            <input type="text" name="username" id="user-name" placeholder="username" required /><br>


            <label class="form-login-label">Email</label><br>
            <input type="text" name="email" id="title" placeholder="email" required /><br>




            <label class="form-login-label">Password</label><br>
            <input type="password" name="password" id="password" placeholder="Password" required /><br>





            <label class="form-login-label">Confirm Password</label><br>
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" /><br><br>




            <input type="checkbox" name="" id="checkbox" value="" onclick="checkboxClicked()">
            <label for="" id="tos">I accept the terms of service </label><br>

            <button type="submit" name="submit" id="register">Register</button><br><br>

        </form>

    </div>

</body>



</html>