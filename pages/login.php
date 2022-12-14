<?php session_start();


require '../db/database.php';


$error_msg = null;


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //$encrypted_password = md5($password);
    $user_matched = false;


    //check with db
    $sql = "SELECT * FROM gamer WHERE email = '$email'";
    $user = mysqli_query($conn, $sql) or die("Couldn't proceed");

    $row = mysqli_fetch_assoc($user);

    if (empty($row)) {
        $error_msg = "Invalid Username or Email";
    } else if ($password == null) {
        $error_msg = "Empty password";
    } else if ($password != $row['password']) {
        $error_msg = "Invalid password";
    } else {
        $user_matched = true;
    }


    if (is_array($row) && $user_matched) {
        $_SESSION['valid'] = $row['username'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['gamerID'];
        header('Location: ../index.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">


<!--Including Navbar-->
<?php include("../components/loginnavbar.php"); ?>
<style>
    <?php include '../src/css/login.css'; ?>
</style>


<div class="wrapper">
    <div class="btn-box">
        <a href="/indieabode/pages/login.php"><button type="button" class="toggle-btn login-toggle-btn">Login</button></a>
        <a href="/indieabode/pages/register.php"><button type="button" class="toggle-btn">Register</button></a>
    </div>
    <form action="#" method="POST" id="form">
        <label class="form-login-label" id="username">Email or Username</label><br>
        <input type="text" placeholder="email" name="email"><br>
        <label class="form-login-label">Password</label><br>
        <input type="password" placeholder="Password" name="password"><br>

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

        <!--Display error Messages-->
        <?php if ($error_msg != null) { ?>
            <div class="errors-display" id="errors">
                <?php echo $error_msg; ?>
            </div>
        <?php } ?>



        <button type="submit" name="submit" id="login">Login</button>



    </form>
    <div class="forgot-pw">
        <div> Forgot Password? </div><a href="/indieabode/pages/resetpassword.php">Reset Password</a>
    </div>
</div>

<script>
    <?php include('../src/js/captcha.js'); ?>
</script>


<!--Including Footer-->

<style>
    <?php include('../src/css/footer.css'); ?>
</style>
<?php include("../components/footer.php"); ?>

</html>