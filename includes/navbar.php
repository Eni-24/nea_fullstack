<header>
      <a href="/"><img src="./images/logo.png" alt="logo" class="logo"></a>
      <?php session_start(); ?>
      <nav>
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/interactive.php">Interactive Features</a></li>
          <li><a href="/feedback.php">Feedback</a></li>

          <?php if (isset($_SESSION['user_id'])) { ?>
          <li><a href="logout.php">Logout (<?php echo $_SESSION['username']; ?>)</a></li>
          <?php } else { ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
          <?php } ?>


          <!-- <li><a href="/register.php">Register</a></li>
          <li><a href="/login.php">Login</a></li> -->
        </ul>
      </nav>
      <div class="search-box">
        <form action="search.php" method="POST">
          <input type="text" name="search" placeholder="Search...">
          <button type="submit" name="submit">Search</button>
        </form>
        
      </div>
    </header>