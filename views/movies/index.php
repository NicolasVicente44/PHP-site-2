<div class="container">
    <h1>List Movies</h1>

    <a href="<?= ROOT_PATH ?>/movies/new" class="btn btn-primary my-3">New movie...</a>

    <?php if (isset($movies) && count($movies) > 0): ?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Length</th>
                <th>Director</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($movies as $movie): ?>
                <tr>
                    <td><?= $movie["title"] ?></td>
                    <td><?= $movie["description"] ?></td>
                    <td><?= $movie["length_in_minutes"] ?></td>
                    <td><?= $movie["director"] ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?= ROOT_PATH ?>/movies/edit/<?= $movie["id"] ?>">edit</a>
                        <a class="btn btn-danger" href="<?= ROOT_PATH ?>/movies/delete/<?= $movie["id"] ?>" onclick="return confirm('Are you sure you want to delete this movie?')">delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?php endif ?>
</div>