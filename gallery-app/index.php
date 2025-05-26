<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Gallery App</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="text-center mb-4">Image Gallery</h2>

    <!-- Upload Form -->
    <form action="upload.php" method="POST" enctype="multipart/form-data" class="mb-4">
      <div class="input-group">
        <input type="file" name="image" class="form-control" required>
        <button type="submit" name="submit" class="btn btn-primary">Upload</button>
      </div>
    </form>

    <!-- Gallery Display -->
    <div class="row">
      <?php
      $result = $conn->query("SELECT * FROM images ORDER BY uploaded_on DESC");
      if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo '<div class="col-md-3 mb-4">
                  <div class="card shadow-sm">
                    <img src="uploads/'.$row['filename'].'" class="card-img-top" alt="Image">
                  </div>
                  <div class="card-body text-center">
                    <small class="text-muted">Uploaded on: '.date("d M Y, h:i A", strtotime($row['uploaded_on'])).'</small>
                </div>
                </div>';
        }
      } else {
        echo '<p>No images uploaded yet.</p>';
      }
      ?>
    </div>
  </div>
</body>
</html>
