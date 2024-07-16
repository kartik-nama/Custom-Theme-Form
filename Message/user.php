<?php

require_once ("../../../wp-load.php");

// Inserting The Data In PostMeta From Frontend
if (isset($_POST["submit"])) {
  $post_id = wp_insert_post(
    array(
      'post_type' => 'form',
      'post_status' => 'publish',
      'post_title' => $_POST['name'],
      'post_content' => $_POST['message']
    )
  );
  if ($post_id) {
    add_post_meta($post_id, 'name', $_POST['name']);
    add_post_meta($post_id, 'email', $_POST['email']);
    add_post_meta($post_id, 'subject', $_POST['subject']);
    add_post_meta($post_id, 'message', $_POST['message']);



    if($post_id==true){
      header('Location:theme-cust');
    }
  }





}
?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

  <title>Message</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Message</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      </div>
    </div>
  </nav>
  <!-- Scripts  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
  <div class="container my-3">



    <!-- Inserting Data In Form -->
    <form action="" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" class="form-control" id="subject" name="subject">
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" name="message" rows="3"></textarea>
      </div>
      <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>

</html>