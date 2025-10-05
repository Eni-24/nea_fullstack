<?php
include('includes/header.php');
include('includes/navbar.php'); 
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
    <img class="singlePostImage"src="admin/uploads/<?php echo $data['image']; ?>" alt="image">
    <p><?php echo $data["content"]; ?></p>

    <?php
      }
    } else {
      echo "No post found!";
    }
    

    ?>
    <div class="group">
        <div class="share">
           <h3>Share this!!</h3> 
           <a class="app"href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
           <a class="app"href="https://x.com/?lang=en"><i class="fa-brands fa-x-twitter"></i></a>
           <a class="app"href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a> 
          
        </div>
        <div class="team">
           <a class="app"href=https://www.figma.com/design/flaSotWCuPq4enCErFnkX1/Blog-Wireframe--Community-?node-id=0-1&p=f&t=3sB5MSuWDnLqOihu-0i><i class="fa-brands fa-figma"></i></a> 
           <a class="app"href="https://github.com/Eni-24/nea_fullstack"><i class="fa-brands fa-github"></i></a>


        </div>
    </div>
    <div class="morePosts">
        <h3>More Posts</h3>
        <div class="contents">
            <div class="morePostcontents">
                <a style="text-decoration: none;"href="/">
                    <img class="contentsImg" src="./images/adhd.png" alt="ADHD">
                    <p>ADHD</p>
                </a>
            </div>
            <div class="morePostcontents">
                <a style="text-decoration: none;"href="/">
                    <img class="contentsImg" src="./images/dyslexia.png" alt="ADHD">
                    <p>Dyslexia</p>
                </a>
            </div>
            <div class="morePostcontents">
                  <a style="text-decoration: none;"href="/">
                    <img class="contentsImg" src="./images/dyscalculia.png" alt="ADHD">
                    <p>Dyscalculia</p>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
include("./includes/footer.php")
?>