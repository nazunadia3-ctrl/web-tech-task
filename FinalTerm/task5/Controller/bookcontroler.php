<?php

include "../model/BookModel.php";

function addBookController() {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $category = $_POST["category"];
    $status = $_POST["status"];

    if (insertBook($title, $author, $category, $status)) {
        echo json_encode(["message" => "Book added successfully"]);
    } else {
        echo json_encode(["message" => "Failed to add book"]);
    }
}

function fetchBooksController() {
    $books = getAllBooks();

    echo json_encode($books);
}

function updateBookController() {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $category = $_POST["category"];
    $status = $_POST["status"];

    if (updateBook($id, $title, $author, $category, $status)) {
        echo json_encode(["message" => "Book updated successfully"]);
    } else {
        echo json_encode(["message" => "Failed to update book"]);
    }
}

function deleteBookController() {
    $id = $_POST["id"];

    if (deleteBook($id)) {
        echo json_encode(["message" => "Book deleted successfully"]);
    } else {
        echo json_encode(["message" => "Failed to delete book"]);
    }
}

?>