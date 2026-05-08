<?php
session_start();
include "db.php";

$message = "";

$savedEmail = "";

if (isset($_COOKIE["user_email"])) {
    $savedEmail = $_COOKIE["user_email"];
}

if (isset($_POST["login"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_name"] = $row["name"];
            $_SESSION["user_email"] = $row["email"];

            setcookie("user_email", $row["email"], time() + (86400 * 7));
            setcookie("last_login", date("Y-m-d H:i:s"), time() + (86400 * 7));

            header("Location: dashboard.php");
            exit();
        } else {
            $message = "Invalid password";
        }
    } else {
        $message = "Email not found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login Page</h2>

<p><?php echo $message; ?></p>

<form method="post">
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($savedEmail); ?>" required>
    <br><br>

    <label>Password:</label>
    <input type="password" name="password" required>
    <br><br>

    <button type="submit" name="login">Login</button>
</form>

<p>Do not have an account? <a href="register.php">Register here</a></p>

</body>
</html>