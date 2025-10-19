<?php include "./includes/header.php" ?>
    <?php include "./includes/navbar.php" ?>
    <main>
      <!-- Featured Articles -->
      <section class="section">
        <div class="section-header">
          <h2 class="ml-4">Featured Articles</h2>
          <a href="#">More →</a>
        </div>
        <div class="card-grid">
          <?php
          include("./includes/db.php");
          $sqlSelect = "SELECT * FROM posts";
          $result = mysqli_query($connection, $sqlSelect);
          while ($data = mysqli_fetch_assoc($result)) {
          ?>
          <div class="card">
            <a class="post" href="view.php?id=<?php echo $data['id']; ?>">
              <img src="admin/uploads/<?php echo $data['image']; ?>" alt="card_image" width="685px" height="457px">              
              <h3><?php echo $data["title"]; ?></h3>
              <div class="author">
                <h4>Author</h4>
                <span class="time"><?php echo $data["date"]; ?></span>
              </div>       
              <p><?php echo $data["summary"]; ?></p>
            </a>            
          </div>
          <?php
          }
          ?>
        </div>
      </section>
      
    </main>
<?php include "./includes/footer.php" ?>