<?php 
    
require_once 'initialize.php';

$page = 'error';
require_once './inc/header.php';
?>

<main>
    <!-- Error page -->
    <section class="first-section">    
        <div class="container section-box">
            <div class="section-title--wrapper">
                <h1 class="section-title"><?php echo 'Error '.http_response_code(); ?></h1>
                <h3>
                    <?php switch (http_response_code()){
                        case 403:
                            echo 'Forbidden';
                            break;
                        case 404:
                            echo 'Not Found';
                            break;
                        default:
                            echo 'Something went wrong';
                    }?>
                </h3>
            </div>   
            <div class="container--content">
                <a href="./index.php" ><button class="btn btn--default">Take Me Back Home</button></a>
            </div>
        </div>
    </section>
</main>

<?php 
require_once './inc/footer.php';
?>
