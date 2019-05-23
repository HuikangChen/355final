<?php 
require_once 'initialize.php';
$page = 'mydashboard';
$subpage = 'playarea';


if(!isLoggedIn()){
    header("Location: https://gamecompany.azurewebsites.net/signin.php");
}

require_once '/inc/header.php';
?>
<main>
     <?php echo "<head>
    <meta charset='utf-8'>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <title>Unity WebGL Player | AngryCubes2</title>
    <link rel='shortcut icon' href='Unity/angrycube2/TemplateData/favicon.ico'>
    <link rel='stylesheet' href='Unity/angrycube2/TemplateData/style.css'>
    <script src='Unity/angrycube2/TemplateData/UnityProgress.js'></script>
    <script src='Unity/angrycube2/Build/UnityLoader.js'></script>
    <script>
      var gameInstance = UnityLoader.instantiate('gameContainer', 'Unity/angrycube2/Build/angrycube2.json', {onProgress: UnityProgress});
    </script>
    </head>"; ?>
    <!--dashboard-->
    <section class='dashboard'>
        <div class='container'>

            <?php require_once '/inc/leftnav.php';?>

            <!-- dynamic display area -->
            <div class='display'>
                <div class='container-box'>
                    <div class='row'>
                        
                    <?php echo "
                                <div id='gameContainer' style='width: 432px; height: 768px'></div>
                                        "; ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once '/inc/footer.php';?>