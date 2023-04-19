<?php

class DirectorModel {

    private static $_table = "directors";

    public static function findAll() {

        $table = self::$_table;

        $sql = "SELECT * FROM {$table}";

        $conn = get_connection();
        $directors = $conn->query($sql)->fetchAll();
        $conn = null;

        return $directors;
    }

    public static function find($id) {

        $table = self::$_table;

        $sql = "SELECT * FROM {$table} WHERE id = :id";

        $conn = get_connection();

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $director = $stmt->fetch(PDO::FETCH_OBJ);

        $conn = null;

        return $director;
    }

    public static function create($package) {

        $table = self::$_table;

        $sql = "INSERT INTO {$table} (
            first_name,
            last_name,
            short_bio,
            email
        ) VALUES (
            :first_name,
            :last_name,
            :short_bio,
            :email
        )";

        $conn = get_connection();

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":first_name", $package["first_name"], PDO::PARAM_STR);
        $stmt->bindParam(":last_name", $package["last_name"], PDO::PARAM_STR);
        $stmt->bindParam(":short_bio", $package["short_bio"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $package["email"], PDO::PARAM_STR);
        $stmt->execute();

        $conn = null;
    }

    public static function update($package) {

        $table = self::$_table;

        $sql = "UPDATE {$table} SET first_name = :first_name, last_name = :last_name, short_bio = :short_bio, email = :email WHERE id = :id";

        $conn = get_connection();

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $package["id"], PDO::PARAM_INT);
        $stmt->bindParam(":first_name", $package["first_name"], PDO::PARAM_STR);
        $stmt->bindParam(":last_name", $package["last_name"], PDO::PARAM_STR);
        $stmt->bindParam(":short_bio", $package["short_bio"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $package["email"], PDO::PARAM_STR);
        $stmt->execute();

        $conn = null;
    }

    public static function delete($id) {

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
