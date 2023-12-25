<?php
if (isset($_POST['article_submit_data'])) {

    include "../DBCON/config.php";

    if (isset($_FILES['image'])) {

        $file_name = $_FILES['image']['name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($file_tmp, "uploaded-images/" . $file_name);

        $article_title = mysqli_real_escape_string($conn, $_POST['article_title']);
        $article_desc = mysqli_real_escape_string($conn, $_POST['article_desc']);

        $sql = "INSERT INTO `articles`(`article_title`, `article_desc`, `article_image`) VALUES ('{$article_title}', '{$article_desc}', '{$file_name}')";
        $result = mysqli_query($conn, $sql) or die("ERROR : MySQL Query Failed to execute!!");

        if ($result) {
            echo "<script>alert('Article Posted');</script>";
        } else {
            echo "<script>alert('Failed to Post Article, try again later!!');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 56px;
            /* Adjust the height of the navigation bar */
        }

        .container {
            margin-top: 20px;
        }
    </style>
    <title>Article Form</title>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">CMS Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <!-- Add more navigation items as needed -->
            </ul>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        <h1 class="mt-5">Submit an Article</h1>

        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="articleTitle">Article Title:</label>
                <input type="text" name="article_title" class="form-control" id="articleTitle" placeholder="Enter the title of your article" required>
            </div>

            <div class="form-group">
                <label for="articleDescription">Article Description:</label>
                <textarea name="article_desc" class="form-control" id="articleDescription" rows="4" placeholder="Enter a brief description of your article" required></textarea>
            </div>

            <div class="form-group">
                <input name="image" type="file">
            </div>

            <button name="article_submit_data" type="submit" class="btn btn-primary">Submit Article</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="py-5 bg-dark mt-5">
        <div class="container">
            <p class="m-0 text-center text-white">CMS Website &copy; 2023</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>