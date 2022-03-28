<?php 
session_start();
require_once('../templates/header.php');
require_once('../templates/nav.php');
?>


    <?php 
        require_once('../models/post.php');
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $post = getPostById($id);
    ?>
    <?php require_once('../templates/header.php')?>
<div id="card-post" style="display: block">
        <form action="../controllers/edit_post_controller.php" method="post" class="create-post" enctype="multipart/form-data">
            <h2>Edit your post</h2>
            <section class="user-info">
                <label><img src="../images/user.jpg" alt="" class="user-pitcher"></label>
                <input name="content"  id="description" type="text" placeholder="What's you mind ?" value="<?= $post['content']?>">
                <input type="hidden" value="<?php echo $post['id']?>" name="id">
            </section>
                <img src="<?php echo '../post_image/'. $post['image']?>" id="img-post" class="image-file">
                <script>
                    var loadFile = function(event) {
                        var image = document.getElementById('img-post');
                        image.src = URL.createObjectURL(event.target.files[0]);
                    };
                </script>
            <div class="chose">
                <input type="file" name="file_image" style="display:none" id="image" onchange="loadFile(event)">
                <input type="hidden" name="file" value="<?=$post['image']?>">
                <label for="image"><i class="fa fa-picture-o" style="font-size:30px;color:#1ED001"></i></label>
                <input type="hidden" name="date" value="<?php date_default_timezone_set("Asia/Phnom_Penh"); echo date("D/ "). date(" M/ ").date(" Y,").date(" h:i: A");?>">
            </div>
            <menu>
                <a href="post_view.php"><button type="button">Cancel</button></a>
                <button type="submit" name="submit">Update</button>
            </menu>
        </form>
</div>


<script>
    let file_image = document.querySelector('.fa-picture-o');
    file_image.addEventListener('click', getImage);

    function getImage(element){
        
    }
</script>

<?php
require_once('../templates/footer.php');