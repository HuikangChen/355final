<?php 
require_once 'initialize.php';

$page = 'signin';

if(isLoggedIn()){
    header("Location: https://gamecompany.azurewebsites.net/mygames.php");
}

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
        <!-- sign in -->
        <section class="first-section">
            <div class="container section-box">
                <p class="attention"><?php echo $data["message"]; ?></p>
                <h2 class="section-title"><?php echo $data["title"]; ?></h2>
                <!-- Trang lock <form action="<?php echo $links["signin"]; ?>" method="post"> -->
                <form action="<?php echo $links["signincheck"]; ?>" method="post"> 
                    <div class="input-container">
                        <p class="error"><?php echo $data["errors"]["connection"]; ?></p>
                        <label for="user">Username</label>
                        <input type="text" name="user" placeholder="username" class="input-field__white" required>
                        <p class="error"><?php echo $data["errors"]["user"]; ?></p>
                    </div>
                    <div class="input-container">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="input-field__white" required>
                        <p class="error"><?php echo $data["errors"]["password"]; ?></p>
                    </div>
                    <input class="btn btn--submit" type="submit"  value="Sign In">
                </form>
                <div class="signin-register">
                    Don't have an account? <a href="<?php echo $links["register"];?>">Register</a>
                </div>
            </div>
        </section>
    </main>

<?php require_once './inc/footer.php';?>
