<?php

    function index () {
        render("pages/index", [
            "title" => "Direct Me to the Stars",
            "page_stylesheet" => "home"
        ]);
    }

?>