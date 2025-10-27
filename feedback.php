<?php include "./includes/header.php"; ?>
<?php include "./includes/navbar.php"; ?>

<div class="create-form mx-auto p-4 w-100" style="max-width: 700px;">
  <img src="./images/feedback.png" alt="feedback" class="img-fluid mx-auto d-block" width="300" height="300">
  <h1 class="feedback">Give Us Feedback</h1>

  <form id="contactForm">
    <div class="mb-3">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="subject">Subject</label>
      <input type="text" id="subject" name="subject" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="message">Message</label>
      <textarea id="message" name="message" rows="5" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <p id="formMessage" style="margin-top: 10px; display: none;"></p>
  </form>
</div>

<script>
  const form = document.getElementById('contactForm');
  const formMessage = document.getElementById('formMessage');

  form.addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(form);

    fetch('save_contact.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.text())
    .then(data => {
      if (data === 'success') {
        formMessage.style.display = 'block';
        formMessage.style.color = 'green';
        formMessage.textContent = 'Thank you, your message has been sent!';
        form.reset();
      } else {
        formMessage.style.display = 'block';
        formMessage.style.color = 'red';
        formMessage.textContent = 'Something went wrong. Please try again.';
      }
    })
    .catch(error => {
      console.error('Error:', error);
      formMessage.style.display = 'block';
      formMessage.style.color = 'red';
      formMessage.textContent = 'Error submitting form.';
    });
  });
</script>

<?php include "./includes/footer.php"; ?>











