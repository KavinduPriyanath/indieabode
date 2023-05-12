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
        include 'public/css/supportpages.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <div class="settings-content">
        <div class="top-row">
            Publishing Overview
        </div>
        <div class="settings-body">
            <div class="settings-menu">
                <div class="category">
                    <div class="topics">Games</div>
                    <a href="/indieabode/support_center/publishing">
                        <div class="sub-topics">Introduction</div>
                    </a>
                    <a href="/indieabode/support_center/publishing?games=true&page=portfolio">
                        <div class="sub-topics">Portfolio</div>
                    </a>
                    <a href="/indieabode/support_center/publishing?games=true&page=devlogs">
                        <div class="sub-topics">Devlogs</div>
                    </a>
                    <a href="/indieabode/support_center/publishing?games=true&page=analytics">
                        <div class="sub-topics">Analytics</div>
                    </a>
                    <a href="/indieabode/support_center/publishing?games=true&page=sales">
                        <div class="sub-topics">Sales & Bundles</div>
                    </a>
                </div>
                <div class="category">
                    <div class="topics">Crowdfunds</div>
                    <a href="/indieabode/support_center/publishing?crowdfunds=true&page=introduction">
                        <div class="sub-topics">Introduction</div>
                    </a>
                    <a href="/indieabode/support_center/publishing?crowdfunds=true&page=basic_terminology">
                        <div class="sub-topics">Basic Terminology</div>
                    </a>
                    <a href="/indieabode/support_center/publishing?crowdfunds=true&page=funding_mechanism">
                        <div class="sub-topics">Funding Mechanism</div>
                    </a>
                    <a href="/indieabode/support_center/publishing?crowdfunds=true&page=revenue_sharing">
                        <div class="sub-topics">Revenue Sharing</div>
                    </a>
                    <a href="/indieabode/support_center/publishing?crowdfunds=true&page=more">
                        <div class="sub-topics">More Information</div>
                    </a>
                </div>
                <div class="category">
                    <div class="topics">Gigs</div>
                    <a href="/indieabode/support_center/publishing?gigs=true&page=introduction">
                        <div class="sub-topics">Introduction</div>
                    </a>
                    <a href="/indieabode/support_center/publishing?gigs=true&page=basic_terminology">
                        <div class="sub-topics">Basic Terminology</div>
                    </a>
                    <a href="/indieabode/support_center/publishing?gigs=true&page=negotiations">
                        <div class="sub-topics">Negotiations</div>
                    </a>
                    <a href="/indieabode/support_center/publishing?gigs=true&page=revenue_sharing">
                        <div class="sub-topics">Revenue Sharing</div>
                    </a>
                    <a href="/indieabode/support_center/publishing?gigs=true&page=chat_functionality">
                        <div class="sub-topics">Chat Functionality</div>
                    </a>
                </div>
                <div class="category">
                    <div class="topics">GameJams</div>
                    <a href="/indieabode/support_center/publishing?jams=true&page=introduction">
                        <div class="sub-topics">Introduction</div>
                    </a>
                    <a href="/indieabode/support_center/publishing?jams=true&page=submissions">
                        <div class="sub-topics">Submissions</div>
                    </a>
                    <a href="/indieabode/support_center/publishing?jams=true&page=ranking_criteria">
                        <div class="sub-topics">Ranking Critiera</div>
                    </a>
                    <a href="/indieabode/support_center/publishing?jams=true&page=certificates">
                        <div class="sub-topics">Certificates</div>
                    </a>
                    <a href="/indieabode/support_center/publishing?jams=true&page=rules">
                        <div class="sub-topics">Rules & Regulations</div>
                    </a>
                </div>

            </div>
            <div class="content-body">


                <div class="content-descriptions">
                    <h2>What is Crowdfunding?</h2>
                    <p>Indieabode also works for its developers as a funding platform for their creative projects. Its crowdfund pages are filled with ambitious, innovative, and imaginative ideas that are brought to life through the direct support of others.</p>
                    <br>
                    <p>Everything on Indieabode-Crowdfunding must be a project with a clear goal making a multiplayer fps or endless runner horror knight. </p>
                    <br>
                    <p>Indieabode crowdfunding is not a store, backers pledge to projects to help them come to life and support a creative process.</p>

                    <br>
                    <h3>Clear, transparent communication is key</h3>
                    <br>
                    <p>In some cases, creators will run into challenges and have to make changes to what they first promised their backers. It’s why we say that backing projects is different to making a purchase. There is inherent risk in the creative process, and things don’t always go as planned. </p>
                    <br>
                    <p>When that happens creators must communicate changes and delays on their projects pages and in project updates. Indieabode also has made a devlog publishing system to make this process much easier.</p>
                </div>

            </div>
        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>



</body>



</html>