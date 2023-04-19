<?php

require_once("./models/MovieModel.php");
require_once("./models/DirectorModel.php");

function index() {
    $movies = MovieModel::findAll();

    render("movies/index", [
        "title" => "List of Movies",
        "movies" => $movies
    ]);
}

function _new() {
    $directors = DirectorModel::findAll();

    render("movies/new", [
        "title" => "New Movie",
        "action" => "create",
        "directors" => $directors
    ]);
}

function edit($request) {
    $directors = DirectorModel::findAll();
    $movie = MovieModel::find($request["params"]["id"]);

    render("movies/edit", [
        "title" => "Edit Movie",
        "movie" => $movie,
        "action" => "update",
        "directors" => $directors
    ]);
}

function create() {
    var_dump($_POST);

    validate($_POST, "movies/new");

    MovieModel::create($_POST);

    redirect("movies", ["success" => "Movie was created successfully"]);
}

function update() {
    if (!isset($_POST["id"])) {
        return redirect("movies", ["errors" => "Missing required ID parameter"]);
    }

    validate($_POST, "movies/edit/{$_POST["id"]}");

    MovieModel::update($_POST);

    redirect("movies", ["success" => "Movie was updated successfully"]);
}

function delete($request) {
    if (!isset($request["params"]["id"])) {
        return redirect("movies", ["errors" => "Missing required ID parameter"]);
    }

    MovieModel::delete($request["params"]["id"]);

    redirect("movies", ["success" => "Movie was deleted successfully"]);
}

function validate($package, $error_redirect_path) {
    $fields = ["title", "description", "length_in_minutes", "director_id"];
    $errors = [];

    foreach ($fields as $field) {
        if (empty($package[$field])) {
            $humanize = ucwords(str_replace("_", " ", $field));
            $errors[] = "{$humanize} cannot be empty";
        }
    }

    if (count($errors)) {
        return redirect($error_redirect_path, [
            "form_fields" => $package,
            "errors" => $errors
        ]);
    }
}
