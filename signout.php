<?php 
require_once 'initialize.php';

logout();

if(!isLoggedIn())
    echo "success";

else echo "failure";

?>