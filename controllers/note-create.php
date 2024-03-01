<?php

$config = require "config.php";
$db = new Database($config["database"]);
$heading = "Create Note";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    if (strlen($_POST["body"]) === 0) {
        $errors["body"] = "A description is required.";
    }

    if (strlen($_POST["body"]) >= 1000) {
        $errors["body"] =
            "The body text can not be more than 1,000 characteres";
    }

    if (empty($errors)) {
        $db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id)", [
            "body" => $_POST["body"],
            "user_id" => 1,
        ]);
    }
}
require "views/note-create.view.php";