<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/dashboard.css';
        include 'public/css/editGameForm.css';
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>



    <div class="publisher-dashboard">
        <div class="top-row">
            <div class="heading">Publisher Dashboard</div>
            <div class="dev-main-stat">


            </div>
        </div>
        <div class="tabs-row">
            <a href="/indieabode/dashboard">
                Jams
            </a>
            <a href="/indieabode/dashboard/certificates">
                Certificates
            </a>

        </div>
        <div class="content-row">


            <h4 id="certificate-heading">Create New Certificates to give the participants of your jams</h4>

            <div class="outer-box">
                <div class=" form-box">

                    <div class="upload-content">
                        <div id="upload-game-form">
                            <div class="card-details">
                                <div class="upload-row">
                                    <div class="upload-col-left" id="devlog-left">
                                        <form action="/indieabode/dashboard/viewCertificate" method="post" id="certificate-form">
                                            <div class="card-box">

                                                <label for="">Select GameJam</label><br>
                                                <select id="game-jam" name="game-jam" required>
                                                    <?php foreach ($this->allJams as $jam) { ?>
                                                        <option value="<?= $jam['jamTitle'] ?>"><?= $jam['jamTitle'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <br><br>
                                            </div>

                                            <div class="card-box">
                                                <label for="">Certificate Type</label>
                                                <p>One line summery of the devlog</p>
                                                <select id="type" name="certificate-type" required>
                                                    <option value="FINALIST">Certificate of Finalist</option>
                                                    <option value="WINNER" selected>Certificate of Winner</option>
                                                    <option value="PARTICIPATION">Certificate of Participation</option>
                                                </select>
                                                <br><br>
                                            </div>


                                            <div class="card-box">

                                                <label for="">Participant Name</label><br>
                                                <input type="text" name="participant-name" id="participant-name" placeholder="Ex: Kavindu Priyanath">
                                                <br><br>

                                            </div>




                                            <div class="card-box" id="participant-place-box">
                                                <label for="">Participant Place</label>
                                                <p>Game related with the devlog</p>
                                                <select id="place" name="participant-place">
                                                    <option value="Fisrt Place">First Place</option>
                                                    <option value="Second Place">Second Place</option>
                                                    <option value="Third Place">Third Place</option>
                                                </select>
                                                <br><br>
                                            </div>


                                        </form>
                                    </div>
                                    <div class="upload-col-right">

                                        <div class="generate-btn">View PDF</div>
                                        <div class="download-btn">Download PDF</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        $(document).ready(function() {
            let hasPlace = true;

            //show participant place selection
            $("select#type").change(function() {
                var selectedType = $(this).children("option:selected").val();
                if (selectedType == "WINNER") {
                    hasPlace = true;
                    $('#participant-place-box').show();
                } else {
                    hasPlace = false;
                    $('#participant-place-box').hide();
                }
            });

            $(".generate-btn").click(function(e) {

                $('#certificate-form').submit();

                // let jamName = $('#game-jam').children("option:selected").val();
                // let certificateType = $('#type').children("option:selected").val();
                // let participantName = $('#participant-name').val();
                // let participantPlace = null;

                // if (hasPlace == true) {
                //     participantPlace = $('#place').children("option:selected").val();
                // } else {
                //     participantPlace = null;
                // }

                // var data = {
                //     'jamName': jamName,
                //     'certificateType': certificateType,
                //     'participantName': participantName,
                //     'participantPlace': participantPlace,
                //     'generate_pdf': true
                // };

                // $.ajax({
                //     type: "POST",
                //     url: "/indieabode/dashboard/viewCertificate",
                //     data: data,
                //     success: function(response) {
                //         // alert(response);
                //         // window.location.href = "/indieabode/dashboard/viewCertificate";
                //         alert(response);

                //     },
                // });

            });

        });
    </script>

</body>

</html>