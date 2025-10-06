<?php
    if (isset($_POST['create'])) {#
        include("../includes/db.php");
        $title = mysqli_real_escape_string($connection, $_POST["title"]);
        $summary = mysqli_real_escape_string($connection, $_POST["summary"]);
        $content = mysqli_real_escape_string($connection, $_POST["content"]);
        $date = mysqli_real_escape_string($connection, $_POST["date"]);

        if (empty($title) || empty($summary) || empty($content)) {
            die("All fields are required. Please fill in all fields.");
        }

        // Handle file upload
        $image = $_FILES['image']['name'];
        $target = "./uploads/" . basename($image);
        $allowed_types = ['image/jpeg', 'image/png'];


        if (!in_array($_FILES['image']['type'], $allowed_types)) {
            die("Invalid file type. Only JPG and PNG are supported.");
        }
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sqlInsert = "INSERT INTO posts (date, image, title, summary, content) 
        VALUES ('$date', '$image', '$title', '$summary', '$content')";
        if (mysqli_query($connection, $sqlInsert)) {
            # code...
        } else {
            die("Data not inserted!");
        }                
        } else {
        echo "Failed to upload image!";
        }
    }

    if (isset($_POST['update'])) {
        include("../includes/db.php");
        $id = intval($_POST["id"]);
        $title = mysqli_real_escape_string($connection, $_POST['title']);
        $summary = mysqli_real_escape_string($connection, $_POST['summary']);
        $content = mysqli_real_escape_string($connection, $_POST['content']);
          # handling image upload 
        $image = $_FILES['image']['name'];

    if (!empty($image)) {
        $target = "./uploads/" . basename($image);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $sqlUpdate = "UPDATE posts SET title='$title', summary='$summary', content='$content', image='$image' WHERE id=$id";
        } else {
            die("Failed to upload new image!");
        }
    } else {
        // No new image uploaded → keep the old one
        $sqlUpdate = "UPDATE posts SET title='$title', summary='$summary', content='$content' WHERE id=$id";
    }

    if (mysqli_query($connection, $sqlUpdate)) {
        header("Location: index.php"); // Redirect back to post list
        exit();
    } else {
        die("Update failed: " . mysqli_error($connection));
    }
}

    


?>