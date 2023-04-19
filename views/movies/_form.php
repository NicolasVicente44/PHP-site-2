<?php
    // Convert movie object into form_fields associative array ONLY if form_fields are not set
    $form_fields = $form_fields ?? [];
    if (count($form_fields) === 0 && isset($movie)) $form_fields = (array) $movie;

    $directors = $directors ?? [];
?>

<form action="<?= ROOT_PATH ?>/movies/<?= $action ?>" method="post">
    <?php if ($action === "update"): ?>
        <input type="hidden" name="id" value="<?= $form_fields["id"] ?>">
    <?php endif ?>

    <div class="form-group my-3">
        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" value="<?= $form_fields["title"] ?? "" ?>">
    </div>

    <div class="form-group my-3">
        <label for="description">Description</label>
        <textarea class="form-control" type="text" name="description"><?= $form_fields["description"] ?? "" ?></textarea>
    </div>

    <div class="form-group my-3">
        <label for="length_in_minutes">Length</label>
        <input class="form-control" type="number" name="length_in_minutes" min="0" max="2000" step="1" value="<?= $form_fields["length_in_minutes"] ?? "" ?>">
    </div>
    
    <div class="form-group my-3">
    <label for="director">Director</label>
    <select name="director_id" class="form-select">
        <option selected>Select a director</option>
        <?php foreach ($directors as $director): ?>
            <option value="<?= $director["id"] ?>" <?= isset($form_fields["director_id"]) && $form_fields["director_id"] == $director["id"] ? "selected" : "" ?>><?= $director["first_name"] ?> <?= $director["last_name"] ?></option>
        <?php endforeach ?>
    </select>
</div>


    <div>
        <button class="btn btn-primary">Submit</button>
    </div>
</form>