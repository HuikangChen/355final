<?php
 
    function signin(){    
        // if(isLoggedIn()){
        //     redirect('mydashboard');
        // }

        $data = array(
            "title" => "Sign In",
            "message" => "",
            "errors" => array(
                "password" => "",
                "user" => "",
                "connection" => "",
                "other" => ""
            )
        );

        //Make the connection
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if(!empty($_SESSION['registersuccess'])){
            $data["message"] = $_SESSION['registersuccess'];
            unset($_SESSION['registersuccess']);
            $this->view('user/signin',$data);
        }
            //process sign in attempt
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            if(mysqli_connect_errno())
                $data["errors"]["connection"] = 'DB Connection error!'; 
            else {
                //Variables from the user for registration
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $username = $_POST["user"];
                $password = $_POST["password"];
                
                //Check if username already exist in our database
                $nameCheckQuery = "SELECT Username, Salt, Hash FROM user WHERE Username = '" . $username . "';";
                $nameCheck = mysqli_query($conn, $nameCheckQuery);
                if(is_null($nameCheck)){
                    //error code # 2 - name check query failed
                    $data["errors"]["user"] = 'Error, name check query failed!'; 
                } else {
                    if(mysqli_num_rows($nameCheck) != 1)
                        $data["errors"]["user"] = 'User does not exist!'; 
                    else {
                            //get login info from query
                        $existinginfo = mysqli_fetch_assoc($nameCheck);
                        $salt = $existinginfo["Salt"];
                        $hash = $existinginfo["Hash"];
                        
                        $loginhash = crypt($password, $salt);
                        if($hash != $loginhash) {
                            $data["errors"]["password"] = 'Incorrect password!';
                        } 
                        else {
                            $this->createUserSession($username);
                        }
                    }
                }
            }
        }  
	    mysqli_close($conn);
        $this->view('user/signin',$data);
    }

    function register(){    
        // if(isLoggedIn()){
        //     redirect('mydashboard');
        // }
        $data = array(
            "title" => "Register",
            "errors" => array(
                "password" => "",
                "confpassword" => "",
                "user" => "",
                "email" => "",
                "connection" => "",
                "lname" => "",
                "fname" => ""
            )
        );

        //process sign in attempt
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Make the connection
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            
            if(mysqli_connect_errno())
                $data["errors"]["connection"] = 'DB Connection error!'; 
            else {
                //Variables from the user for registration
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); $username = $_POST["user"];
                $password = $_POST["password"];
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $dob =  $_POST["dob"];
                $email =  $_POST["email"];
                $conf_password = $_POST["conf-password"];
                
                //Check if username already exist in our database
                $nameCheckQuery = "SELECT Username FROM user WHERE Username = '" . $username . "';";
                $nameCheck = mysqli_query($conn, $nameCheckQuery);
                if(is_null($nameCheck)){
                    //error code # 2 - name check query failed
                    $data["errors"]["user"] = 'Error, name check query failed!'; 
                } else{
                
                    if(mysqli_num_rows($nameCheck) > 0)
                        $data["errors"]["user"] = 'Username already exists!';                 
                    else {
                        //Add User to table
                        $salt = "\$5\$rounds=5000\$" . "steamedhams" . $username . "\$";
                        $hash = crypt($password, $salt);
                        
                        $insertUserQuery = "INSERT INTO user (Username, Hash, Salt,Lname,Fname,dob,email,CreatedDate) VALUES('".$username."' , '".$hash."' , '".$salt."','".$lname."','".$fname."','".$dob."','".$email."','".date("Y-m-d H:i:s")."');";
                        if (mysqli_query($conn, $insertUserQuery)) {
                            $_SESSION['registersuccess'] = "Congratulation! Your account has been created!";  
                            redirect('user/signin');
                        } 
                        else {
                            $data["errors"]["connection"] = 'Insert user query failed!';
                        }
                    }
                }
            }
        }
	    mysqli_close($conn);
        //pass on data
    }
        
    function createUserSession($username){
        $_SESSION['username'] = $username;
            redirect('mydashboard');
    }
    
    function signout(){
        unset($_SESSION['username']);
        session_destroy();
        redirect('users/signin');
    }
