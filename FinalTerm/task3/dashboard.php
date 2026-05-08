<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$lastLogin = "No last login record";

if (isset($_COOKIE["last_login"])) {
    $lastLogin = $_COOKIE["last_login"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Dashboard Page</h2>

<p>Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?>!</p>

<p>Your email: <?php echo htmlspecialchars($_SESSION["user_email"]); ?></p>

<p>Last login time: <?php echo htmlspecialchars($lastLogin); ?></p>

<a href="logout.php">Logout</a>

</body>
</html>