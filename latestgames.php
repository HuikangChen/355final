<?php     
require_once 'initialize.php';
$page = 'gamestore';
$subpage = 'latestgames';
$data = array("name" => "Angry Cube 2", "description" => "Some really angry cubes! play the next exciting installment of our topseller Angry Cube.  This sequal promises to bring all the fun that got you hooked in the first Angry Cube, but this time we will double, or even triple the fun.  Be warned, these are some very angry cubes, they are ready to play, are you?", "image" => "./imgs/game-cards/angrycube2.png");
require_once './inc/header.php';
?>
    <main>
        <!-- dashboard-->
        <section class="dashboard">
            <div class="container">

            <?php require_once './inc/leftnav.php';?>

              <!-- dynamic display area -->
                <div class="display">
                    <div class="container-box">
                        <div class="row">
                            <div class="container-box--img">
                                <img src="<?php echo $data["image"];?>" alt="gameName">
                                <div id="rating">
                                    <!-- star icon = #9733; -->
                                    <i class="icon">&#9733;</i>
                                    <i class="icon">&#9733;</i>
                                    <i class="icon">&#9733;</i>
                                    <i class="icon">&#9733;</i>
                                    <i class="icon icon__inactive">&#9733;</i>
                                </div>
                            </div>
                            <div class="container-box--title"><h3><?php echo $data["name"]; ?></h3></div>
                        </div>
                        <div class="content-box--contents">
                            <h4 class="contents--title">Synopsis</h4>
                            <p><?php echo $data["description"]; ?></p>
                            <button class="btn btn--buynow">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <?php require_once './inc/footer.php';?>