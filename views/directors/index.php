<div class="container">
    <h1>List Directors</h1>

    <a href="<?= ROOT_PATH ?>/directors/new" class="btn btn-primary my-3">New director...</a>

    <?php if (isset($directors) && count($directors) > 0): ?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Short Bio</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($directors as $director): ?>
                <tr>
                    <td><?= $director["first_name"]?></td>
                    <td><?= $director["last_name"]?></td>
                    <td><?= $director["short_bio"]?></td>
                    <td><?= $director["email"]?></td>
                    <td>
                        <a class="btn btn-warning" href="<?= ROOT_PATH ?>/directors/edit/<?= $director["id"] ?>">edit</a>
                        <a class="btn btn-danger" href="<?= ROOT_PATH ?>/directors/delete/<?= $director["id"] ?>" onclick="return confirm('Are you sure you want to delete this director?')">delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?php endif ?>
</div>