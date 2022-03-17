<div class="container">
    <!-- Your code here -->
    <div class="card">
        <div class="card-header">
            <div class="user-info">
                <img src="../images/user.jpg" alt=""  class="user-pitcher mgl" id="user-picture">
                <div class="u-in">
                    <p class="mgl" id="name">User Name</p>
                    <p class="time" id="time">4 mns</p>
                </div>
            </div>
            <div class="dropdown">
                <div class="dropbtn"><img src="../images/option.png" alt="" width="30px" height="30px" class="option"></div>
                <div class="dropdown-content">
                    <a href="#">edit</a>
                    <a href="#">delete</a>
                </div>
            </div> 
        </div>
        <p class="cation mgl">Don't look at my eyes, because you can feel not bad</p>
        <div class="card-body">
            <img src="../images/user.jpg" alt="" width="100%">
        </div>
        <div class="card-footer">
            <div class="number">
                <div class="number-like">2.5K likes</div>
                <div class="number-comment">1.5K comments</div>
            </div>
            <div class="reaction">
                <div class="like"><i class="fa fa-thumbs-up" style="font-size:36px"></i> Like</div>
                <label class="comment" for="comments"><i class='far fa-comment-alt' style='font-size:24px'></i> Comment</label>
            </div>
            <div class="comment-text">
                <input type="text-area" placeholder="Write a comments..." id="comments">
            </div>
        </div>
    </div>
</div>
<script>
    const dom_questions_dialog = document.getElementById("questions-dialog");

    // HIDE / SHOW ---------------------------------------------------------
    function hide(element) {
        element.style.display = "none";
    }
    
    function show(element) {
        element.style.display = "block";
    }

    function onAddPost(){
        show(dom_questions_dialog);
    }
    function onCancel(){
        hide(dom_questions_dialog);
    }
</script>