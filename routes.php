<?php

    /**
     * Routes are responsible for matching a requested path
     * with a controller and an action. The controller represents
     * a collection of functions you want associated, usually, with
     * a resource. The action is the specific function you want to call.
     */

    $routes = [
        "get" => [
            [
                "pattern" => "/",
                "controller" => "PagesController",
                "action" => "index"
            ],
            [
                "pattern" => "/movies",
                "controller" => "MoviesController",
                "action" => "index"
            ],
            [
                "pattern" => "/movies/new",
                "controller" => "MoviesController",
                "action" => "_new"
            ],
            [
                "pattern" => "/movies/:id",
                "controller" => "MoviesController",
                "action" => "show"
            ],
            [
                "pattern" => "/movies/edit/:id",
                "controller" => "MoviesController",
                "action" => "edit"
            ],
            [
                "pattern" => "/movies/delete/:id",
                "controller" => "MoviesController",
                "action" => "delete"
            ],
            [
                "pattern" => "/directors",
                "controller" => "DirectorsController",
                "action" => "index"
            ],
            [
                "pattern" => "/directors/new",
                "controller" => "DirectorsController",
                "action" => "_new"
            ],
            [
                "pattern" => "/directors/edit/:id",
                "controller" => "DirectorsController",
                "action" => "edit"
            ],
            [
                "pattern" => "/directors/delete/:id",
                "controller" => "DirectorsController",
                "action" => "delete"
            ],
        ],
        "post" => [
            [
                "pattern" => "/movies/create",
                "controller" => "MoviesController",
                "action" => "create"
            ],
            [
                "pattern" => "/movies/update",
                "controller" => "MoviesController",
                "action" => "update"
            ],
            [
                "pattern" => "/directors/create",
                "controller" => "DirectorsController",
                "action" => "create"
            ],
            [
                "pattern" => "/directors/update",
                "controller" => "DirectorsController",
                "action" => "update"
            ],
        ]
    ];

?>