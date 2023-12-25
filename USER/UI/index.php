<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <style>
    body {
      padding-top: 56px;
      /* Adjust the height of the navigation bar */
    }

    .container {
      margin-top: 20px;
    }
  </style>
  <link rel="stylesheet" href="/CSS/index.css">
  <title>CMS Website</title>
</head>

<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#"><span style="color:red;">Articles</span>Hub</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="login.php"><b>Login</b></a>
        </li>
        <!-- Add more navigation items as needed -->
      </ul>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <h1 class="mt-5" style="background-color: black; color: white; padding: 10px;"><span style="color:red;">Articles</span>Hub</h1>
    <p class="lead">
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit, exercitationem.
    </p>

    <div class="row mt-4">
      <div class="col-md-8">
        <h2>Latest Articles</h2>
        <?php 

          $conn = mysqli_connect("localhost", "root", "", "articlehub_db") or die("ERROR: Connection to MySQL Database Failed!!" . mysqli_connect_error());

          $sql = "SELECT * FROM `articles` ORDER BY id DESC";
          $result = mysqli_query($conn, $sql) or die("ERROR : MySQL Query Failed to execute!!");

          if(mysqli_num_rows($result) > 0){
        ?>
        <div class="card mb-3">
          <?php while($row = mysqli_fetch_assoc($result)){ ?>
          <img src="/ADMIN/uploaded-images/<?php echo $row['article_image'];?>" class="card-img-top" alt="78s6df8s8587s7587s" />
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['article_title']; ?></h5>
            <p class="card-text">
              <?php echo $row['article_desc'];?>
            </p>
            <p class="card-text">
              <small class="text-body-secondary">Posted at <?php echo $row['posted_time']; ?></small>
            </p>
          </div>
          <?php }?>     
        </div>
        <?php }?>
        <!-- Add more articles as needed -->
      </div>

      <div class="col-md-4">
        <!-- Sidebar -->
        <h2>Categories</h2>
        <ul class="list-group">
          <li class="list-group-item"><a href="#" style="text-decoration: none; color:black;">News</a></li>
          <li class="list-group-item"><a href="#" style="text-decoration: none; color:black;">Blogs</a></li>
          <li class="list-group-item"><a href="#" style="text-decoration: none; color:black;">Events</a></li>
          <li class="list-group-item"><a href="#" style="text-decoration: none; color:black;">Media</a></li>
          <li class="list-group-item"><a href="#" style="text-decoration: none; color:black;">Articles</a></li>
          <li class="list-group-item"><a href="#" style="text-decoration: none; color:black;">Products</a></li>
          <li class="list-group-item"><a href="#" style="text-decoration: none; color:black;">Services</a></li>
          <li class="list-group-item"><a href="#" style="text-decoration: none; color:black;">Portfolio</a></li>
          <li class="list-group-item"><a href="#" style="text-decoration: none; color:black;">Testimonials</a></li>
          <li class="list-group-item"><a href="#" style="text-decoration: none; color:black;">Contact</a></li>
          <li class="list-group-item"><a href="#" style="text-decoration: none; color:black;">FAQs</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="py-5 bg-dark mt-5">
    <div class="container">
      <p class="m-0 text-center text-white">
        Mady by Ashish Regmi - 2023<sup>&copy</sup>
      </p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>