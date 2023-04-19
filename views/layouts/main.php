<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$auth = isset($_SESSION["user"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="<?= ROOT_PATH ?>/styles/style.css">

    <?php if (isset($page_stylesheet)) : ?>
        <link rel="stylesheet" href="<?= ROOT_PATH ?>/styles/<?= $page_stylesheet ?>.css">
    <?php endif ?>

    <title><?= $title ?></title>
</head>

<body id="<?= $override_id ?? "main" ?>">
    <?php include_once("partials/_notifications.php") ?>

    <!-- Global navigation -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= ROOT_PATH ?>">DMTTS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Directors
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= ROOT_PATH ?>/directors/new">New</a></li>
                            <li><a class="dropdown-item" href="<?= ROOT_PATH ?>/directors">List</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Movies
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= ROOT_PATH ?>/movies/new">New</a></li>
                            <li><a class="dropdown-item" href="<?= ROOT_PATH ?>/movies">List</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- View specific output -->
    <?= $yield ?? null ?>
</body>

</html>