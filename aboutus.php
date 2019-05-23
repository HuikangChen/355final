<?php 
    
    require_once 'initialize.php';

    $page = 'aboutus';

    $data = [
        'title' => 'About Us',
        'description' => 'We are The GameCompany and we provide original games, from first person shooters to racing to role playing games. Our games are available to purchase individually or are free to play with a monthly subscription plan.  We strive to provide our customers with the most options so that they can enjoy our games in as many ways as possible.  Wether it be playing online through our website, or on a mobile device.'
    ];


    require_once 'inc/header.php';
?>

    <main>
        <!-- About Us -->
        <section class="first-section">     
            <div class="container section-box">
                <div class="section-title--wrapper">
                    <h2 class="section-title"><?php echo $data['title']; ?></h2>
                    <div class="dotted-underline"></div>
                </div>   
                <div class="container--content">
                    <p><?php echo $data['description']; ?></p>
                </div>
            </div>
        </section>
    </main>

    <?php require_once 'inc/footer.php';?>
