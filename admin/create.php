<?php include('./includes/header.php')?>
<div class="create-form mx-auto p-4 w-100">
    <h2>Post</h2>
    <form action="process.php" method="POST" enctype="multipart/form-data" 
    style="max-width: 700px;">
      <div class="form-field mb-4">
        <label id="image" for="">Upload Image</label>
        <input type="file" name="Image" class="form-control"/>
      </div>
      <div class="form-field mb-4">
        <input type="text" name="title" class="form-control" placeholder="enter title"/>
      </div>
      <div class="form-field mb-4">
        <textarea name="summary" id="summary" class="form-control" cols="30" rows="10" placeholder="Enter summary"></textarea>
      </div>
      <div class="form-field mb-4">
        <textarea name="content" id="content" class="form-control" cols="30" rows="10" placeholder="enter post"></textarea>
      </div>
      <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>"/>
      <div class="form-field mb-4">
        <button type="submit" class="btn btn-primary" value="submit" name="create">Submit</button>
      </div>
    </form>
</div>
<?php include('./includes/footer.php');?>