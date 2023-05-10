<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/jammain.css';
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <!--Page Topic-->
    <div class="page-topic">
        <h1>-Game Jams-</h1>
    </div>

    <!--  Filters-->


    <div class="side-nav" id="side-menu">
        <form action="" method="GET">

            <?php if (isset($_SESSION['logged'])) { ?>
                <p>Preference</p>

                <div class="type-filter">


                    <?php if ($_SESSION['userRole'] == "gamejam organizer") { ?>
                        <div class="elements">
                            <input type="checkbox" name="preference[]" id="myjams" class="checkbox" value="" />
                            <label for="myjams">My Jams</label>
                        </div>
                    <?php } else if ($_SESSION['userRole'] == "gamer") { ?>

                        <div class="elements">
                            <input type="checkbox" name="preference[]" id="joinedjams" class="checkbox" value="" />
                            <label for="joinedjams">Jams Joined</label>
                        </div>
                        <div class="elements">
                            <input type="checkbox" name="preference[]" id="votedjams" class="checkbox" value="" />
                            <label for="votedjams">Jams Voted</label>
                        </div>

                    <?php } else if ($_SESSION['userRole'] == "game developer") { ?>

                        <div class="elements">
                            <input type="checkbox" name="preference[]" id="jamsjoined" class="checkbox" value="" />
                            <label for="jamsjoined">Jams Joined</label>
                        </div>
                        <div class="elements">
                            <input type="checkbox" name="preference[]" id="jamssubmitted" class="checkbox" value="" />
                            <label for="jamssubmitted">Jams Submitted</label>
                        </div>

                    <?php } ?>

                </div>
            <?php } ?>

            <p>Status</p>

            <div class="type-filter">


                <div class="elements">
                    <input type="checkbox" name="status[]" id="inprogress" class="checkbox" value="" />
                    <label for="inprogress">In Progress</label>
                </div>

                <div class="elements">
                    <input type="checkbox" name="status[]" id="upcoming" class="checkbox" value="" />
                    <label for="upcoming">Upcoming</label>
                </div>

                <div class="elements">
                    <input type="checkbox" name="status[]" id="past" class="checkbox" value="" />
                    <label for="past">Past Jams</label>
                </div>


            </div>

            <p>Genre</p>

            <div class="type-filter">
                <div class="elements">
                    <input type="radio" name="genre" id="ranked" class="checkbox" value="Ranked" />
                    <label for="ranked">Ranked</label>
                </div>

                <div class="elements">
                    <input type="radio" name="genre" id="nonranked" class="checkbox" value="Non-Ranked" />
                    <label for="nonranked">Non-Ranked</label>
                </div>
            </div>

            <p>Type</p>

            <div class="type-filter">
                <div class="elements">
                    <input type="radio" name="type" id="public" class="checkbox" value="Public" />
                    <label for="public">Public</label>
                </div>

                <div class="elements">
                    <input type="radio" name="type" id="private" class="checkbox" value="Private" />
                    <label for="private">Private</label>
                </div>
            </div>




            <button type="submit" id="filter-button">Apply</button>
        </form>
    </div>

    <div class="upper-break">
        <div class="trigger" onclick="openSideMenu()">
            <i class="fa fa-angle-double-right" id="filter-off"></i>
            <i class="fa fa-angle-double-left" id="filter-on"></i> filters
        </div>
        <form action="/indieabode/jams" method="GET" name="myForm" id="myForm">
        <div class="sort" id="sort">
            <img src="/indieabode/public/images/games/sort.png" alt="" /> sort by: <span></span>
            
            <select name="sortWhat" class="sortselect" id="sortWhat" onchange="document.getElementById('myForm').submit();">
                <option value="latest" id="latest" name="sortWhat" value="latest" selected>Latest Released</option>
                <option value="nameA-Z" id="nameA-Z" name="sortWhat" value="nameA-Z">Name A-Z</option>
                <option value="nameZ-A" id="nameZ-A" name="sortWhat" value="nameZ-A">Name Z-A</option>
            </select>
        </div>
        </form>
    </div>

    <hr id="topic-break" />



    <!--Cards-->

    <div class="container" id="card-container">




        <?php foreach ($this->gamejams as $jam) { ?>

            <a href="/indieabode/jam?id=<?= $jam['gameJamID'] ?>">
                <div class="card">

                    <div class="jam-name">
                        <p><?= $jam['jamTitle'] ?></p>
                    </div>
                    <div class="card-image">
                        <img src="/indieabode/public/uploads/gamejams/covers/<?= $jam['jamCoverImg'] ?>" alt="" />
                    </div>

                    <div class="tagline modernWay">
                        <p><?= $jam['jamTagline'] ?></p>
                    </div>

                    <div class="host">Hosted by,
                        <span class="host-name"><?= $jam['username'] ?></span>

                    </div>

                    <div class="details">
                        <div class="jam-type"><?= $jam['jamType'] ?></div>
                        <div class="count">
                            <div class="countNo"><?= $jam['joinedCount'] ?></div>
                            <div class="countname">joined</div>
                        </div>

                    </div>
                </div>
            </a>
        <?php } ?>
    </div>

    <!--Pagination-->
    <div class="pagination" id="pagination-jams">
        <a href="/indieabode/jams?page=<?= $this->prevPage; ?>" id="prev"><i class="fa fa-angle-left"></i></a>
        <?php for ($i = 1; $i <= $this->jamsPagesCount; $i++) : ?>
            <a href="/indieabode/jams?page=<?= $i; ?>" class="active"><?= $i ?></a>
        <?php endfor; ?>

        <a href="/indieabode/jams?page=<?= $this->nextPage; ?>" id="next"><i class="fa fa-angle-right"></i></a>
    </div>


    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/sidefilter.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        <?php if (!isset($_GET['page']) || $_GET['page'] == 1) { ?>
            document.getElementById("prev").style.pointerEvents = "none";
        <?php  } ?>

        <?php if (!isset($_GET['page']) || $_GET['page'] == $this->jamsPagesCount) { ?>
            document.getElementById("next").style.pointerEvents = "none";
        <?php  } ?>

        <?php if (isset($_GET['genre']) || isset($_GET['stage']) || isset($_GET['cost']) || isset($_GET['share'])) { ?>
            document.getElementById("pagination-jams").style.display = "none";
        <?php } ?>
    </script>

    <script>
        // sort

        const dropdown = document.getElementById('sortWhat');
        const selectedOption = localStorage.getItem('selectedOption');
        if (selectedOption) {
            dropdown.value = selectedOption;
        } else {
            dropdown.selectedIndex = 0; // select the first option
        }
        dropdown.addEventListener('change', () => {
            localStorage.setItem('selectedOption', dropdown.value);
            document.getElementById('myForm').submit();
        });
        localStorage.clear();
        
    </script>


</body>

</html>