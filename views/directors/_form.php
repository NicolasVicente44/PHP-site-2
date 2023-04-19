<?php
    // Convert director object into form_fields associative array ONLY if form_fields are not set
    $form_fields = $form_fields ?? [];
    if (count($form_fields) === 0 && isset($director)) $form_fields = (array) $director;
?>

<form action="<?= ROOT_PATH ?>/directors/<?= $action ?>" method="post">
    <?php if ($action === "update"): ?>
        <input type="hidden" name="id" value="<?= $form_fields["id"] ?>">
    <?php endif ?>

    <div class="form-group my-3">
        <label for="first_name">First Name</label>
        <input class="form-control" type="text" name="first_name" value="<?= $form_fields["first_name"] ?? "" ?>">
    </div>

    <div class="form-group my-3">
        <label for="last_name">Last Name</label>
        <input class="form-control" type="text" name="last_name" value="<?= $form_fields["last_name"] ?? "" ?>">
    </div>

    <div class="form-group my-3">
        <label for="email">Email</label>
        <input class="form-control" type="text" name="email" value="<?= $form_fields["email"] ?? "" ?>">
    </div>

    <div class="form-group my-3">
        <label for="short_bio">Short Bio</label>
        <textarea class="form-control" type="text" name="short_bio"><?= $form_fields["short_bio"] ?? "" ?></textarea>
    </div>

    <div>
        <button class="btn btn-primary">Submit</button>
    </div>
</form>