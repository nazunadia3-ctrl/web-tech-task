<?php
// Step 1: Connect WITHOUT database
$conn = mysqli_connect("localhost", "root", "", "", 3306);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected<br>";

// Step 2: Create database
$sql = "CREATE DATABASE IF NOT EXISTS myDatabase";
mysqli_query($conn, $sql);

// Step 3: Select database
mysqli_select_db($conn, 'myDatabase');

// Step 4: Create table
$sql = "CREATE TABLE IF NOT EXISTS profile (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    myname VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

mysqli_query($conn, $sql);

// Step 5: Insert data
if (isset($_POST["mysubmit"])) {
    $name = mysqli_real_escape_string($conn, $_POST["myjname"]);

    $sql = "INSERT INTO profile (myname) VALUES ('$name')";
    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
</head>
<body>

<form method="post">
    <input type="text" name="myjname" required>
    <button name="mysubmit">Save</button>
</form>

<?php
// DELETE
if (isset($_POST['delete'])) {
    $id = (int)$_POST['id'];
    mysqli_query($conn, "DELETE FROM profile WHERE id=$id");
}

// UPDATE
if (isset($_POST['update'])) {
    $id = (int)$_POST['id'];
    $new_name = mysqli_real_escape_string($conn, $_POST['new_name']);
    mysqli_query($conn, "UPDATE profile SET myname='$new_name' WHERE id=$id");
}

// SELECT
$result = mysqli_query($conn, "SELECT * FROM profile");

while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <p><?= $row['myname'] ?></p>

    <form method="post" style="display:inline;">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <button name="delete">Delete</button>
    </form>

    <form method="post" style="display:inline;">
        <input type="text" name="new_name">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <button name="update">Update</button>
    </form>
    <br><br>
    <?php
}
?>

</body>
</html>