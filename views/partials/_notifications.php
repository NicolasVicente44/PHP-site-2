<!-- Simple notification check for errors -->
<?php if (isset($errors)) : ?>
    <div class="alert alert-danger">
        <?php
        if (is_string($errors)) {
            echo "<p>$errors</p>";
        } else {
            foreach ($errors as $error) echo "<p>$error</p>";
        }
        ?>
    </div>
<?php endif ?>

<!-- Simple notification check for successes -->
<?php if (isset($success)) : ?>
    <div class="alert alert-success">
        <?php
        if (is_string($success)) {
            echo "<p>$success</p>";
        } else {
            foreach ($success as $s) echo "<p>$s</p>";
        }
        ?>
    </div>
<?php endif ?>