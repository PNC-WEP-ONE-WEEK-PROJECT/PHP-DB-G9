<?php 
require_once("../templates/header.php");
require_once('../templates/nav.php');
require_once('../models/post.php');
require_once('../models/comment.php');
?>
<div class="container">
    <!-- Your code here -->
    <a href="../views/create_post.php" style="text-decoration: none;"><button id="addPost">
        <img src="../images/user.jpg" alt="" class="user-pitcher mgl">
        <p>Add a post</p>
        <p></p>
    </button></a>

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
                    <a href="../views/edit_view.php?id=<?php echo $post['id']?>">edit</a>
                    <a href="../controllers/delete_post.php?id=<?php echo $post['id']?>">delete</a>
                </div>
            </div> 
        </div>
        <p class="cation mgl"><?php echo $post['content'];?></p>
        <div class="card-body">
            <img src="../post_image/<?php echo $post['image']?>" alt="" width="100%">
        </div>
        <?php 
            $post_id = $post['id'];
            $numbers = countComment($post_id);
            foreach($numbers as $num_comt):
        ?>
        <div class="card-footer">
            <div class="number">
                <p><?php echo 'likes'?></p>
                <p><?php if ($num_comt['number'] !=0){echo $num_comt['number'];}?> comments</p> 
            </div>
            <?php endforeach?>
            <div class="reaction">
                <div class="like"> <span></span> <i class="fa fa-thumbs-up" style="font-size:24px;"> </i> <span>Like</span></div>
                <label class="comment" for="<?=$post['id']?>"> <i class="fa fa-commenting-o" style="font-size:24px"> </i><span>Comment</span></label>
            </div>
            <?php 

                $post_id = $post['id'];
                $comments = getCommentByPost($post_id);
                foreach($comments as $comment):
                    ?>
                <div class="user-comment">
                    <img src="../images/nga.jpg" alt="loading" class="user-pitcher mgl">
                    <span class="mgl"><?= $comment['comment'];?> </span>
                </div>
            <?php endforeach?>
            <form action="../controllers/create_comment_controller.php" method="post" class="comment-text">
                <input type="text-area" placeholder="Write a comments..." id="<?=$post['id']?>" name="comments" class="comments"> 
                <button type="submit"  class="btn_comment"><i class="fa fa-paper-plane-o" style="font-size:24px; "></i></button>
                <input type="hidden" name="postID" value="<?php echo $post['id']?>">
            </form>
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
<?php require_once("../templates/footer.php");?>
