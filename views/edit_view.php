<?php 
require_once('../templates/header.php');
require_once('../templates/nav.php');
?>

<div class="container">
    <?php 
        require_once('../models/post.php');
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $post = getPostById($id);
    ?>
    <div id="card-post" style="display: block">
        <form action="../controllers/edit_post_controller.php" method="post" class="create-post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $post['postID']?>">
            <h2>Create new post</h2>
            <section class="user-info">
                <label><img src="../images/user.jpg" alt="" class="user-pitcher"></label>
                <input name="description"  id="description" type="text" value="<?php echo $post['content'];?>">
            </section>
            <div class="image-file">
                <label for="image"><i class="fa fa-picture-o" style="font-size:48px;color:#1ED001"></i></label>
                <input type="file" name="file_image" style="display:none" id="image">
                <input type="hidden" name="file" value="<?= $post['image']; ?>">
                
            </div>
            <menu>
                <button onclick="onCancel()" >Cancel</button>
                <button type="submit">Update</button>
            </menu>
        </form>
    </div>
</div>





<?php
require_once('../templates/footer.php');