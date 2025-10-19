<?php 
include "./includes/header.php";
include "./includes/navbar.php";
?>

<?php
include("./includes/db.php");
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $checkEmail = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");
  if (mysqli_num_rows($checkEmail) > 0) {
    $message = "Email already registered!";
  } else {
    $insert = mysqli_query($connection, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
    if ($insert) {
      $message = "Registration successful. You can now <a href='login.php'>Login</a>";
    } else {
      $message = "Registration failed!";
    }
  }
}
?>

  <div class="create-form mx-auto p-4 w-100" style="max-width: 700px;">
    <img src="./images/logo.png" alt="logo" class="img-fluid mx-auto d-block" width="150px" height="150px">
    <h1 class="login" style="color: purple; margin-top: 50px;" >Register</h1>
    <p style="color:red;"><?php echo $message; ?></p>
    <form method="POST" class="loginForm">
      <input class="loginInput" type="text" name="username" placeholder="Username" required>
      <input class="loginInput" type="email" name="email" placeholder="Email" required>
      <input class="loginInput" type="password" name="password" placeholder="Password" required>
      <button class="btn btn-primary btn-block mt-4 mb-4" type="submit">Register</button>
      <p class="account">Already have an account? <a href="login.php">Login</a></p>
   </form>
    
    <p class="success-message"><?php echo $message; ?></p>
  </div>

<?php
include "./includes/footer.php";
?>


