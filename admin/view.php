<?php
include_once("./includes/header.php");
?>
<div class="post w-100 bg-light p-5">
  <?php
  $id = $_GET["id"];
  if ($id) {
    include("../includes/db.php");
    $sqlSelectPost = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($connection, $sqlSelectPost);
    while ($data = mysqli_fetch_assoc($result)) {
  ?>
    <img src="./uploads/<?php echo $data['image']; ?>" alt="image">
    <h1><?php echo $data['date']; ?></h1>
    <p><?php echo $data['title']; ?></p>
    <p><?php echo $data['content']; ?></p>
  <?php
    }
  } else {
    echo "Post not found!";
  }

  ?>
</div>

<?php
include_once("./includes/footer.php");
?>
