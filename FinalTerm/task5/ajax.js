window.onload = function() {
    fetchBooks();
};

function addBook() {
    var title = document.getElementById("title").value;
    var author = document.getElementById("author").value;
    var category = document.getElementById("category").value;
    var status = document.getElementById("status").value;

    if (title == "" || author == "" || category == "") {
        alert("Please fill all fields");
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "handler/bookHandler.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if (xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            alert(response.message);
            clearForm();
            fetchBooks();
        }
    };

    var data = "action=add" +
        "&title=" + encodeURIComponent(title) +
        "&author=" + encodeURIComponent(author) +
        "&category=" + encodeURIComponent(category) +
        "&status=" + encodeURIComponent(status);

    xhr.send(data);
}

function fetchBooks() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "handler/bookHandler.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if (xhr.status == 200) {
            var books = JSON.parse(xhr.responseText);
            var output = "";

            for (var i = 0; i < books.length; i++) {
                output += "<tr>";
                output += "<td>" + books[i].id + "</td>";
                output += "<td>" + books[i].title + "</td>";
                output += "<td>" + books[i].author + "</td>";
                output += "<td>" + books[i].category + "</td>";
                output += "<td>" + books[i].status + "</td>";
                output += "<td>";
                output += "<button onclick='editBook(" +
                    books[i].id + ", " +
                    JSON.stringify(books[i].title) + ", " +
                    JSON.stringify(books[i].author) + ", " +
                    JSON.stringify(books[i].category) + ", " +
                    JSON.stringify(books[i].status) +
                    ")'>Edit</button> ";
                output += "<button onclick='deleteBook(" + books[i].id + ")'>Delete</button>";
                output += "</td>";
                output += "</tr>";
            }

            document.getElementById("bookTable").innerHTML = output;
        }
    };

    xhr.send("action=fetch");
}

function editBook(id, title, author, category, status) {
    document.getElementById("book_id").value = id;
    document.getElementById("title").value = title;
    document.getElementById("author").value = author;
    document.getElementById("category").value = category;
    document.getElementById("status").value = status;

    document.getElementById("addBtn").style.display = "none";
    document.getElementById("updateBtn").style.display = "inline";
}

function updateBook() {
    var id = document.getElementById("book_id").value;
    var title = document.getElementById("title").value;
    var author = document.getElementById("author").value;
    var category = document.getElementById("category").value;
    var status = document.getElementById("status").value;

    if (title == "" || author == "" || category == "") {
        alert("Please fill all fields");
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "handler/bookHandler.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if (xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            alert(response.message);
            clearForm();
            fetchBooks();

            document.getElementById("addBtn").style.display = "inline";
            document.getElementById("updateBtn").style.display = "none";
        }
    };

    var data = "action=update" +
        "&id=" + encodeURIComponent(id) +
        "&title=" + encodeURIComponent(title) +
        "&author=" + encodeURIComponent(author) +
        "&category=" + encodeURIComponent(category) +
        "&status=" + encodeURIComponent(status);

    xhr.send(data);
}

function deleteBook(id) {
    if (!confirm("Are you sure you want to delete this book?")) {
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "handler/bookHandler.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if (xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            alert(response.message);
            fetchBooks();
        }
    };

    xhr.send("action=delete&id=" + encodeURIComponent(id));
}

function clearForm() {
    document.getElementById("book_id").value = "";
    document.getElementById("title").value = "";
    document.getElementById("author").value = "";
    document.getElementById("category").value = "";
    document.getElementById("status").value = "Available";
}