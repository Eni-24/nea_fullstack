<?php
include("./includes/header.php");
include("../includes/db.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 
    $sql = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        $post = mysqli_fetch_assoc($result);
    } else {
        die("Post not found!");
    }
} else {
    die("Invalid Request!");
}

?>

<div class="create-form mx-auto p-4 w-100" style="max-width: 700px;">
  <form action="process.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">

    <div class="form-field mb-4">
      <label>Current Image</label><br>
      <img src="./uploads/<?php echo $post['image']; ?>" alt="Post Image" width="100">
      <input type="file" name="image" class="form-control mt-2" />
    </div>

    <div class="form-field mb-4">
      <input type="text" class="form-control" name="title" value="<?php echo $post['title']; ?>" placeholder="Enter Title">
    </div>

    <div class="form-field mb-4">
      <textarea name="summary" class="form-control" cols="30" rows="5"><?php echo $post['summary']; ?></textarea>
    </div>

    <div class="form-field mb-4">
      <textarea name="content" class="form-control" cols="30" rows="10"><?php echo $post['content']; ?></textarea>
    </div>

    <div class="form-field">
      <button type="submit" class="btn btn-primary" name="update">Update</button>
    </div>
  </form>
</div>

<?php include("./includes/footer.php"); ?>
