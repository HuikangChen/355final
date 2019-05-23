<?php 
session_start();

require_once 'initialize.php';

$page = 'cpi';

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


require_once './inc/header.php';
?>
    <main>
        <!-- Enter date for report  -->
        
        <section class="first-section">
            <div class="container section-box">
                <p class="attention"><?php echo $data["message"]; ?></p>
                <h2 class="section-title">COST PER INSTALL<?php echo $getgraph; ?> </h2>
                <form action="<?php echo $links["graph4result"]; ?>" method="post"> 
                    <div class="input-container">
                        <p class="error"><?php echo $data["errors"]["connection"]; ?></p>
                        <label for="fdate">From</label>
                        <input type="date" name="fromdate" placeholder="fromdate" class="input-field__white" required>

                    </div>
                    <div class="input-container">
                        <label for="tdate">To</label>
                        <input type="date" name="todate" class="input-field__white" required>
                       
                    </div>
                    <input class="btn btn--submit" type="submit"  value="View Graph">
                </form>
              
            </div>
        </section>
    </main>

<?php require_once './inc/footer.php';?>
