<?php
include_once("./includes/header.php");
?>

<div class="posts-list w-100 p-5">
  <h2>Posts</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="width: 10%";>Date</th>
        <th style="width: 20%";>Image</th>
        <th style="width: 20%";>Title</th>
        <th style="width: 30%";>Article</th>
        <th style="width: 20%";>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include_once("../includes/db.php");
      $sqlSelect = "SELECT * FROM posts";
      $result = mysqli_query($connection, $sqlSelect);
      while ($data = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td><?php echo $data["date"]; ?></td>
          <td><img src="./uploads/<?php echo $data['image']; ?>" alt="Post Image" width="50" height="70"></td>
          <td><?php echo $data["title"]; ?></td>
          <td><?php echo $data["summary"]; ?></td>
          <td>
            <a class="btn btn-info" href="view.php?id=<?php echo $data["id"] ?>">View</a>
            <a class="btn btn-warning" href="edit.php?id=<?php echo $data["id"] ?>">Edit</a>
            <a class="btn btn-danger" 
            href="delete.php?id=<?php echo $data["id"] ?>"
            onclick="return confirm('Are you sure you want to delete this post?');"
            >
            Delete
            </a>
          </td>
        </tr>
        <?php        
      }
      ?>
    </tbody>
  </table>
</div>
<?php
include("./includes/footer.php");
?>