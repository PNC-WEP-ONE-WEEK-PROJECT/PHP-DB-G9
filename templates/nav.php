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
                <a href="../index.php?page=home" <?php if($page == "home") { ?> class="active" <?php } ?>><i class="material-icons" style="font-size:24px">home</i></a>
                <a href="../index.php?page=contact" <?php if($page == "contact") { ?> class="active" <?php } ?>><i class="fa fa-users" style="font-size:18px"></i></a>
            </div>
            <div class="nav-right">
                <a href=""><img src="../images/user.jpg" alt="" class="user-pitcher"></a>
                <a href=""><div class="user-name mgl">Sophim Phath</div></a>
                <a href=""><i class="material-icons">exit_to_app</i></a>
            </div>
        </div>
    </div>