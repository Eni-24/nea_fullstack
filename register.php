<?php
include("./includes/header.php");
include("./includes/navbar.php");
?>


<?php
include("./includes/db.php");
session_start();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if username or email already exists
    $checkSql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $checkResult = mysqli_query($connection, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        $message = "Username or Email already taken. Please choose another.";
    } else {
        $sql = "INSERT INTO users (username, email, password) 
                VALUES ('$username', '$email', '$password')";
        if (mysqli_query($connection, $sql)) {
            $message = "Registration successful! <a href='login.php'>Login</a>";
        } else {
            $message = "Error: " . mysqli_error($connection);
        }
    }
}if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if username or email already exists
    $checkSql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $checkResult = mysqli_query($connection, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        $message = "Username or Email already taken. Please choose another.";
    } else {
        $sql = "INSERT INTO users (username, email, password) 
                VALUES ('$username', '$email', '$password')";
        if (mysqli_query($connection, $sql)) {
            $message = "Registration successful! <a href='login.php'>Login</a>";
        } else {
            $message = "Error: " . mysqli_error($connection);
        }
    }
}if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if username or email already exists
    $checkSql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $checkResult = mysqli_query($connection, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        $message = "Username or Email already taken. Please choose another.";
    } else {
        $sql = "INSERT INTO users (username, email, password) 
                VALUES ('$username', '$email', '$password')";
        if (mysqli_query($connection, $sql)) {
            $message = "Registration successful! <a href='login.php'>Login</a>";
        } else {
            $message = "Error: " . mysqli_error($connection);
        }
    }
}
?>

<div class="create-form mx-auto p-4 w-100" style="max-width: 700px;">
    <img src="./images/logo.png" alt="feedback" class="img-fluid mx-auto d-block" width="300px" height="300px">
    <h1 class="register">Register</h1>
    <form method="POST" class="registerForm">
      <input class="registerInput" type="text" name="username" placeholder="Username" required>
      <input class="registerInput" type="email" name="email" placeholder="Email" required>
      <input class="registerInput" type="password" name="password" placeholder="Password" required>
      <button class="btn btn-primary btn-block mt-4 mb-4" type="submit">Register</button>
    </form>


<?php
include("./includes/footer.php");
?>