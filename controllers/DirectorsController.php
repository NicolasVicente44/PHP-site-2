<?php

require_once("./models/DirectorModel.php");

function index() {
    $directors = DirectorModel::findAll();

    render("directors/index", [
        "title" => "List of Directors",
        "directors" => $directors
    ]);
}

function _new() {
    render("directors/new", [
        "title" => "New Director",
        "action" => "create"
    ]);
}

function edit($request) {
    $director = DirectorModel::find($request["params"]["id"]);

    render("directors/edit", [
        "title" => "Edit Director",
        "director" => $director,
        "action" => "update"
    ]);
}

function create() {

    validate($_POST, "directors/new");

    DirectorModel::create($_POST);

    redirect("directors", ["success" => "Director was created successfully"]);
}

function update() {

    if (!isset($_POST["id"])) {
        return redirect("directors", ["errors" => "Missing required ID parameter"]);
    }

    validate($_POST, "directors/edit/{$_POST["id"]}");

    DirectorModel::update($_POST);

    redirect("directors", ["success" => "Director was updated successfully"]);
}

function delete($request) {

    if (!isset($request["params"]["id"])) {
        return redirect("directors", ["errors" => "Missing required ID parameter"]);
    }

    DirectorModel::delete($request["params"]["id"]);

    redirect("directors", ["success" => "Director was deleted successfully"]);
}

function validate($package, $error_redirect_path) {
    $fields = ["first_name", "last_name", "email"];
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

?>
