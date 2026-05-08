<?php

$conn = mysqli_connect("localhost", "root", "", "", 3306);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS library_db");

mysqli_select_db($conn, "library_db");

$tableSql = "CREATE TABLE IF NOT EXISTS books (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    author VARCHAR(100) NOT NULL,
    category VARCHAR(50) NOT NULL,
    status VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

mysqli_query($conn, $tableSql);

function insertBook($title, $author, $category, $status) {
    global $conn;

    $title = mysqli_real_escape_string($conn, $title);
    $author = mysqli_real_escape_string($conn, $author);
    $category = mysqli_real_escape_string($conn, $category);
    $status = mysqli_real_escape_string($conn, $status);

    $sql = "INSERT INTO books (title, author, category, status)
            VALUES ('$title', '$author', '$category', '$status')";

    return mysqli_query($conn, $sql);
}

function getAllBooks() {
    global $conn;

    $sql = "SELECT * FROM books ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    $books = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $books[] = $row;
    }

    return $books;
}

function updateBook($id, $title, $author, $category, $status) {
    global $conn;

    $id = (int)$id;
    $title = mysqli_real_escape_string($conn, $title);
    $author = mysqli_real_escape_string($conn, $author);
    $category = mysqli_real_escape_string($conn, $category);
    $status = mysqli_real_escape_string($conn, $status);

    $sql = "UPDATE books 
            SET title='$title', author='$author', category='$category', status='$status'
            WHERE id=$id";

    return mysqli_query($conn, $sql);
}

function deleteBook($id) {
    global $conn;

    $id = (int)$id;

    $sql = "DELETE FROM books WHERE id=$id";

    return mysqli_query($conn, $sql);
}

?>