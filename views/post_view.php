<?php 
require_once('models/post.php');
?>
<div class="container">
    <!-- Your code here -->
    <button id="addPost" onclick="onAddPost()">
        <img src="../images/user.jpg" alt="" class="user-pitcher mgl">
        <p>Add a post</p>
        <p></p>
    </button>

    <div id="card-post" style="display: none">
        <form action="../controllers/create_post_controller.php" method="post" class="create-post" enctype="multipart/form-data">
            <h2>Create new post</h2>
            <section class="user-info">
                <label><img src="../images/user.jpg" alt="" class="user-pitcher"></label>
                <input name="content"  id="description" type="text" placeholder="What's you mind ?">
            </section>
            <div class="image-file">
                <label for="image"><i class="fa fa-picture-o" style="font-size:48px;color:#1ED001"></i></label>
                <input type="file" name="file_image" style="display:none" id="image">
                <input type="hidden" name="date" value="<?php date_default_timezone_set("Asia/Phnom_Penh"); echo date("l/ "). date(" M/ ").date(" Y,").date(" h:i:s a");?>">
            </div>
            <menu>
                <button onclick="onCancel()" >Cancel</button>
                <button type="submit" name="submit">Post</button>
            </menu>
        </form>
    </div>
    <?php 
    $posts = getPosts();
    foreach($posts as $post):
    

    ?>
    <div class="card">
        <div class="card-header">
            <div class="user-info">
                <img src="../images/user.jpg" alt=""  class="user-pitcher mgl" id="user-picture">
                <div class="u-in mgl">
                    <p class="" id="name">Sophim Phath</p>
                    <p class="time" id="time"><?php echo $post['postDate'];?></p>
                </div>
            </div>
            <div class="dropdown">
                <div class="dropbtn"><img src="../images/option.png" alt="" width="30px" height="30px" class="option"></div>
                <div class="dropdown-content">
                    <a href="../views/edit_view.php?id=<?php echo $post['postID']?>">edit</a>
                    <a href="../controllers/delete_post.php?id=<?php echo $post['postID']?>">delete</a>
                </div>
            </div> 
        </div>
        <p class="cation mgl"><?php echo $post['content'];?></p>
        <div class="card-body">
            <img src="../post_image/<?php echo $post['image']?>" alt="" width="100%">
        </div>
        <div class="card-footer">
            <div class="reaction">
                <div class="like"><i class="fa fa-thumbs-up" style="font-size:24px;"> </i> <span>Like</span></div>
                <label class="comment" for="comments"><i class="fa fa-commenting-o" style="font-size:24px"> </i><span>Comment</span></label>
            </div>
            <div class="comment-text">
                <input type="text-area" placeholder="Write a comments..." id="comments">
            </div>
        </div>
    </div>

    <?php 
    endforeach;
    ?>
</div>

<!-- javascript -->
<script>
    const dom_card_post = document.getElementById("card-post");
    const file = document.querySelector('.fa-picture-o');

    // HIDE / SHOW ---------------------------------------------------------
    function hide(element) {
        element.style.display = "none";
    }
    
    function show(element) {
        element.style.display = "block";
    }

    function onAddPost(){
        show(dom_card_post);
    }
    function onCancel(){
        hide(dom_card_post);
    }

    function getFile(element){
        element.style.backgroundImage = "url('../images/logo.png')";
    }
</script>

