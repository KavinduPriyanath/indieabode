<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <div class="wrapper">
        <div class="btn-box">
            <a href="/indieabode/login"><button type="button" class="toggle-btn login-toggle-btn">Login</button></a>
            <a href="/indieabode/register"><button type="button" class="toggle-btn">Register</button></a>
        </div>
        <form action="/indieabode/login/signin" method="POST" id="form">
            <div class="error-msg" id="login-check"></div>
            <div class="field">
                <label class="form-login-label" id="username">Email</label><br>
                <input type="text" placeholder="email" name="email" id="email"><br>
            </div>

            <div class="field" id="password-field">
                <label class="form-login-label">Password</label><br>
                <input type="password" placeholder="Password" name="password" id="password">
                <i class="fa fa-eye" id="eye"></i><br>
            </div>


            <!-- checkbox -->
            <div class="check-bar">
                <label for="robot" id="robotlabel">
                    <input type="checkbox" name="robot" id="robot"> I'm not a Robot
                </label>
            </div>
            <!-- checkbox closed -->


            <!-- Add Recaptcha -->
            <div class="captcha" id="captcha">
                <!-- <label for="captcha-input"> Enter Captcha</label> -->
                <!-- <div class="preview"><span></span></div>
                <div class="captcha-form">
                    <input type="text" id="captcha-input" placeholder="Enter Captcha Text" />
                    <button class="captcha-refresh"><i class="fa fa-refresh"></i></button>
                </div>
                <div class="status-text"></div> -->
                <div class="captcha-reader">
                    <canvas id="canvas" width="250" height="40"></canvas>
                    <div class="wrapper-canvas">
                        <input type="text" id="user-input" placeholder="Enter Captcha Text" />
                        <div id="reload-button">
                            <i class="fa fa-rotate-right"></i>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End of Recaptcha -->



            <!-- <button type="submit" name="submit" id="login">Login</button> -->

        </form>

        <div class="login" id="login">Login</div>

        <div class="forgot-pw">
            <div> Forgot Password? </div><a href="/indieabode/forgotpassword">Reset Password</a>
        </div>
    </div>

    <?php
    include 'includes/footer.php';
    ?>

    <!-- <script src="<?php echo BASE_URL; ?>public/js/login.js"></script> -->

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
        $(document).ready(function() {

            $('#robot').click(function(e) {

                if ($(this).prop("checked") == true) {
                    console.log('checked');
                    $('.captcha').show();
                } else {
                    console.log("false");
                    $('.captcha').hide();
                }
            });

        });
    </script>


    <script>
        $(document).ready(function() {
            //Initial References
            let userInput = document.getElementById("user-input");
            let canvas = document.getElementById("canvas");
            let reloadButton = document.getElementById("reload-button");
            let text = "";

            //Generate Text
            const textGenerator = () => {
                let generatedText = "";
                /* String.fromCharCode gives ASCII value from a given number */
                // total 9 letters hence loop of 3
                for (let i = 0; i < 3; i++) {
                    //65-90 numbers are capital letters
                    generatedText += String.fromCharCode(randomNumber(65, 90));
                    //97-122 are small letters
                    generatedText += String.fromCharCode(randomNumber(97, 122));
                    //48-57 are numbers from 0-9
                    generatedText += String.fromCharCode(randomNumber(48, 57));
                }
                return generatedText;
            };

            //Generate random numbers between a given range
            const randomNumber = (min, max) =>
                Math.floor(Math.random() * (max - min + 1) + min);

            //Canvas part
            function drawStringOnCanvas(string) {
                //The getContext() function returns the drawing context that has all the drawing properties and functions needed to draw on canvas
                let ctx = canvas.getContext("2d");
                //clear canvas
                ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
                //array of text color
                const textColors = ["rgb(0,0,0)", "rgb(127, 181, 219)"];
                //space between letters
                const letterSpace = 150 / string.length;
                //loop through string
                for (let i = 0; i < string.length; i++) {
                    //Define initial space on X axis
                    const xInitialSpace = 50;
                    //Set font for canvas element
                    ctx.font = "18px Kreon";
                    //set text color
                    ctx.fillStyle = textColors[randomNumber(0, 1)];
                    ctx.fillText(
                        string[i],
                        xInitialSpace + i * letterSpace,
                        randomNumber(18, 30),
                        100
                    );
                }
            }

            //Initial Function
            function triggerFunction() {
                //clear Input
                userInput.value = "";
                text = textGenerator();
                //Randomize the text so that everytime the position of numbers and small letters is random
                text = [...text].sort(() => Math.random() - 0.5).join("");
                drawStringOnCanvas(text);
            }

            //call triggerFunction for reload button
            reloadButton.addEventListener("click", triggerFunction);

            //call triggerFunction when page loads
            triggerFunction();

            $("#login").click(function(e) {
                let email = $("#email").val();
                let password = $("#password").val();
                let captcha = $('#user-input').val();
                let captchaMatch = false;

                let data = {
                    email: email,
                    password: password,
                    login_validation: true,
                };

                if (captcha == text) {
                    captchaMatch = true;
                } else {
                    captchaMatch = false;
                }

                $.ajax({
                    type: "POST",
                    url: "/indieabode/login/loginValidation",
                    data: data,
                    success: function(response) {
                        console.log(response);
                        if (response == "success" && captchaMatch == true) {
                            $("#login").addClass("loading");
                            $("#login").html("<i class='fa fa-spinner fa-spin'></i>");
                            $("#form").submit();
                        } else if (response == "success" && captchaMatch == false) {
                            $("#login-check").show();
                            $("#login-check").text("Invalid Captcha");
                        } else if (response == "failure") {
                            $("#login-check").show();
                            $("#login-check").text("Incorrect username or password");
                        }
                    },
                });
            });

            //When user clicks on submit
            // submitButton.addEventListener("click", () => {
            //     //check if user input  == generated text
            //     if (userInput.value === text) {
            //         alert("Success");
            //     } else {
            //         alert("Incorrect");
            //         triggerFunction();
            //     }
            // });
        });
    </script>

</body>



</html>