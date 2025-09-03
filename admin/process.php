<?php
    if (isset($_POST['create'])) {#
        include("../includes/db.php");
        $title = mysqli_real_escape_string($connection, $_POST["title"]);
        $summary = mysqli_real_escape_string($connection, $_POST["summary"]);
        $content = mysqli_real_escape_string($connection, $_POST["content"]);
        $date = mysqli_real_escape_string($connection, $_POST["date"]);
        // Handle file upload
        $image = $_FILES['image']['name'];
        $target = "./uploads/" . basename($image);

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


?>