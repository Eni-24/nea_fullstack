<?php include "./includes/header.php"; ?>
<?php include "./includes/navbar.php"; ?>
<main>

  <section class="section">
    <div class="section-header">
      <h2 class="ml-4">Search Results</h2>
      <a href="index.php">← Back</a>
    </div>
    <div class="card-grid">
      <?php
      include("./includes/db.php");

      if (isset($_POST['submit'])) {
        $search = mysqli_real_escape_string($connection, $_POST['search']);

        $sqlSelect = "SELECT * FROM posts WHERE title LIKE '%$search%' 
        OR summary LIKE '%$search%' 
        OR content LIKE '%$search%'
        ORDER BY date DESC";

        $result = mysqli_query($connection, $sqlSelect);

        if (mysqli_num_rows($result) > 0) {
          while ($data = mysqli_fetch_assoc($result)) {
      ?>
            <div class="card">
              <a class="post" href="/view.php?id=<?php echo $data['id']; ?>">
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
        } else {
          echo "<p>No results found for '<strong>$search</strong>'.</p>";
        }
      } else {
        echo "<p>Please enter a search term.</p>";
      }
      ?>
    </div>
  </section>
</main>
<?php include "./includes/footer.php"; ?>
