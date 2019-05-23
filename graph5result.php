<?php
    require_once 'initialize.php';
    
    $page = 'statistics';
    $subpage = 'avgplaytime';
    
    

  $servername = "csci355-mysql.mysql.database.azure.com";
	$server_username = "csci355admin@csci355-mysql";
	$server_password = "csci_355";
	$dbName = "gamecompany";
  
  $fromdate=$_POST["fromdate"];
  $todate=$_POST["todate"];

   require_once './inc/header.php';
?>
<html lang="en-US">
    <style>
      #charttitle1 {
              Color: rgba(56, 63, 73, 1);
              font-size:30px;
       }
    </style> 
    <main>
        <!--dashboard-->
        <section class="dashboard">
            <div class="container">   

            <?php require_once './inc/leftnav.php';?>

              <!-- dynamic display area -->
                <div class="display">
                <div class="container-box">
                  <h2 class="section-title">Average Play Time</h2>
                    <div class="row">
                        <div id="piechart" >
                            
	                    </div>                        
                    </div>
                </div>
            </div>
        </section>
    </main>

<body>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
	var data = google.visualization.arrayToDataTable([
  ['Date', 'Hour'],
  <?php
    	 $conn = new mysqli($servername, $server_username, $server_password, $dbName);

    	 if(!mysqli_connect_errno())
    	 {
      		$query = "select Date_, playtimetotal/PlaySessions as AvgPlayTime from gamedailyinfo where Date_>='".$fromdate."' and Date_<='".$todate."' ORDER BY Date_ asc;";
          $result = mysqli_query($conn,$query);
          if ($result){   
          	  While ($row = mysqli_fetch_array($result)){
                  echo "['".$row['Date_']."',".$row['AvgPlayTime']."],";
              }
      	 }
         mysqli_close($conn);
       }  
    ?>     
 ]);
 
  // Optional; add a title and set the width and height of the chart
  var options = {
                  is3D:true,
                 colors:["red"],
                 width:850,
                 height:600
               };

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

</body>
</html>

   <?php require_once './inc/footer.php';?>