<h1>Reviews</h1>

<?php showMessage() ?>
<form action="index.php" method="POST">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="review">Review</label>
        <textarea name="review" id="review" class="form-control"></textarea>
    </div>
    <input type="hidden" name="action" value="saveReview">
    <button class="btn btn-primary">Send Review</button>
</form>
<?php showReviews() ?>