<div class="container">   
    <form action="../controllers/create_post_controller.php" method="post">
        <div class="card">
            <div class="card-header">
                <h2>Create post</h2>
            </div>
            <div class="card-body">
                <div class="user-infor">
                    <div class="user-picture"><img src="../images/avata-profile-woman.png" alt="" class="user-picture"></div>
                    <input type="text" name="content" id="" placeholder="What's on your mid,Vichet?" class="input-caption">
                </div>
                <div class="image-file"><input type="file" name="image" id=""></div>
                
            </div>
            <div class="card-footer">
                <button id="cancel">CANCEL</button>
                <button type="submit">POST</button>
            </div>
        </div>
    </form>
</div>