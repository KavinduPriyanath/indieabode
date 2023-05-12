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
                    <h2>Why funding Permanent-All?</h2>

                    <p>There are many platforms that already provides all-or-nothing funding systems. But as our platform tends to promote Indie developers we have utilized Permanent-all funding system. In that way the creator will be able to collect his funds whether or not he reaches his funding goal by the deadline.</p>
                    <br>
                    <p>Also this way creators can continue their projects even though they couldn’t managed to get their intended funding amount.</p>
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