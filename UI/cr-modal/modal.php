<div class="modal" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-content">
        
        <span class="close-btn" id="closeModalBtn">&times;</span>

        <h1 id="modalTitle">Create a Post</h1>

        <form method="POST" action="scripts/php/submit-post.php">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>

            <label for="content">Post Content</label>
            <textarea id="content" name="content" required style="resize: none;"></textarea>

            <button type="submit" name="post-create">Post!</button>
        </form>

    </div>
</div>
