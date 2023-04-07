<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/gig.css';
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>


    <!--Gig title goes here-->
    <h2 id="gig-title"><?= $this->gig['gigName']; ?></h2>

    <div class="first-row">
        <div class="image-slider">
            <div class="slider">
                <div class="slide active">
                    <img src="/indieabode/public/uploads/gigs/screenshots/<?= $this->screenshots[0]; ?>" alt="" />
                </div>
                <?php for ($i = 1; $i < $this->ssCount; $i++) { ?>
                    <div class="slide">
                        <img src="/indieabode/public/uploads/gigs/screenshots/<?= $this->screenshots[$i]; ?>" alt="" />
                    </div>
                <?php } ?>


                <div class="navigation">
                    <i class="fa fa-chevron-left prev-btn"></i>
                    <i class="fa fa-chevron-right next-btn"></i>
                </div>
                <div class="navigation-visibility">
                    <div class="slide-icon active"></div>
                    <div class="slide-icon"></div>
                    <div class="slide-icon"></div>
                    <div class="slide-icon"></div>
                    <div class="slide-icon"></div>
                </div>
            </div>
        </div>
        <div class="gig-summary">
            <h4>Game Summary</h4>
            <div class="summary-details">
                <div class="row">
                    <div class="col-1">Game Name</div>
                    <div class="col-2"><?= $this->gig['game']; ?></div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Genre</div>
                    <div class="col-2">2D Platformer</div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Platform</div>
                    <div class="col-2">Windows</div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Current Stage</div>
                    <div class="col-2"><?= $this->gig['currentStage']; ?>6 Months</div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Planned Release</div>
                    <div class="col-2"><?= $this->gig['plannedReleaseDate']; ?></div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Expected Cost</div>
                    <div class="col-2"><?= $this->gig['expectedCost']; ?></div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Estimated Share</div>
                    <div class="col-2"><?= $this->gig['estimatedShare']; ?></div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Status</div>
                    <div class="col-2">Paused</div>
                </div>
                <hr />
            </div>
            <div class="buy-button" onclick="ButtonClick()">Buy Order</div>
        </div>
    </div>


    <div class="accordion">
        <div class="contentBox" id="collapse" onclick="Accordion()">
            <div class="label">Details</div>
            <div class="content">
                <div class="second-row">
                    <div class="rich-text"><?= $this->gig['gigDetails']; ?></div>
                    <div class="developer-summary">
                        <h2>About Developer</h2>
                        <div class="dev-profile">
                            <div class="image">
                                <img src="" alt="" />
                            </div>
                            <div class="dev-name">
                                <h4>Kavindu Priyanath</h4>
                                <div class="trust-rank">Trust Rank: 2</div>
                            </div>
                        </div>

                        <div class="dev-row">
                            <h3>From</h3>
                            <div class="info">Sri Lanka</div>
                        </div>
                        <div class="dev-row">
                            <h3>Email</h3>
                            <div class="info">kavindupriyanath@gmail.com</div>
                        </div>
                        <div class="dev-row">
                            <h3>Avg. Response Time</h3>
                            <div class="info">2 hours</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="bottom-row">
        <div class="wrapper">
            <section class="chat-area">
                <div class="header">
                    <div class="name">Kavindu</div>
                    <div class="role">Game Developer</div>
                </div>
                <div class="chat-box">

                </div>
                <form action="#" class="typing-area">
                    <input type="text" class="incoming_id" name="incoming_id" value="<?php if ($_SESSION['userRole'] == "game publisher") {
                                                                                            echo $this->currentRequest['developerID'];
                                                                                        } else if ($_SESSION['userRole'] == "game developer") {
                                                                                            echo $this->currentRequest['publisherID'];
                                                                                        } ?>" hidden>
                    <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                    <button class="sendBtn" onclick="sendMessage(<?= $_SESSION['id']; ?>, <?= $this->gig['gigID']; ?>)"><i class='fab fa-telegram-plane'></i></button>
                </form>
            </section>
        </div>
        <div class="customization-menu"></div>
    </div>

    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/gig.js"></script>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


    <script>
        function ButtonClick() {
            alert("Cant perform this action as a gamedeveloper");
        }

        function Accordion() {
            document.getElementById('collapse').classList.toggle('active');
        }
    </script>


    <script>
        const form = document.querySelector(".typing-area"),
            incoming_id = form.querySelector(".incoming_id").value,
            inputField = form.querySelector(".input-field"),
            sendBtn = form.querySelector(".sendBtn"),
            chatBox = document.querySelector(".chat-box");


        let receiverId = <?php if ($_SESSION['userRole'] == "game publisher") {
                                echo $this->currentRequest['developerID'];
                            } else if ($_SESSION['userRole'] == "game developer") {
                                echo $this->currentRequest['publisherID'];
                            } ?>;

        console.log(receiverId);

        form.onsubmit = (e) => {
            e.preventDefault();
        };

        inputField.focus();
        inputField.onkeyup = () => {
            if (inputField.value != "") {
                sendBtn.classList.add("active");
            } else {
                sendBtn.classList.remove("active");
            }
        };

        //sending messages
        function sendMessage(sender, gig) {
            var f = new FormData(form);

            f.append("senderID", sender);
            //f.append("receiverID", receiver);
            f.append("gigID", gig);

            for (const value of f.values()) {
                console.log(value);
            }

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "/indieabode/gig/sendMessages", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        inputField.value = "";
                        scrollToBottom();
                    }
                }
            };
            xhr.send(f);
        };
        chatBox.onmouseenter = () => {
            chatBox.classList.add("active");
        };

        chatBox.onmouseleave = () => {
            chatBox.classList.remove("active");
        };

        setInterval(() => {
            let gigId = <?= $_GET['id']; ?>;
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "/indieabode/gig/viewMessages?id=" + gigId, true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        chatBox.innerHTML = data;
                        if (!chatBox.classList.contains("active")) {
                            scrollToBottom();
                        }
                    }
                }
            };
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("receiverId=" + receiverId);
        }, 500);

        function scrollToBottom() {
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>

</body>



</html>