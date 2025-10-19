<?php
include("./includes/header.php");
?>
    <div class="create-form mx-auto p-4 w-100" style="max-width: 700px;">
      <h2>Posts</h2>
      <form action="process.php" method="POST" enctype="multipart/form-data">
        <div class="form-field mb-4">
          <label for="image">Upload Image</label>
          <input type="file" name="image" class="form-control" />
        </div>
        <div class="form-field mb-4">
          <input type="text" class="form-control" name="title" id="" placeholder="Enter Title:" required>
        </div>
        <div class="form-field mb-4">
          <textarea name="summary" class="form-control" id="" cols="30" rows="10" placeholder="Enter Summary:" required></textarea>
        </div>
        <div class="form-field mb-4">
          <textarea name="content" class="form-control" id="" cols="30" rows="10" placeholder="Enter Post:" required></textarea>
        </div>
        <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>" required>
        <div class="form-field">
          <button type="submit" class="btn btn-primary" value="submit" name="create">Submit</button>
        </div>
      </form>
    </div>
<?php
include("./includes/footer.php");
?>
 