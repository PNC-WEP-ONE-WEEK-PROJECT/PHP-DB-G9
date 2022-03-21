<?php require_once('../templates/header.php')?>
<div id="card-post" style="display: block">
        <form action="../controllers/create_post_controller.php" method="post" class="create-post" enctype="multipart/form-data">
            <h2>Create new post</h2>
            <section class="user-info">
                <label><img src="../images/user.jpg" alt="" class="user-pitcher"></label>
                <input name="content"  id="description" type="text" placeholder="What's you mind ?">
            </section>
                <img src="" id="img-post" class="image-file">
                <script>
                    var loadFile = function(event) {
                        var image = document.getElementById('img-post');
                        image.src = URL.createObjectURL(event.target.files[0]);
                    };
                </script>
            <div class="chose">
                <input type="file" name="file_image" style="display:none" id="image" onchange="loadFile(event)">
                <label for="image"><i class="fa fa-picture-o" style="font-size:30px;color:#1ED001"></i></label>
                <input type="hidden" name="date" value="<?php date_default_timezone_set("Asia/Phnom_Penh"); echo date("D  "). date(" M  ").date(" Y,").date(" h: i A");?>">
            </div>
            <menu>
                <a href="post_view.p"><button type="button">Cancel</button></a>
                <button type="submit" name="submit">Post</button>
            </menu>
        </form>
</div>