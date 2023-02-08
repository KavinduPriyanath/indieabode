<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include('public/css/loginverification.css');
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/loginnavbar.php';
    ?>

    <div class="container">
        <div class="heading">Verfication Email Sent</div>
        <h1>ENTER OTP</h1>
        <div class="userInput">
            <form action="/indieabode/login/activateAccount" method="POST">
                <input type="text" name="first-digit" id="ist" maxlength="1" onkeyup="clickEvent(this,'sec')" />
                <input type="text" name="second-digit" id="sec" maxlength="1" onkeyup="clickEvent(this,'third')" />
                <input type="text" name="third-digit" id="third" maxlength="1" onkeyup="clickEvent(this,'fourth')" />
                <input type="text" name="fourth-digit" id="fourth" maxlength="1" onkeyup="clickEvent(this,'fifth')" />
                <input type="text" name="fifth-digit" id="fifth" maxlength="1" />
                <br>
                <button type="submit">CONFIRM</button>
            </form>
        </div>

    </div>



    <?php
    include 'includes/footer.php';
    ?>

    <script>
        function clickEvent(first, last) {
            if (first.value.length) {
                document.getElementById(last).focus();
            }
        }
    </script>

</body>



</html>