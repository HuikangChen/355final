<?php 
require_once 'initialize.php';

//function from session_helper.php
logout();

if(!isLoggedIn())
    echo "success";

else echo "failure";

?>