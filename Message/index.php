<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

  <title>Database</title>
</head>

<body>
  <h1>Messages</h1>




  <div class="container">
    <button class="btn btn-primary"><a href='<?php echo get_template_directory_uri(); ?>/user.php' class="text-light">Add Message</a></button>


    <!-- Table Elements -->
    <table class="table" id="myTable">
      <thead>
        <tr>

          <th scope="col">S.No</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Subject</th>
          <th scope="col">Message</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>

<!-- Fetching Data & Displaying It On Table -->
        <?php
        $wp_form=array(
          'post_type'=> 'form'
        );
        $sno=0;
        $form_query= new $wp_query($wp_form);
          while ( $form_query->have_posts() ) {
              $form_query->the_post();
      
              // Get the current post ID
              $post_id = get_the_ID();
            $sno=$sno+1;
              // Retrieve and display meta data
              $name = get_post_meta( $post_id, 'name', true );
              $email = get_post_meta( $post_id, 'email', true );
              $subject = get_post_meta( $post_id, 'subject', true );
              $message = get_post_meta( $post_id, 'message', true );
      
          ?>

          <tr>
            <td><?php echo $sno ?></td>
            <td><?php echo $name ?></td>
            <td><?php echo $email?></td>
            <td><?php echo $subject ?></td>
            <td><?php echo $message ?></td>
            
            <td>
              <button update="update" class="btn btn-primary"><a href="<?php echo get_template_directory_uri(); ?>/update.php?id=<?php echo $id ?>"
                  class="text-light">Update</a></button>
              <button name="delete" class="btn btn-primary"><a href="<?php echo get_template_directory_uri(); ?>/delete.php?id=<?php echo $id ?>"
                  class="text-light">Delete</a></button>
            </td>
          </tr>
          <?php
                    }
          ?>
        

      </tbody>
    </table>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
  <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

  <script>
    let table = new DataTable('#myTable');
  </script>
</body>

</html>