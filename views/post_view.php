
<div class="container">
    <!-- Your code here -->
    <button id="addPost" onclick="onAddPost()">
        <img src="../images/user.jpg" alt="" class="user-pitcher mgl">
        <p>Add a post</p>
        <p></p>
    </button>
    <div id="card-post" style="display: none">
        <form action="../controllers/create_post_controller.php" method="post" class="create-post">
            <h2>Create new post</h2>
            <section class="user-info">
                <label><img src="../images/user.jpg" alt="" class="user-pitcher"></label>
                <input name="content"  id="description" type="text" placeholder="What's you mind ?">
            </section>
            <div class="image-file">
                <label for="image"><i class="fa fa-picture-o" style="font-size:48px;color:#1ED001"></i></label>
                <input type="file" name="image" style="display:none" id="image">
            </div>
            <menu>
                <button onclick="onCancel()" >Cancel</button>
                <button type="submit">Post</button>
            </menu>
        </form>
    </div>
</div>
<script>
    const dom_card_post = document.getElementById("card-post");

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
</script>
