<?php
 

// Simple page redirect
function redirect($location){
    header('location:/'.$location);
}


function getLinks(){
    return array(
        "home" => "index.php",
        "aboutus" => "aboutus.php",
        "register" => "register.php",
        "signin" => "signin.php",
        "signout" => "signout.php",
        "premiummembership" => "premiummember.php",
        "regularmembership" => "regularmember.php",
        "contactus" => "#",
        "termsandconditions" => "#",
        "mygames" => "mygames.php",
        "myaccount" => "account.php",
        "leaderboard" => "leaderboard.php",
        "play" => array(
            "Angry Cube" => "angrycubeindex.php",
            "Angry Cube 2" => "angrycube2index.php"
        ),
        "latestgames" => "latestgames.php",
        "allgames" => "allgames.php",
        "topselling" => "topselling.php",
        "statistics" => "graph1.php",
        "signincheck" => "signincheck.php",
        "registercheck" => "registercheck.php",
        "membershipgraph" => "membershipgraph.php",
        "graph1" => "graph1.php",  
        "graph2" => "graph2.php",    
        "graph2result" => "graph2result.php",
        "graph3" => "graph3.php",    
        "graph3result" => "graph3result.php",
        "graph4" => "graph4.php",  
        "graph4result" => "graph4result.php",  
        "graph5" => "graph5.php",  
        "graph5result" => "graph5result.php",  
        "Angry Cube" => "https://play.google.com/store/apps/details?id=com.proj355.proj",
        "Angry Cube 2" => "https://play.google.com/store/apps/details?id=com.angrycubes.angrycubes2"
    );
}
