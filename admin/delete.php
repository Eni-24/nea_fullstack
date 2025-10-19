<?php
include("../includes/db.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // sanitize id

    // First, fetch the image so we can delete it from uploads
    $sqlSelect = "SELECT image FROM posts WHERE id = $id";
    $result = mysqli_query($connection, $sqlSelect);

    if (mysqli_num_rows($result) > 0) {
        $post = mysqli_fetch_assoc($result);
        $imagePath = "./uploads/" . $post['image'];

        // Delete from database
        $sqlDelete = "DELETE FROM posts WHERE id = $id";
        if (mysqli_query($connection, $sqlDelete)) {
            // If DB deletion is successful, also delete image file
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            header("Location: index.php?msg=deleted"); 
            exit();
        } else {
            die("Failed to delete post: " . mysqli_error($connection));
        }
    } else {
        die("Post not found!");
    }
} else {
    die("Invalid request!");
}
?>
