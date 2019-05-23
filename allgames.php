<?php     
require_once 'initialize.php';
$page = 'gamestore';
$subpage = 'allgames';
$data = array(
    array("name" => "Forest Game 2", "description" => "Forest game is back! explore more forests than ever before, interact with other forest inhabitants of the world of nature.  And even see how the city dwelers go about their day as you look on from the glorious open world that is the Forest!", "image" => "./imgs/game-cards/forestgame2.png"),
    array("name" => "Angry Cube 2", "description" => "Some really angry cubes! play the next exciting installment of our topseller Angry Cube.  This sequal promises to bring all the fun that got you hooked in the first Angry Cube, but this time we will double, or even triple the fun.  Be warned, these are some very angry cubes, they are ready to play, are you?", "image" => "./imgs/game-cards/angrycube2.png"),
    array("name" => "Forest Game", "description" => "Forest Game takes you on a journey as a inhabitant of the planet, not of a country or a city.  Live by the rules of nature, govern by the laws of the wilderness, and harness the power of the Forest!", "image" => "./imgs/game-cards/forestgame.png"),
    array("name" => "War Game", "description" => "In this era, power is absolute, the strong rule and the weak perish.  To bring an end to this, rebels from around the world have taken up arms against their ruthless leaders.  The war has been ongoing for 7 years, whole countries have been wiped from the map.  Join the 7 factions in a war against power personified to liberate the masses from oppression.  You have the power to choose which faction to join, which armies to command, and which strategies to take to bring peace to the world!", "image" => "./imgs/game-cards/wargame.png"),
    array("name" => "City Game", "description" => "You've seen the life of civilians unfold as you look on from the forest, now it is time to live amongst them in this spinoff of our popular Forest Game.  See, play, and interact with the city dwelers!", "image" => "./imgs/game-cards/citygame.png"),
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
                                <button class='btn btn--viewinfo' onclick='viewGameInfo(\"".$game["name"]."\")'>View Info</button>
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