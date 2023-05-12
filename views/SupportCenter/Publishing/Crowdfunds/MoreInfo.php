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

                    <h2>Why do people back Projects?</h2>
                    <p>People back projects for a number of reasons. They may be rallying around a friend’s project, or supporting a new effort from someone they’ve long admired. They might be inspired by a new idea, or simply want to try out the new game that is going to come to life through the crowdfund.</p>
                    <br>
                    <p>Whatever the reason, people back projects because they want to have a part in helping to bring it to life. Backing a project is more than just pledging funds to a creator, it’s pledging support for a creative idea.</p>
                    <br>
                    <br>
                    <h2>Where do backers come from?</h2>
                    <p>When a project launches on Indieabode a majority of the initial funding typically comes from the creator’s existing networks. This will be your friends, family, fans, co-workers, and people you’re connected to through your extended network. If people in your network like your project, they'll spread the word to their friends, and so on.</p>
                    <br>
                    <p>Social media is another important tool for spreading the word about your project.</p>
                    <br>
                    <br>
                    <h2>Gig Vs. crowdfund. What is better for you?</h2>
                    <p>Project creators keep 100% ownership of their work, and Kickstarter cannot be used to offer equity, financial returns, or to solicit loans.</p>

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