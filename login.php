<?php 
include "./includes/header.php";
include "./includes/navbar.php";
?>

<?php
include("./includes/db.php");
// session_start();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $password = $_POST['password'];

  $query = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");
  $user = mysqli_fetch_assoc($query);

  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header("Location: index.php");
    exit();
  } else {
    $message = "Invalid email or password!";
  }
}
?>
<div class="create-form mx-auto p-4 w-100" style="max-width: 700px;">
    <img src="./images/logo.png" alt="logo" class="img-fluid mx-auto d-block" width="150px" height="150px">
    <h1 class="login" style="color: purple; margin-top: 50px;" >Login</h1>
    <p style="color:red;"><?php echo $message; ?></p>
    <form method="POST" class="loginForm">
      <input class="loginInput" type="email" name="email" placeholder="Email" required>
      <input class="loginInput" type="password" name="password" placeholder="Password" required>
      <button class="btn btn-primary btn-block mt-4 mb-4" type="submit">Login</button>
      <p class="account">Don't have an account? <a href="register.php">Register</a></p>
    </form>
    
    <p class="success-message"><?php echo $message; ?></p>
</div>


<?php
include "./includes/footer.php";
?>

