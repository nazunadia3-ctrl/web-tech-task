<?php
include "db.php";

$message = "";

if (isset($_POST["register"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $checkSql = "SELECT * FROM users WHERE email='$email'";
    $checkResult = mysqli_query($conn, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        $message = "Email already exists";
    } else {
        $sql = "INSERT INTO users (name, email, password) 
                VALUES ('$name', '$email', '$hashedPassword')";

        if (mysqli_query($conn, $sql)) {
            $message = "Registration successful. You can login now.";
        } else {
            $message = "Registration failed";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>Registration Page</h2>

<p><?php echo $message; ?></p>

<form method="post">
    <label>Name:</label>
    <input type="text" name="name" required>
    <br><br>

    <label>Email:</label>
    <input type="email" name="email" required>
    <br><br>

    <label>Password:</label>
    <input type="password" name="password" required>
    <br><br>

    <button type="submit" name="register">Register</button>
</form>

<p>Already have an account? <a href="login.php">Login here</a></p>

</body>
</html>