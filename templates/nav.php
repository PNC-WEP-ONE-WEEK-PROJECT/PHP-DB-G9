
<div class="navbar">
        <div class="nav-container">
            <div class="nav-left">
                <a href="../index.php" class="app-logo"><img src="../images/logo.png" alt="" ></a>
                <div class="search">
                    <div class="search-icon"><i class="fa fa-search" style="font-size:23px"></i></div>
                    <input type="search" placeholder="Search Facebook" id="search">
                </div>
            </div>
            <?php 
            $page = "";
            
            if (isset($_GET['page'])){
                $page = $_GET['page'];
            }
            ?>

            <div class="menu">
                <a href="../views/post_view.php?page=home" class="active" <?php if($page == "home") { ?> <?php echo 'class="active'.'"'; } ?>><i class="material-icons" style="font-size:30px">home</i></a>
                <a href="#" <?php if($page == "contact") { ?> class="active" <?php } ?>><i class="fa fa-users" style="font-size:20px"></i></a>
            </div>
            <div class="nav-right">
                <a href="../views/profile.php"><img src="../images/user.jpg" alt="" class="user-pitcher"></a>
                <a href="../views/profile.php"><div class="user-name mgl"><?php echo $_SESSION['username']?></div></a>
                <a href="../controllers/logout.php"><i class="material-icons">exit_to_app</i></a>
            </div>
        </div>
    </div>