<?php     
require_once 'initialize.php';
$page = 'gamestore';
$subpage = 'latestgames';

$query = "SELECT Name, Description, Image FROM game WHERE Name = 'Angry Cubes 2'";
$mysql = new Database();
$data = $mysql->query($query)[0];

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
                                <img src="./imgs/game-cards/<?php echo $data["Image"];?>" alt="gameName">
                                <div id="rating">
                                    <!-- star icon = #9733; -->
                                    <i class="icon">&#9733;</i>
                                    <i class="icon">&#9733;</i>
                                    <i class="icon">&#9733;</i>
                                    <i class="icon">&#9733;</i>
                                    <i class="icon icon__inactive">&#9733;</i>
                                </div>
                            </div>
                            <div class="container-box--title"><h3><?php echo $data["Name"]; ?></h3></div>
                        </div>
                        <div class="content-box--contents">
                            <h4 class="contents--title">Synopsis</h4>
                            <p><?php echo $data["Description"]; ?></p>
                            <button class="btn btn--buynow">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <?php require_once './inc/footer.php';?>