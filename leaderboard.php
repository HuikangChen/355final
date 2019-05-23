<?php 
    
require_once 'initialize.php';
$page = 'mydashboard';
$subpage = 'leaderboard';

if(!isLoggedIn()){
    header("Location: https://gamecompany.azurewebsites.net/signin.php");
}


require_once './inc/header.php';
?>
    <main>
        <!--dashboard-->
        <section class="dashboard">
            <div class="container">   

            <?php require_once './inc/leftnav.php';?>

              <!-- dynamic display area -->
                <div class="display">
                    <div class="container-box">
                        <div class="row">
                            <div class="row-item">
                            <?php                         
                                    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                
                                $getLeaderboardQuery = "SELECT user.Username, MAX(userleaderboard.Score)
                                from userleaderboard INNER JOIN user ON userleaderboard.UserID = user.UserID 
                                WHERE userleaderboard.GameID = 1 GROUP BY user.Username ORDER BY MAX(userleaderboard.Score) DESC LIMIT 100;"; 
                                $result = mysqli_query($conn, $getLeaderboardQuery);
                                $num_results = mysqli_num_rows($result);

                                echo "<table>"; 
                                echo "<caption>AngryCube</caption>";                               
                                echo "<tr>" .
                                          "<th> Rank </th>" . 
                                          "<th> Name </th>" . 
                                          "<th> Score </th>" . 
                                          "</tr>";
                                for($i = 0; $i < $num_results; $i++)
                                {
                                    $row = mysqli_fetch_array($result);                                    
                                    echo "<tr>" .
                                          "<td> " . ($i + 1) . "</td>" . 
                                          "<td> " . $row['Username'] . "</td>" . 
                                          "<td> " . $row['MAX(userleaderboard.Score)'] . "</td>" . 
                                          "</tr>";
                                }
                                echo "</table>";
                            ?>
                            </div>

                            <div class="row-item">
                            <?php                         
                                   $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                
                                $getLeaderboardQuery = "SELECT user.Username, MAX(userleaderboard.Score)
                                from userleaderboard INNER JOIN user ON userleaderboard.UserID = user.UserID 
                                WHERE userleaderboard.GameID = 2 GROUP BY user.Username ORDER BY MAX(userleaderboard.Score) DESC LIMIT 100;"; 
                                $result = mysqli_query($conn, $getLeaderboardQuery);
                                $num_results = mysqli_num_rows($result);

                                echo "<table>";
                                echo "<caption>AngryCube 2</caption>";  
                                echo "<tr>" .
                                          "<th> Rank </th>" . 
                                          "<th> Name </th>" . 
                                          "<th> Score </th>" . 
                                          "</tr>";
                                for($i = 0; $i < $num_results; $i++)
                                {
                                    $row = mysqli_fetch_array($result);                                    
                                    echo "<tr>" .
                                          "<td> " . ($i + 1) . "</td>" . 
                                          "<td> " . $row['Username'] . "</td>" . 
                                          "<td> " . $row['MAX(userleaderboard.Score)'] . "</td>" . 
                                          "</tr>";
                                }
                                echo "</table>";
                            ?>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once './inc/footer.php';?>
