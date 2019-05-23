<!-- navigation --> 
<?php 
    $links = getLinks();
?>       
<nav class="nav__sticky">
    <input type="checkbox" class="nav--checkbox" id="nav-toggle">
    <label for="nav-toggle" class="nav--button">
        <span class="nav--icon">&nbsp;</span>
    </label>
    <div class="nav">
        <a href="<?php echo $links["home"]; ?>" class="logo"><img src="./imgs/logo-cube-orange.png" alt="LOGO"></a>
        <ul id="nav-list">
            <li class="<?php echo ($page == 'home') ? 'nav-current' : ''; ?>">
                <a href="<?php echo $links["home"]; ?>">HOME</a>
            </li>
            <li class="nav-dropdown">INFORMATION
                <ul class="nav-dropdown--contents">
                    <li class="<?php echo ($page == 'aboutus') ? 'nav-current' : ''; ?>">
                        <a href="<?php echo $links["aboutus"]; ?>">About Us</a>
                    </li>
                    <li class="<?php echo ($page == 'statistics') ? 'nav-current' : ''; ?>">
                        <a href="<?php echo $links["statistics"]; ?>">Statistics</a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo ($page == 'gamestore') ? 'nav-current' : ''; ?>">
                <a href="<?php echo $links["latestgames"]; ?>">GAME STORE</a>
            </li>
            <?php if(isset($_SESSION["username"])) : ?>                
                <li class="<?php echo ($page == 'mydashboard') ? 'nav-current' : ''; ?>">
                    <a href="<?php echo $links["mygames"]; ?>">MY Dashboard</a>
                </li>                
                <li class="">
                    <a href="#" id="signout">Sign out</a>
                </li>

                <?php else : ?>
                <li class="<?php echo ($page == 'register') ? 'nav-current' : ''; ?>">
                    <a href="<?php echo $links["register"]; ?>">REGISTER</a>
                </li>
                <li class="<?php echo ($page == 'signin') ? 'nav-current' : ''; ?>">
                    <a href="<?php echo $links["signin"]; ?>">SIGN IN</a>
                </li>
            <?php endif; ?>
            <li class="<?php echo ($page == 'membership') ? 'nav-current' : ''; ?>">
                <a href="<?php echo $links["premiummembership"]; ?>">START TRIAL</a>
            </li>
        </ul>
    </div>
</nav>