<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>
</head>

<body>

    <?php
    include 'includes/loginnavbar.php';
    ?>

    <form action="/indieabode/Admin_changePW/signin" method="post">
        <div>
            <label for="password">New Password</label> <br>
            <input type="password" placeholder="Required" name="password" id="password">
        </div>
        <div>
            <label for="confirm-password">Confirm Password</label> <br>
            <input type="password" placeholder="Required" name="confirm-password" id="confirm-password">
        </div>
        <button type="submit" name="submit">Change Password</button>
    </form>

</body>



</html>