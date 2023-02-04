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

    <div class="wrapper">
        <div class="btn-box">
            <button type="button" class="toggle-btn"><a href="/indieabode/pages/login.php">Login</a></button>
            <button type="button" class="toggle-btn"><a href="/indieabode/pages/register.php">Register</a></button>
        </div>
        <p id="rp-p">Enter the email address you registered with and we will mail you a link to reset your password.</p>
        <form action="/indieabode/forgotpassword/forgotpassword" method="POST">
            <input type="email" placeholder="email" name="email">
            <button type="submit" name="submit">Reset Password</button><br>
        </form>

    </div>


</body>



</html>