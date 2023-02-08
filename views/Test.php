<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>

<body>
    <h1>test</h1>


    <?php foreach ($this->gamejams as $jam) { ?>

        <a href="singlejam.php?id=<?= $jam['gameJamID'] ?>">
            <div class="card">

                <!--<div class="first-row">-->
                <div class="jam-name">
                    <h3><?= $jam['jamTitle'] ?></h3>
                </div>
                <div class="card-image">
                    <img src="/indieabode/public/uploads/assets/cover/<?= $jam['jamCoverImg'] ?>" alt="" />
                </div>

                <div class="tagline">
                    <p><?= $jam['jamTagline'] ?></p>
                </div>


                <!--</div>-->
                <div class="details">
                    <div class="host">Hosted by,
                        <div class="host-name"><span><?= $jam['firstName'] . ' ' . $jam['lastName'] ?></span></div>

                    </div>
                    <!--<div class="deadline">Starts on, 
            
          </div>-->
                    <div class="count">
                        <h2>56</h2>
                        joined
                    </div>

                </div>
            </div>
        </a>
    <?php } ?>
</body>

</html>