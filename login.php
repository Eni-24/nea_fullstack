<?php
include("./includes/header.php");
include("./includes/navbar.php");
?>


<?php
include("./includes/db.php");
session_start();
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit;
        } else {
            $message = "Invalid password!";
        }
    } else {
        $message = "User not found!";
    }
}

?>
<div class="create-form mx-auto p-4 w-100" style="max-width: 700px;">
    <img src="./images/logo1.png" alt="logo" class="img-fluid mx-auto d-block" width="300px" height="300px">
    <h1 class="login">Login</h1>
    <form method="POST" class="loginForm">
      <input class="loginInput" type="email" name="email" placeholder="Email" required>
      <input class="loginInput" type="password" name="password" placeholder="Password" required>
      <button class="btn btn-primary btn-block mt-4 mb-4" type="submit">Login</button>
    </form>
    <p class="success-message"><?php echo $message; ?></p>
</div>



<?php
include("./includes/footer.php");
?>