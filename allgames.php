<?php     
require_once 'initialize.php';
$page = 'gamestore';
$subpage = 'allgames';

$query = "SELECT Name, Description, Image FROM game";

$mysql = new Database();
$data = $mysql->query($query);
require_once './inc/header.php';
?>
    <main>
        <!--dashboard-->
        <section class="dashboard">
            <div class="container">
                
            <?php require_once './inc/leftnav.php';?>

              <!-- dynamic display area -->
                <div class="display">
                    <div class="container-box">
                        <div class="row">
                        <?php foreach($data as $game){
                            echo "
                            <div class='row-item'>
                                <div class='game-card'><img src=\"./imgs/game-cards/".$game["Image"]."\" alt=\"".$game["Name"]."\"></div>
                                <button class='btn btn--viewinfo' onclick='viewGameInfo(\"".$game["Name"]."\")'>View Info</button>
                            </div>
                            ";
                        }?>                            
                        </div>
                    </div>
                </div>
        <?php require_once './inc/modal.php';?>
            </div>
        </section>
    </main>
    <?php require_once './inc/footer.php';?>