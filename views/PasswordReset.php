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

    <form action="" method="post">
        <div>
            <label for="password">Password</label> <br>
            <input type="password" placeholder="Required" name="password" id="password">
        </div>
        <div>
            <label for="repeat-password">Repeat Password</label> <br>
            <input type="password" placeholder="Required" name="repeat-password" id="repeat-password">
        </div>
        <button type="submit" name="submit">Change Password</button>
    </form>

</body>



</html>