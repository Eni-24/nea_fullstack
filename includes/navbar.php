<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img class="logo" src="./images/logo1.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link" href="/interactive.php">Interactive Models</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/feedback.php">Feedback System</a>
        </li>
      </ul>
      <div class="search-box">
        <form action="search.php" method="POST">
          <input name="search" type="text" placeholder="Search..." />
          <button type="submit" name="submit">Search</button>
        </form>
      </div>
        
    </div>
  </div>
</nav>