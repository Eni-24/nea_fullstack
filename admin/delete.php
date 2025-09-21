<?php
include("../includes/db.php");
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sqlSelect = "SELECT image FROM posts WHERE id = $id";
    $results = mysqli_query($connection, $sqlSelect);

    if (mysqli_num_rows($results) > 0) {
        $post = mysqli_fetch_assoc($results);
        $imagePath = "./uploads/" . $post['image'];
        // Delete from database 
        $sqlDelete = "DELETE FROM posts WHERE id = $id";
        if (mysqli_query($connection, $sqlDelete)) {
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            header("Location: index.php?message=Deleted");
            exit();
        } else {
        die("Failed to delete posts: " . mysqli_error($connection));
        }

} else {
    die("Post not found.");
        
    }
    
} else {
    die("Invalid request.");
}






?>