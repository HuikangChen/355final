<?php
    require_once 'initialize.php';
    
    $page = 'statistics';
    $subpage = 'membership';
    
    

  $servername = "csci355-mysql.mysql.database.azure.com";
	$server_username = "csci355admin@csci355-mysql";
	$server_password = "csci_355";
	$dbName = "gamecompany";
				 
	$conn = new mysqli($servername, $server_username, $server_password, $dbName);

   require_once './inc/header.php';
?>
    <main>
        <!--dashboard-->
        <section class="dashboard">
            <div class="container">   

            <?php require_once './inc/leftnav.php';?>
              <div class="display">
                <div class="container-box">
                  <h2 class="section-title">Membership Statistics</h2>
                    <div class="row">
                      <div id="piechart" >
                          
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
  ['Membership', 'Percentage'],
  <?php
    	 $conn = new mysqli($servername, $server_username, $server_password, $dbName);
    	 $string;
    	 if(!mysqli_connect_errno())
    	{
      		$query = "SELECT membership, count(*) as countmember FROM user GROUP BY membership;";
      	  $result = mysqli_query($conn,$query);
          if ($result){ 
          	  While ($row = mysqli_fetch_array($result)){
                  echo "['".$row['membership']."',".$row['countmember']."],";
              }
          }    
         mysqli_close($conn);
       }  
    ?>     
 ]);
 
  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Membership', 'width':800, 'height':500, is3D: true};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

</body>
</html>

   <?php require_once './inc/footer.php';?>