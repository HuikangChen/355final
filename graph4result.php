<?php
    require_once 'initialize.php';
    
    $page = 'statistics';
    $subpage = 'cpi';
    
    

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
                  <h2 class="section-title">Cost Per Install</h2>
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
  ['Membership', 'Installs', 'Cost','Cost per Install'],
  <?php
    	 $conn = new mysqli($servername, $server_username, $server_password, $dbName);
    	 
    	 if(!mysqli_connect_errno())
    	{
      		$query = "select Date_, Installs/100 as Installs, AdsCost/100 as Cost, AdsCost/Installs as cosperinstall from gamedailyinfo where Date_>='".$fromdate."' and Date_<='".$todate."' ORDER BY Date_ asc;";
          //$query="select Date_, Installs/100 as Installs, AdsCost/100 as AdsCost, AdsCost/Installs as cosperinstall from gamedailyinfo where Date_>='2019-05-12' and Date_<='2019-05/20' order by Date_ asc;";      	  
          $result = mysqli_query($conn,$query);
          if ($result){   
          	  While ($row = mysqli_fetch_array($result)){
                  echo "['".$row['Date_']."',".$row['Installs'].",".$row['Cost'].",".$row['cosperinstall']."],";
              }    
       	 }
         mysqli_close($conn);
       }  
    ?>     
 ]);
 
  // Optional; add a title and set the width and height of the chart
  var options = {
               bars: 'horizontal',
               width:850,
               height:600,
               title : 'Date',
               vAxis: {title: 'Installs'},
               hAxis: {title: 'Cost'},
               seriesType: 'bars',
               series: {2: {type: 'line'}}
              };

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.ComboChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

</body>
</html>

   <?php require_once './inc/footer.php';?>