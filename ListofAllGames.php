<?php 
require_once "config.php";
require_once 'databaseconnect.php';

$query = "SELECT Name, Description, Image FROM game";

$mysql = new Database();
$data = $mysql->query($query);
$games = array();

foreach($data as $row)
    $games[$row["Name"]] = [ 
        "description" => $row["Description"], 
        "image" => "./imgs/game-cards/".$row["Image"]
    ];


$game = str_replace('%20',' ',$_GET["q"]);

echo json_encode($games[$game]);


?>
