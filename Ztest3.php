<?php
    require_once 'initialize.php';
    
    $page = 'statistics';
    $subpage = 'installperday';
   
  $servername = "csci355-mysql.mysql.database.azure.com";
	$server_username = "csci355admin@csci355-mysql";
	$server_password = "csci_355";
	$dbName = "gamecompany";
				 
	$fromdate=$_POST["fromdate"];
  $todate=$_POST["todate"];
  
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
                  <h2 class="section-title">Installs Per Day</h2>
                    <div class="row">
                      <div id="barchart" >
                          
                      </div>
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
  ['Date','Game', 'Installs'],
  <?php
    	 $conn = new mysqli($servername, $server_username, $server_password, $dbName);

    	 if(!mysqli_connect_errno())
    	 {
      		$query = "SELECT Date_,GameID Installs FROM gamedailyinfo WHERE Date_>='".$fromdate."' and Date_<='".$todate."' ORDER BY Date_ Desc;";
      	  $result = mysqli_query($conn,$query);
          
      	  While ($row = mysqli_fetch_array($result)){
              echo "['".$row['Date_']."',".$row['GameID'].",".$row['Installs']."],";
        	 }
         mysqli_close($conn);
       }  
    ?>     
 ]);
 
  var options = {
               bars: 'horizontal',
               width:850,
               height:600,
               vAxis: {title: 'Date'},
               hAxis: {title: 'Game'},
               seriesType: 'bars',
               };
  var chart = new google.visualization.ComboChart(document.getElementById('barchart'));
  chart.draw(data, options);
}
</script>

</body>
</html>

   <?php require_once './inc/footer.php';?>