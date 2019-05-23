<?php 
    require_once 'initialize.php';
    $links = getLinks();

    $query = "SELECT Name, Description, Image FROM game ORDER BY GameID LIMIT 4";
    
    $mysql = new Database();
    $games = $mysql->query($query);

    $latestGames = array(
        "title" => "Top Games",
        "latest" => "Angry Cube 2",
        "games" => $games
    );
    $membership = array(
        "regulartitle" => "Regular Membership",
        "premiumtitle" => "Premium Membership",
        "regularprice" => "$9.99",
        "premiumprice" => "$19.99",
        "membershipfrequency" => "per month",
        "premiumincludes" => [
            "unlimited games per month",
            "early access to pre-releases",
            "invites into beta tests",
            "get discounts on partner sites"
        ], 
        "regularincludes" => [
            "get up to 2 free games per month",
            "get free demos of latest games"
        ]               
    );
    $faq = array(
        "title" => "Frequently Asked Questions",
        "content" => array(
        [
            "question" => "Where are my games?", 
            "answer" => "All of your games are available for download and can be found in <a href='".$links["mygames"]."'>my dashboard</a> once you are signed in."
        ],
        [
            "question" => "How can I change my membership?", 
            "answer" => "You can upgrade or downgrade your membership by heading to <a href=\"".$links["myaccount"]."\">my dashboard</a> once you are logged in.  Navigate to account info and click on the change button next to membership type."
        ],
        [
            "question" => "Can I purchase individual games without a subscription plan?", 
            "answer" => "Yes! Once you create an account, head on over to the <a href=\"".$links["allgames"]."\">game store</a> and only pay for the games you want."                    
        ]
        )
    );
    $data = [
        'title' => 'The Game Company',
        'subtitle' => "Get our newly released ".$latestGames["latest"]." today!",
        'topgames' => $latestGames,
        'membership' => $membership,
        'faq' => $faq
    ];
    $page = 'home';
    require_once './inc/header.php';
?>
    <!-- homepage hero box -->
    <header id="landing">
        <div class="container">
            <div id="homepage-header">
                <div id="banner">
                        <h1 id="main-title"><?php echo $data['title']; ?></h1>
                        <h3 id="main-subtitle"><?php echo $data['subtitle']; ?></h3>
                </div>
                <div id="call-to-action">
                    <a href="<?php echo $links["premiummembership"]; ?>"><button class="btn btn--trial">Start 30 Day Trial</button></a>
                </div>
            </div>
        </div>
    </header>

    <main>
    
        <!-- top selling games -->
        <section id="top-selling">
            <div class="container">
                <div class="section-title--wrapper">
                    <h2 class="section-title"><?php echo $data['topgames']['title'];?></h2>
                    <div class="dotted-underline"></div>
                </div>
                <div class="row">
                    <?php foreach($games as $game){
                        echo "
                        <div class='row-item'>
                        <div class='game-card'><img src=\"./imgs/game-cards/".$game["Image"]."\" alt=\"".$game["Name"]."\"></div>
                            <button class='btn btn--viewinfo' onclick='viewGameInfo(\"".$game["Name"]."\")'>View Info</button>
                        </div>
                        ";
                    }?>
                </div>
                <a id="more" href="<?php echo $links["allgames"]; ?>">
                    <h4>View More</h4>
                    <div class="dotted-underline"></div>
                </a>

        <?php require_once './inc/modal.php';?>
            </div>
        </section>


        <!-- membership -->
        <section id="membership">
            <div class="row container">
                <!-- regular membership -->
                <div class="row-item">
                    <div class="card card-membership">
                        <div class="card-membership--content">
                            <h3 class="card-membership--title">
                                <?php echo $data['membership']['regulartitle']?>
                            </h3>
                            <ul class="card-membership--description">
                                <?php foreach($data['membership']['regularincludes'] as $includes){
                                    echo "
                                    <li>
                                        <i class='icon icon--check'>&#10004;</i>$includes
                                    </li>
                                    ";
                                }?>
                            </ul>
                        </div>
                        <div class="card-membership--price">
                            <h4 class="membership-price">
                                <?php echo $data['membership']['regularprice']?> <span class="membership-price__small">
                                    <?php echo $data['membership']['membershipfrequency']?>
                                </span>
                            </h4>
                            <a href="<?php echo $links["regularmembership"]; ?>"><button class="btn btn--trial">Start 30 Day Trial</button></a>
                        </div>
                    </div>
                </div>
                <!-- premium membership -->
                <div class="row-item">
                    <div class="card card-membership">
                        <div class="card-membership--content">
                            <h3 class="card-membership--title">
                                <?php echo $data['membership']['premiumtitle']?>
                            </h3>
                            <ul class="card-membership--description">
                                <?php foreach($data['membership']['premiumincludes'] as $includes){
                                    echo "
                                    <li>
                                        <i class='icon icon--check'>&#10004;</i>$includes
                                    </li>
                                    ";
                                }?>
                            </ul>
                        </div>
                        <div class="card-membership--price">
                            <h4 class="membership-price">
                                <?php echo $data['membership']['premiumprice']?> <span class="membership-price__small">
                                    <?php echo $data['membership']['membershipfrequency']?></span>
                            </h4>
                            <a href="<?php echo $links["premiummembership"]; ?>"><button class="btn btn--trial">Start 30 Day Trial</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- frequently asked questions -->
        <section id="faq">
            <div class="container section-box">
                <div class="section-title--wrapper">
                    <h2 class="section-title">Frequently Asked Questions</h2>
                    <div class="dotted-underline"></div>
                </div>
                <div class="container--content">
                    <ul id="faq-list">
                        <?php foreach($data['faq']['content'] as $faq){
                            echo "
                            <li><span class=\"faq-i\">Q:</span> ".$faq["question"]."</li>
                            <li><span class=\"faq-i\">A:</span> ".$faq["answer"]."</li>
                            ";
                        }?>
                    </ul>
                </div>
            </div>
        </section>
    </main>

    <?php require_once './inc/footer.php';?>