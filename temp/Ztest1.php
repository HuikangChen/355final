<?php 
	$servername = "csci355-mysql.mysql.database.azure.com";
	$server_username = "csci355admin@csci355-mysql";
	$server_password = "csci_355";
	$dbName = "gamecompany";
	
	$username=$_POST['user'];
	$password=$_POST['password'];
	
				 
	$con = mysqli_connect($servername ,$server_username,$server_password,$dbName);
	
	$conn = new mysqli($servername, $server_username, $server_password, $dbName);
    	 $string;
    	 if(mysqli_connect_errno())
    	 {
        		header("Location: https://gamecompany.azurewebsites.net/index.php",$username); /* Redirect browser */
				exit();
    	 }
    	 else{
    	 	$query = "SELECT * FROM user where username='".$username."';";
  	    	$result = mysqli_query($conn,$query);
  
      	  	
            	$existinginfo = mysqli_fetch_assoc($result);
				$salt = $existinginfo["Salt"];
 				$hash = $existinginfo["Hash"];

 				$loginhash = crypt($password, $salt);
				 
				 if (mysqli_num_rows($result)!=1 || $hash!= $loginhash)
				 {
					 header("Location: https://gamecompany.azurewebsites.net/signin.php"); /* Redirect browser */
					 exit();
				 }
				 else
				 {
					 header("Location: https://gamecompany.azurewebsites.net/mygames.php"); /* Redirect browser */
					 exit();
				 }
        	}
		   	
		
         mysqli_close($conn);
 
?>
