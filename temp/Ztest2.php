<?php 
	$servername = "csci355-mysql.mysql.database.azure.com";
	$server_username = "csci355admin@csci355-mysql";
	$server_password = "csci_355";
	$dbName = "gamecompany";
	
	$fname="";
	$lname="";
	$dob="";
	$email="";
	$username="";
	$password="";
	$confpassword="";
	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$dob=$_POST['dob'];
	$email=$_POST['email'];
	$username=$_POST['user'];
	$password=$_POST['password'];
	$confpassword=$_POST['conf-password'];
	$date = date("Y/m/d");
	$expireddate=date_add($date,date_interval_create_from_date_string("40 days"));
	
	if ($password === $confpassword){				 
		 $conn = new mysqli($servername, $server_username, $server_password, $dbName);
    	 $string;
    	 if(mysqli_connect_errno())
    	 {
        		//header("Location: https://gamecompany.azurewebsites.net/index.php",$username); /* Redirect browser */
				echo "connection errror";
				exit();
    	 }
    	 else{
    	 	$query = "SELECT * FROM user where username='".$username."';";
  	    	$result = mysqli_query($conn,$query);
  
      	  	
            	$existinginfo = mysqli_fetch_assoc($result);
				$salt = "\$5\$rounds=5000\$" . "steamedhams" . $username . "\$";
 				$hash = crypt($password, $salt);

 				$loginhash = crypt($password, $salt);
				 
				 if (mysqli_num_rows($result)>=1)
				 {
					 header("Location: https://gamecompany.azurewebsites.net"); /* Redirect browser */
					 //echo "user exist";
					exit();
				 }
				 else
				 {	
				  	 $queryinsert = "INSERT INTO user (username, hash,salt,lname,fname,dob,email,createddate,expireddate) VALUES 
						            ('".$username."','".$hash."','".$salt."','".$lname."','".$fname."','".$dob."','".$email."','".$date."','".$expireddate."')";
					  		
					  if (mysqli_query($conn, $queryinsert)){
						 //echo "done"; 
					     header("Location: https://gamecompany.azurewebsites.net/signin.php"); /* Redirect browser */
						 exit();
					  }
					else{	 
						header("Location: https://gamecompany.azurewebsites.net"); /* Redirect browser */
						//echo "SQL issue ".$queryinsert;
						exit();
					 }	 
				 }
        	} 	
		
        mysqli_close($conn);
	}else{
		header("Location: https://gamecompany.azurewebsites.net");
		//echo "<script> alert('password issue');</script> ".$password." - ".$confpassword;
		exit();
	}	
 
?>
