// SweetAlert for success messages
function confirmDelete(commentId, postId) {
  Swal.fire({
    title: "Are you sure?",
    text: "This action cannot be undone!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "?id=" + postId + "&delete_id=" + commentId;
    }
  });
}


(function () {
  emailjs.init({
    publicKey: "OMTu7XFBNdqF-_tvE", // your public key
  });
})();

document
  .getElementById("contact-form")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    emailjs.sendForm("service_f2et3gs", "__ejs-test-mail-service__", this).then(
      () => {
        document.getElementById("success-message").style.display = "block";
        this.reset();
      },
      (error) => {
        console.log("FAILED...", error);
        alert("Something went wrong. Please try again.");
      }
    );
  });
