<?php
 include "./includes/header.php";
 include "./includes/navbar.php";
?>
<h1 class="fa">Featured Articles</h1>
<div class="cards">
  <?php
    include("./includes/db.php");
    $sqlSelect = "SELECT * FROM posts"; 
    $result = mysqli_query($connection, $sqlSelect);
    while ($data = mysqli_fetch_assoc($result)) {
  ?>
  <div class="card" style="width:15rem;">
    <a class="posts"href="view.php?id=<?php echo $data['id']; ?>">
      <img width="685px" height="457px" src="/admin/uploads/<?php echo $data['image']?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $data['title']?></h5>
        <p class="card-text"><?php echo $data['summary']?></p>
        <!-- <a href="#" class="btn btn-primary">Click here</a> -->
      </div>
    </a>
  </div>
  <?php
    }
  ?>
  
  <!-- <div class="card" style="width: 15rem;">
    <img src="./images/2.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Sensory processing</h5>
      <p class="card-text">How the brain receives , organises and responds to sensory information from the body and environment </p>
      <a href="#" class="btn btn-primary">Click here</a>
    </div>
  </div> -->
</div>
<br>
<br>
<br>
<br>

<?php
include "./includes/footer.php"
?>




