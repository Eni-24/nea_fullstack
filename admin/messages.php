<?php
include("./includes/header.php");
include("../includes/db.php");
?>

<div class="container mt-5">
  <h2>Contact Messages</h2>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = mysqli_query($connection, "SELECT * FROM contact_messages ORDER BY id DESC");
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['subject']}</td>
                <td>{$row['message']}</td>
                <td>{$row['created_at']}</td>
              </tr>";
      }
      ?>
    </tbody>
  </table>
</div>



<?php
include("./includes/footer.php");
?>
fob-wdkn-rys