<div class="modal" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-content">
        
        <!-- Modal Close Button -->
        <span class="close-btn" id="closeModalBtn">&times;</span>

        <!-- Modal Title -->
        <h1 id="modalTitle">Create a Post</h1>

        <!-- Form -->
        <form method="POST" action="scripts/php/submit-post.php">
            <!-- Title Input -->
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>

            <!-- Content Input -->
            <label for="content">Post Content</label>
            <textarea id="content" name="content" required></textarea>

            <!-- Submit Button -->
            <button type="submit" name="post-create">Post!</button>
        </form>

    </div>
</div>
