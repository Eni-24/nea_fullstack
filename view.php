<?php
include "./includes/header.php";
include "./includes/navbar.php"
?>

<div class="blog-container">
    <?php
    $id = $_GET['id'];
    if ($id) {
        include("./includes/db.php");
        $sqlSelect = "SELECT * FROM posts WHERE id = $id";
        $result = mysqli_query($connection, $sqlSelect);
        while ($data = mysqli_fetch_assoc($result)) {
    ?>
    <img src="admin/uploads/<?php echo $data['image']; ?>" alt="image">
    <p><?php echo $data["content"]; ?></p>

    <?php
        }
    } else {
        echo "No post found!";
    }
    ?>
    
    <div class="group">
        <div class="share">
            <h3>Share this</h3>
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-x-twitter"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
        </div>
        <div class="team">
            <span><a class="design" href="https://www.figma.com/design/flaSotWCuPq4enCErFnkX1/Blog-Wireframe--Community-?node-id=0-1&p=f&t=3sB5MSuWDnLqOihu-0">Design</a></span>
            <span><a class="github" href="">Github</a></span>
        </div>
    </div>

    <?php
// session_start();
include("./includes/db.php");
$id = $_GET['id'];

// Handle comment submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
  $comment = mysqli_real_escape_string($connection, $_POST['comment']);
  $user_id = $_SESSION['user_id'];
  $insertComment = "INSERT INTO comments (post_id, user_id, comment) VALUES ('$id', '$user_id', '$comment')";
  mysqli_query($connection, $insertComment);
  header("Location: view.php?id=$id"); // reload page to show new comment
  exit();
}
?>

<div class="comments-section">
  <h3>Comments</h3>

  <?php
  $getComments = "SELECT c.*, u.username FROM comments c JOIN users u ON c.user_id = u.id WHERE c.post_id = $id ORDER BY c.created_at DESC";
  $commentResult = mysqli_query($connection, $getComments);

  if (mysqli_num_rows($commentResult) > 0) {
    while ($comment = mysqli_fetch_assoc($commentResult)) {
      echo "<div class='comment-box'><strong>{$comment['username']}</strong><p>{$comment['comment']}</p><small>{$comment['created_at']}</small></div>";
    }
  } else {
    echo "<p>No comments yet. Be the first to comment!</p>";
  }
  ?>

  <hr>
  <?php if (isset($_SESSION['user_id'])) { ?>
    <form method="POST">
      <textarea name="comment" placeholder="Write a comment..." required></textarea><br>
      <button type="submit">Submit Comment</button>
      <a href="logout.php">Logout</a>
    </form>
  <?php } else { ?>
    <p><a href="login.php">Login</a> or <a href="register.php">Register</a> to comment.</p>
  <?php } ?>
</div>


  

    <div class="morePost">
        <h3>More Posts</h3>
        <div class="contents">
            <div class="morePostContents">        
                <a href="/" style="text-decoration: none;">
                    <img style="margin-right: 5px;" class="contentsImg" src="./images/adhd.png" alt="adhd">
                    <p>ADHD</p>
                </a>
            </div>
            <div class="morePostContents">
                <a href="/" style="text-decoration: none;">     
                    <img style="margin-right: 5px;" class="contentsImg" src="./images/dyslexia.png" alt="dyslexia">
                    <p>Dyslexia</p>
                </a>
            </div>
            <div class="morePostContents">
                <a href="/" style="text-decoration: none;">
                    <img class="contentsImg" src="./images/dyscalculia.png" alt="dyscalculia.png">
                    <p>Dyscalculia</p>
                </a>                 
            </div>
        </div> 
    </div>
</div>


<?php include "./includes/footer.php" ?>