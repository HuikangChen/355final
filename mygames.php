<?php 
require_once 'initialize.php';
$page = 'mydashboard';
$subpage = 'mygames';

if(!isLoggedIn()){
    header("Location: https://gamecompany.azurewebsites.net/signin.php");
}
     
$data = array(
    array("name" => "Angry Cube 2", "description" => "Some really angry cubes! play the next exciting installment of our topseller Angry Cube.  This sequal promises to bring all the fun that got you hooked in the first Angry Cube, but this time we will double, or even triple the fun.  Be warned, these are some very angry cubes, they are ready to play, are you?", "image" => "./imgs/game-cards/angrycube2.png"),
    array("name" => "Angry Cube", "description" => "See where the angry cube era began.  Play one of our top selling games today.  Challenge yourself and become a true angry cube!", "image" => "./imgs/game-cards/angrycube.png")
);
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
                            <div class='game-card'><img src=\"".$game["image"]."\" alt=\"".$game["name"]."\"></div>
								<a href = '".$links[$game["name"]]."' ><button class='btn btn--download'>Download</button></a>
								<a href = '".$links["play"][$game["name"]]."'><button class='btn btn__alt btn__alt--play'>Play</button></a>
                            </div>
                            ";
						}?>
                        </div>                        
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <?php require_once './inc/footer.php';?>