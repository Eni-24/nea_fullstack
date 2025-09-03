<?php
  include('./includes/header.php');
?>
    <div class="posts-list">
      <h2>posts</h2>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width:10%"; >Date</th>
            <th style="width:20%";>Image</th>
            <th style="width:20%";>Title</th>
            <th style="width:30%";>Article</th>
            <th style="width:20%";>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
           include("../includes/db.php");
          ?>
          <tr>
            <td>29-08-2025 </td>
            <td><img style="width: 50px; height: 70px; "src="./uploads/1.jpg" alt=""> </td>
            <td>Emotional Regulation </td>
            <td> 
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quae architecto,
              odio nisi molestias laborum reiciendis dolorem sequi quidem accusantium corporis illum
              fugit perspiciatis deserunt. Sequi id nam ipsum voluptas.
            </td>
            <td>
              <a class="btn btn-info" href="">View</a>
              <a class="btn btn-warning" href="">Edit</a>
              <a class="btn btn-danger" href="">Delete</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
<?php
include('./includes/footer.php');
?>