<?php
// $loggedinuser = null;

// function isLoggedIn(){
//     if(isset($_SESSION['username']) || !is_null($loggedinuser)) return true; 
//     else return false;
// }

// function logout(){
//     if(isset($_SESSION['username'])) {
//         unset($_SESSION['username']);
//         // unset($_SESSION['user_email']);
//         // unset($_SESSION['user_name']);
//         session_destroy();
//     }
//     removeuser();
// }

// function setuser($name){
//     $loggedinuser = $name;
// }

// function removeuser(){
//     $loggedinuser = null;
// }


function isLoggedIn(){
    session_start();
    if(isset($_SESSION['username'])) return true; 
    else return false;
}

function logout(){
    session_start();
    if(isset($_SESSION['username'])) {
        unset($_SESSION['username']);
        session_destroy();
    }
}