<h1>Contacts</h1>

<?php showMessage() ?>


<form action="index.php?page=<?= $page ?>" method="POST">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" <?= checkInput('email') ? 'is-invalid': '' ?>id="email" name="email">
        <?php if(checkInput('email')): ?>
            <div class="invalid-feedback"><?= checkInput('email')?></div> 
        <?php endif ?>
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="message" class="form-control"></textarea>
    </div>

    <input type="hidden" name="action" value="sendMessage">
    <button class="btn btn-primary">Send</button>
</form>