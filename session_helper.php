<?php

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
