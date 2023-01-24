<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <style>
        <?php include 'public/css/navbar.css'; ?>
    </style>

    <title>IndieAbode</title>
</head>

<body>
    <div class="navbar">
        <div class="logo"><a href="/indieabode">IndieAbode</a></div>
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>

        <div class="navbar-links">
            <div class="ul">
                <div class="dropdown" data-dropdown>
                    <a href="/indieabode/games" data-dropdown-button>Games<i class="fa fa-angle-down droparrow"></i></a>

                    <div class="dropdown-menu">
                        <div class="arrow arrow1"></div>
                        <div class=".ulsub">
                            <a href="/indieabode/gigs">Gigs <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a href="/indieabode/devlogs">Devlogs <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a>Crowdfunding
                                <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a>Action <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a>Adventure <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a>RPG <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a>Racing <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a>Simulation <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a>Strategy <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a href="/indieabode/pages/games.php">Browse&nbsp;all&nbsp;assets
                                <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                        </div>
                    </div>
                </div>

                <div class="dropdown" data-dropdown>
                    <a href="/indieabode/assets" data-dropdown-button>Assets<i class="fa fa-angle-down droparrow"></i></a>

                    <div class="dropdown-menu">
                        <div class="arrow arrow2"></div>
                        <div class=".ulsub">
                            <a href="/indieabode/assets/classification_2D">2D <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a>3D <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a>Audio <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a>Visual&nbsp;Effects
                                <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a>Textures <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a>Maps <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a>Tools <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a href="/indieabode/pages/assets.php">Browse&nbsp;all&nbsp;assets
                                <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                        </div>
                    </div>
                </div>

                <div class="dropdown" data-dropdown>
                    <a href="/indieabode/jams" data-dropdown-button>Jams<i class="fa fa-angle-down droparrow"></i></a>

                    <div class="dropdown-menu">
                        <div class="arrow arrow3"></div>
                        <div class=".ulsub">
                            <a>Join Jams <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a href="/indieabode/pages/gamejamform.php">Host Jams <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a>Jam&nbsp;Dashboard
                                <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                        </div>
                    </div>
                </div>

                <div class="dropdown" data-dropdown>
                    <a href="#" data-dropdown-button>Community<i class="fa fa-angle-down droparrow"></i></a>

                    <div class="dropdown-menu">
                        <div class="arrow arrow4"></div>
                        <div class=".ulsub">
                            <a>Feed <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a>Forum <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a>Help&nbsp;&&nbsp;Support
                                <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                        </div>
                    </div>
                </div>

                <div class="dropdown" id="not-logged" data-dropdown>
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

                <div class="dropdown" id="logged" data-dropdown>
                    <a href="#" data-dropdown-button>
                        <div class="pp"></div>
                        Prend<i class="fa fa-angle-down droparrow"></i>
                    </a>

                    <div class="dropdown-menu">
                        <div class="arrow arrow6"></div>
                        <div class=".ulsub">
                            <a>Library <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a href="/indieabode/pages/cart.php">Cart <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>
                            <a>Wishlist <i class="fa fa-angle-right rightdown single"></i><i class="fa fa-angle-double-right rightdown double"></i></a>

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
    </div>