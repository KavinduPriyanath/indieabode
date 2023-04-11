<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <style>
        <?php include 'public/css/navbar.css'; ?><?php include 'public/css/footer.css'; ?>
    </style>


    <title>IndieAbode</title>
</head>

<body>
    <div class="navbar admin-navbar">
        <div class="logo"><a href="/indieabode">IndieAbode</a></div>
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>

        <?php if (isset($_SESSION['logged'])) { ?>
            <?php if ($_SESSION['userRole'] == "game developer") { ?>
                <div class="navbar-links">
                    <div class="ul">
                        <div class="dropdown" data-dropdown>
                            <a href="<?php echo BASE_URL; ?>games" data-dropdown-button>Games<i class="fa fa-angle-down droparrow"></i></a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow1"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>gigs">Gigs <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>devlogs">Devlogs <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>crowdfundings">Crowdfundings
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <hr />
                                    <a href="<?php echo BASE_URL; ?>games?classification=action">Action <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>games?classification=adventure">Adventure <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>games?classification=rpg">RPG <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>games?classification=racing">Racing <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>games?classification=simulation">Simulation <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>games?classification=strategy">Strategy <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <hr />
                                    <a href="<?php echo BASE_URL; ?>games">Browse&nbsp;all&nbsp;games
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown" data-dropdown>
                            <a href="/indieabode/assets" data-dropdown-button>Assets<i class="fa fa-angle-down droparrow"></i></a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow2"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>assets?classification=2D">2D <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>assets?classification=3D">3D <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>assets?classification=audio">Audio <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>assets?classification=visual-effects">Visual&nbsp;Effects
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>assets?classification=textures">Textures <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>assets?classification=maps">Maps <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>assets?classification=tools">Tools <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <hr />
                                    <a href="/indieabode/assets">Browse&nbsp;all&nbsp;assets
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown" data-dropdown>
                            <a href="<?php echo BASE_URL; ?>jams" data-dropdown-button>Jams<i class="fa fa-angle-down droparrow"></i></a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow3"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>jams">Join Jams <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>jams-calender">Jam&nbsp;Calender
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown" data-dropdown>
                            <a href="#" data-dropdown-button>Community<i class="fa fa-angle-down droparrow"></i></a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow4"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>feed">Feed <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>forum">Forum <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>support_center">Help&nbsp;&&nbsp;Support
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown" id="logged" data-dropdown>
                            <a href="#" data-dropdown-button>
                                <div class="pp"><img src="<?php echo BASE_URL; ?>public/images/avatars/<?= $_SESSION['avatar'] ?>" alt=""></div>
                                <?= $_SESSION['username']; ?>
                            </a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow6"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>library">Library <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>cart">Cart <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>

                                    <hr />

                                    <a href="/indieabode/dashboard">Dashboard <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="/indieabode/gameupload">Upload&nbsp;project
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="/indieabode/portfolio?profile=<?= $_SESSION['username']; ?>">Portfolio <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>

                                    <hr />

                                    <a href="/indieabode/settings/profile">Settings <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="/indieabode/login/logout">Log&nbsp;Out
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="search">
                            <form action="/indieabode/search" method="GET" class="search-bar">
                                <input type="text" placeholder="Search Anything..." name="q" value="<?php if (isset($_GET['q'])) {
                                                                                                        echo $_GET['q'];
                                                                                                    }  ?>" />
                                <button type="submit">
                                    <img src="public/images/navbar/search.png" alt="" />
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } else if ($_SESSION['userRole'] == "gamer") { ?>
                <div class="navbar-links">
                    <div class="ul">
                        <div class="dropdown" data-dropdown>
                            <a href="<?php echo BASE_URL; ?>games" data-dropdown-button>Games<i class="fa fa-angle-down droparrow"></i></a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow1"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>gigs">Gigs <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>devlogs">Devlogs <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>crowdfundings">Crowdfundings
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <hr />
                                    <a href="<?php echo BASE_URL; ?>games?classification=action">Action <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>games?classification=adventure">Adventure <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>games?classification=rpg">RPG <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>games?classification=racing">Racing <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>games?classification=simulation">Simulation <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>games?classification=strategy">Strategy <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <hr />
                                    <a href="<?php echo BASE_URL; ?>games">Browse&nbsp;all&nbsp;games
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown" data-dropdown>
                            <a href="<?php echo BASE_URL; ?>jams" data-dropdown-button>Jams<i class="fa fa-angle-down droparrow"></i></a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow3"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>jams">Join Jams <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>jams-calender">Jam&nbsp;Calender
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown" data-dropdown>
                            <a href="" data-dropdown-button>Play<i class="fa fa-angle-down droparrow"></i></a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow3"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>zombieLife">Reward Fight <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>jams-calender">Jam&nbsp;Calender
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown" data-dropdown>
                            <a href="#" data-dropdown-button>Community<i class="fa fa-angle-down droparrow"></i></a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow4"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>feed">Feed <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>forum">Forum <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>support_center">Help&nbsp;&&nbsp;Support
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown" id="logged" data-dropdown>
                            <a href="#" data-dropdown-button>
                                <div class="pp"><img src="<?php echo BASE_URL; ?>public/images/avatars/<?= $_SESSION['avatar'] ?>" alt=""></div>
                                <?= $_SESSION['username']; ?>
                            </a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow6"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>library">Library <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>cart">Cart <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>

                                    <a href="/indieabode/settings/profile">Settings <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="/indieabode/login/logout">Log&nbsp;Out
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="search">
                            <form action="" class="search-bar">
                                <input type="text" placeholder="Search Anything..." name="search" />
                                <button type="submit">
                                    <img src="public/images/navbar/search.png" alt="" />
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } else if ($_SESSION['userRole'] == "asset creator") { ?>
                <div class="navbar-links">
                    <div class="ul">

                        <div class="dropdown" data-dropdown>
                            <a href="/indieabode/assets" data-dropdown-button>Assets<i class="fa fa-angle-down droparrow"></i></a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow2"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>assets?classification=2D">2D <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>assets?classification=3D">3D <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>assets?classification=audio">Audio <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>assets?classification=visual-effects">Visual&nbsp;Effects
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>assets?classification=textures">Textures <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>assets?classification=maps">Maps <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>assets?classification=tools">Tools <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <hr />
                                    <a href="/indieabode/assets">Browse&nbsp;all&nbsp;assets
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown" data-dropdown>
                            <a href="#" data-dropdown-button>Community<i class="fa fa-angle-down droparrow"></i></a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow4"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>feed">Feed <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>forum">Forum <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>support_center">Help&nbsp;&&nbsp;Support
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown" id="logged" data-dropdown>
                            <a href="#" data-dropdown-button>
                                <div class="pp"><img src="<?php echo BASE_URL; ?>public/images/avatars/<?= $_SESSION['avatar'] ?>" alt=""></div>
                                <?= $_SESSION['username']; ?>
                            </a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow6"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>library">Library <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>cart">Cart <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>

                                    <hr />

                                    <a href="/indieabode/dashboard">Dashboard <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="/indieabode/assetupload">Upload&nbsp;project
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="/indieabode/portfolio">Portfolio <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>

                                    <hr />

                                    <a>Settings <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="/indieabode/login/logout">Log&nbsp;Out
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="search">
                            <form action="" class="search-bar">
                                <input type="text" placeholder="Search Anything..." name="search" />
                                <button type="submit">
                                    <img src="public/images/navbar/search.png" alt="" />
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } else if ($_SESSION['userRole'] == "gamejam organizer") { ?>
                <div class="navbar-links">
                    <div class="ul">


                        <div class="dropdown" data-dropdown>
                            <a href="<?php echo BASE_URL; ?>jams" data-dropdown-button>Jams<i class="fa fa-angle-down droparrow"></i></a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow3"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>jams">Join Jams <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>jams-calender">Jam&nbsp;Calender
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown" data-dropdown>
                            <a href="#" data-dropdown-button>Community<i class="fa fa-angle-down droparrow"></i></a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow4"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>feed">Feed <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>forum">Forum <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>support_center">Help&nbsp;&&nbsp;Support
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown" id="logged" data-dropdown>
                            <a href="#" data-dropdown-button>
                                <div class="pp"><img src="<?php echo BASE_URL; ?>public/images/avatars/<?= $_SESSION['avatar'] ?>" alt=""></div>
                                <?= $_SESSION['username']; ?>
                            </a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow6"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>library">Library <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>cart">Cart <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>

                                    <hr />

                                    <a href="/indieabode/dashboard">Dashboard <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="/indieabode/gameupload">Upload&nbsp;project
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="/indieabode/portfolio">Portfolio <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>

                                    <hr />

                                    <a>Settings <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="/indieabode/login/logout">Log&nbsp;Out
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="search">
                            <form action="" class="search-bar">
                                <input type="text" placeholder="Search Anything..." name="search" />
                                <button type="submit">
                                    <img src="public/images/navbar/search.png" alt="" />
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } else if ($_SESSION['userRole'] == "game publisher") { ?>
                <div class="navbar-links">
                    <div class="ul">
                        <div class="dropdown" data-dropdown>
                            <a href="<?php echo BASE_URL; ?>games" data-dropdown-button>Games<i class="fa fa-angle-down droparrow"></i></a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow1"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>games?classification=action">Action <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>games?classification=adventure">Adventure <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>games?classification=rpg">RPG <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>games?classification=racing">Racing <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>games?classification=simulation">Simulation <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>games?classification=strategy">Strategy <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <hr />
                                    <a href="<?php echo BASE_URL; ?>games">Browse&nbsp;all&nbsp;games
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown" data-dropdown>
                            <a href="<?php echo BASE_URL; ?>gigs" data-dropdown-button>Gigs<i class="fa fa-angle-down droparrow"></i></a>

                            <div class="dropdown-menu">
                                <div class="arrow gigsarrow"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>requests">Requests <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>archieve">Archieve <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <hr />
                                    <a href="<?php echo BASE_URL; ?>gigs">Browse&nbsp;all&nbsp;gigs
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown" data-dropdown>
                            <a href="<?php echo BASE_URL; ?>gigs" data-dropdown-button>Advertisements<i class="fa fa-angle-down droparrow"></i></a>

                            <div class="dropdown-menu">
                                <div class="arrow gigsarrow"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>requests">Requests <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>archieve">Archieve <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <hr />
                                    <a href="<?php echo BASE_URL; ?>gigs">Browse&nbsp;all&nbsp;gigs
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown" data-dropdown>
                            <a href="#" data-dropdown-button>Community<i class="fa fa-angle-down droparrow"></i></a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow4"></div>
                                <div class=".ulsub">
                                    <a href="<?php echo BASE_URL; ?>feed">Feed <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>forum">Forum <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="<?php echo BASE_URL; ?>support_center">Help&nbsp;&&nbsp;Support
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown" id="logged" data-dropdown>
                            <a href="#" data-dropdown-button>
                                <div class="pp"><img src="<?php echo BASE_URL; ?>public/images/avatars/<?= $_SESSION['avatar'] ?>" alt=""></div>
                                <?= $_SESSION['username']; ?>
                            </a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow6"></div>
                                <div class=".ulsub">

                                    <a href="/indieabode/dashboard">Dashboard <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="/indieabode/portfolio">Portfolio <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>

                                    <hr />

                                    <a>Settings <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="/indieabode/login/logout">Log&nbsp;Out
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="search">
                            <form action="" class="search-bar">
                                <input type="text" placeholder="Search Anything..." name="search" />
                                <button type="submit">
                                    <img src="public/images/navbar/search.png" alt="" />
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } else if ($_SESSION['userRole'] == "admin") { ?>
                <div class="navbar-links">
                    <div class="ul">



                        <div class="dropdown" id="logged" data-dropdown>
                            <a href="#" data-dropdown-button>
                                <div class="pp"><img src="public/images/Admin/admin-1.png" alt=""></div>
                                <?= $_SESSION['username']; ?>
                            </a>

                            <div class="dropdown-menu">
                                <div class="arrow arrow6"></div>
                                <div class=".ulsub">


                                    <a>Settings <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                    <a href="/indieabode/login/logout">Log&nbsp;Out
                                        <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="search">
                            <form action="" class="search-bar">
                                <input type="text" placeholder="Search Anything..." name="search" />
                                <button type="submit">
                                    <img src="public/images/navbar/search.png" alt="" />
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="navbar-links">
                <div class="ul">
                    <div class="dropdown" data-dropdown>
                        <a href="<?php echo BASE_URL; ?>games" data-dropdown-button>Games<i class="fa fa-angle-down droparrow"></i></a>

                        <div class="dropdown-menu">
                            <div class="arrow arrow1"></div>
                            <div class=".ulsub">
                                <a href="<?php echo BASE_URL; ?>gigs">Gigs <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <a href="<?php echo BASE_URL; ?>devlogs">Devlogs <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <a href="<?php echo BASE_URL; ?>crowdfundings">Crowdfundings
                                    <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <hr />
                                <a href="<?php echo BASE_URL; ?>games?classification=action">Action <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <a href="<?php echo BASE_URL; ?>games?classification=adventure">Adventure <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <a href="<?php echo BASE_URL; ?>games?classification=rpg">RPG <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <a href="<?php echo BASE_URL; ?>games?classification=racing">Racing <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <a href="<?php echo BASE_URL; ?>games?classification=simulation">Simulation <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <a href="<?php echo BASE_URL; ?>games?classification=strategy">Strategy <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <hr />
                                <a href="<?php echo BASE_URL; ?>games">Browse&nbsp;all&nbsp;games
                                    <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown" data-dropdown>
                        <a href="/indieabode/assets" data-dropdown-button>Assets<i class="fa fa-angle-down droparrow"></i></a>

                        <div class="dropdown-menu">
                            <div class="arrow arrow2"></div>
                            <div class=".ulsub">
                                <a href="<?php echo BASE_URL; ?>assets?classification=2D">2D <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <a href="<?php echo BASE_URL; ?>assets?classification=3D">3D <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <a href="<?php echo BASE_URL; ?>assets?classification=audio">Audio <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <a href="<?php echo BASE_URL; ?>assets?classification=visual-effects">Visual&nbsp;Effects
                                    <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <a href="<?php echo BASE_URL; ?>assets?classification=textures">Textures <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <a href="<?php echo BASE_URL; ?>assets?classification=maps">Maps <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <a href="<?php echo BASE_URL; ?>assets?classification=tools">Tools <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <hr />
                                <a href="/indieabode/assets">Browse&nbsp;all&nbsp;assets
                                    <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown" data-dropdown>
                        <a href="<?php echo BASE_URL; ?>jams" data-dropdown-button>Jams<i class="fa fa-angle-down droparrow"></i></a>

                        <div class="dropdown-menu">
                            <div class="arrow arrow3"></div>
                            <div class=".ulsub">
                                <a href="<?php echo BASE_URL; ?>jams">Join Jams <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <a href="<?php echo BASE_URL; ?>jams-calender">Jam&nbsp;Calender
                                    <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown" data-dropdown>
                        <a href="#" data-dropdown-button>Community<i class="fa fa-angle-down droparrow"></i></a>

                        <div class="dropdown-menu">
                            <div class="arrow arrow4"></div>
                            <div class=".ulsub">
                                <a href="<?php echo BASE_URL; ?>feed">Feed <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <a href="<?php echo BASE_URL; ?>forum">Forum <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <a href="<?php echo BASE_URL; ?>support_center">Help&nbsp;&&nbsp;Support
                                    <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown" data-dropdown>
                        <a href="#" data-dropdown-button>Sign Up<i class="fa fa-angle-down droparrow"></i></a>

                        <div class="dropdown-menu">
                            <div class="arrow arrow5"></div>
                            <div class=".ulsub">
                                <a href="/indieabode/login">Log&nbsp;In <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                                <a href="/indieabode/register">Sign&nbsp;Up
                                    <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            </div>
                        </div>
                    </div>



                    <div class="search">
                        <form action="" class="search-bar">
                            <input type="text" placeholder="Search Anything..." name="search" />
                            <button type="submit">
                                <img src="public/images/navbar/search.png" alt="" />
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>