<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Dashboard Page</h2>

<p>Welcome, <?php echo $_SESSION["username"]; ?>!</p>

<p>You are successfully logged in.</p>

<a href="logout.php">Logout</a>

</body>
</html>