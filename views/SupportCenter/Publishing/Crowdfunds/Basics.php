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

            </div>
        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>



</body>



</html>