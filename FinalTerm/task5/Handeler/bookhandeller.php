<?php

header("Content-Type: application/json");

include "../controller/BookController.php";

if (isset($_POST["action"])) {
    $action = $_POST["action"];

    if ($action == "add") {
        addBookController();
    } elseif ($action == "fetch") {
        fetchBooksController();
    } elseif ($action == "update") {
        updateBookController();
    } elseif ($action == "delete") {
        deleteBookController();
    } else {
        echo json_encode(["message" => "Invalid action"]);
    }
} else {
    echo json_encode(["message" => "No action found"]);
}

?>