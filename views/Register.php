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

            <label for="userrole" class="form-login-label">Who are you?</label>
            <select id="userrole" name="userrole">
                <?php foreach ($this->userRoles as $userRole) { ?>
                    <option value="<?= $userRole['roleType']; ?>"><?= $userRole['roleType']; ?></option>
                <?php } ?>
            </select> <br>

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

    <?php
    include 'includes/footer.php';
    ?>

</body>



</html>