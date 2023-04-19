<?php

class MovieModel {

    private static $_table = "movies";

    public static function findAll () {

        $table = self::$_table;

        $sql = "SELECT movies.id, movies.title, CONCAT(directors.first_name, ' ', directors.last_name) AS director, movies.description, movies.length_in_minutes FROM {$table} JOIN directors ON movies.director_id = directors.id";


        $conn = get_connection();
        $movies = $conn->query($sql)->fetchAll();
        $conn = null;

        return $movies;

    }

    public static function find ($id) {

        $table = self::$_table;

        $sql = "SELECT
            movies.id,
            movies.title,
            movies.description,
            movies.length_in_minutes,
            directors.first_name,
            directors.last_name as director,
            directors.id as director_id
            FROM {$table}
            JOIN directors ON movies.director_id = directors.id
            WHERE movies.id = :id";

        $conn = get_connection();

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $movie = $stmt->fetch(PDO::FETCH_OBJ);

        $conn = null;

        var_dump($movie);

        return $movie;
    }

    public static function create ($package) {

        $table = self::$_table;

        $sql = "INSERT INTO {$table} (
            title,
            description,
            length_in_minutes,
            director_id
        ) VALUES (
            :title,
            :description,
            :length_in_minutes,
            :director_id
        )";

        $conn = get_connection();

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":title", $package["title"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $package["description"], PDO::PARAM_STR);
        $stmt->bindParam(":length_in_minutes", $package["length_in_minutes"], PDO::PARAM_INT);
        $stmt->bindParam(":director_id", $package["director_id"], PDO::PARAM_INT);
        $stmt->execute();

        $conn = null;
    }

    public static function update ($package) {

        $table = self::$_table;

        $sql = "UPDATE {$table} SET title = :title, description = :description, length_in_minutes = :length_in_minutes, director_id = :director_id WHERE id = :id";


        
        $conn = get_connection();

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $package["id"], PDO::PARAM_INT);
        $stmt->bindParam(":title", $package["title"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $package["description"], PDO::PARAM_STR);
        $stmt->bindParam(":length_in_minutes", $package["length_in_minutes"], PDO::PARAM_INT);
        $stmt->bindParam(":director_id", $package["director_id"], PDO::PARAM_INT);
        $stmt->execute();

        $conn = null;
    }

    public static function delete ($id) {

        $table = self::$_table;

        $sql = "DELETE FROM {$table} WHERE id = :id";

        $conn = get_connection();

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $conn = null;
    }
}


?>

