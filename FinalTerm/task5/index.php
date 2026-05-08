<!DOCTYPE html>
<html>
<head>
    <title>Library Management System</title>
</head>
<body>

<h2>University Library Management System</h2>

<h3>Add or Update Book</h3>

<input type="hidden" id="book_id">

<label>Book Title:</label>
<input type="text" id="title">
<br><br>

<label>Author Name:</label>
<input type="text" id="author">
<br><br>

<label>Category:</label>
<input type="text" id="category">
<br><br>

<label>Availability Status:</label>
<select id="status">
    <option value="Available">Available</option>
    <option value="Unavailable">Unavailable</option>
</select>
<br><br>

<button onclick="addBook()" id="addBtn">Add Book</button>
<button onclick="updateBook()" id="updateBtn" style="display:none;">Update Book</button>

<hr>

<h3>All Books</h3>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Book Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody id="bookTable">
    </tbody>
</table>

<script src="ajax.js"></script>

</body>
</html>