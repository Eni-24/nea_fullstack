<?php include "./includes/header.php" ?>
    <?php include "./includes/navbar.php" ?>
        <!-- Feedback -->
    <div class="create-form mx-auto p-4 w-100" style="max-width: 700px;">
      <img src="./images/feedback.png" alt="feedback" class="img-fluid mx-auto d-block" width="300px" height="300px">
      <h1 class="feedback">Give Us Feedback</h1>
      <form class="mt-4" id="contact-form" method="POST">
        <div class="form-group mt-4">
          <label for="name">Name</label>
          <input class="form-control" type="text" name="user_name" id="name" required>
        </div>
        <div class="form-group mt-4">
          <label for="email">Email</label>
          <input class="form-control" type="user_email" name="email" id="email" required>
        </div>
        <div class="form-group mt-4">
          <label for="email">Subject</label>
          <input class="form-control" type="user_subject" name="email" id="subject" required>
        </div>
        <div class="form-group mt-4">
          <label for="message">Message</label>
          <textarea class="form-control" name="message" id="message" rows="5" required></textarea>
        </div>
        <button class="btn btn-primary btn-block mt-4 mb-4" type="submit">Submit</button>
        <p id="success-message" class="success-message" style="display:none;">
        Thank you! Your message has been sent successfully.
      </p>
      </form>
    </div>
<?php include "./includes/footer.php" ?>