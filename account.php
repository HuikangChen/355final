<?php 
    
require_once 'initialize.php';

$page = 'mydashboard';
$subpage = 'account';

if(!isLoggedIn()){
    header("Location: https://gamecompany.azurewebsites.net/signin.php");
}


require_once './inc/header.php';
?>
<main>
    <!-- gamestore dashboard-->
    <section class="dashboard">
        <div class="container">
            
            <?php require_once './inc/leftnav.php';?>
            
            <?php 
                 $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 session_start(); 
                 $getAccountInfoQuery = "SELECT * FROM user WHERE Username = '" .$_SESSION['username']. "';";

                 $result = mysqli_query($conn, $getAccountInfoQuery);

                 if(mysqli_num_rows($result) > 0)
                 {
                     $row = mysqli_fetch_assoc($result);
                 }
            ?>

            <!-- dynamic display area -->
            <div class="display">
                <div class="container-box">
                    <h2 class="section-title">Account Info</h2>
                    <div id="account">
                        <div class ="table-row">
                            <div class="row">
                                <div class="row-item">
                                    <div class="table-data">username</div>
                                    <div class="table-data"><?php echo $row['Username'] ?></div>
                                </div>
                            <!-- <button class="btn btn__alt btn__alt--member">edit</button> -->
                            </div>
                        </div>
                        <div class ="table-row">
                            <div class="row">
                                <div class="row-item">
                                    <div class="table-data">email</div>
                                    <div class="table-data"><?php echo $row['email'] ?></div>
                                </div>
                                <!-- <button class="btn btn__alt btn__alt--member">edit</button> -->
                            </div>
                        </div>
                        <div class ="table-row">
                            <div class="row">
                                <div class="row-item">
                                    <div class="table-data">full name</div>
                                    <div class="table-data"><?php echo $row['Fname'] . " " . $row['Lname']; ?></div>
                                </div>
                                <!-- <button class="btn btn__alt btn__alt--member">edit</button> -->
                            </div>
                        </div>
                        <div class ="table-row">
                            <div class="row">
                                <div class="row-item">
                                    <div class="table-data">password</div>
                                    <div class="table-data"><span class="password-symbol">&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;</span></div>
                                </div>
                                <!-- <button class="btn btn__alt btn__alt--member">edit</button> -->
                            </div>
                        </div>
                        <div class ="table-row">
                            <div class="row">
                                <div class="table-data">birthday</div>
                                <div class="table-data"><?php echo $row['dob'] ?></div>
                            </div>
                        </div>
                        <div class ="table-row">
                            <div class="row">
                                <div class="row-item">
                                    <div class="table-data">membership type</div>
                                    <div class="table-data"><?php echo $row['membership'] ?></div>
                                </div>
                                <!-- <button class="btn btn__alt btn__alt--member">change</button> -->
                            </div>
                        </div>
                        <!--
                        <div class ="table-row">
                            <div class="row">
                                    <div class="table-data">joined date</div>
                                    <div class="table-data">MM/DD/YYYY</div>
                            </div> -->
                        </div>
                        <div class ="table-row">
                            <div class="row">
                                <div class="table-data">Number of games</div>
                                <div class="table-data">2</div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
    </section>
</main>
    
    <?php require_once './inc/footer.php';?>