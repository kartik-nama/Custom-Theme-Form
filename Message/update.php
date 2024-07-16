<?php
require_once("../../../wp-load.php");

// Updating The Meta Data Using Frontend Form

if (isset($_GET['id'])) {           // Fetching The Old Data And Displaying Them Into Fields
    $post_id = $_GET['id'];

    $name = get_post_meta($post_id, 'name', true);
    $email = get_post_meta($post_id, 'email', true);
    $subject = get_post_meta($post_id, 'subject', true);
    $message = get_post_meta($post_id, 'message', true);
}


if (isset($_POST["submit"])) {              // Qurey For Update Data 
    $post_id = $_POST['post_id'];


    update_post_meta($post_id, 'name', $_POST['name']);
    update_post_meta($post_id, 'email', $_POST['email']);
    update_post_meta($post_id, 'subject', $_POST['subject']);
    update_post_meta($post_id, 'message', $_POST['message']);


    header('Location:theme-cust');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Message</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Update Message</h2>
        <form action="" method="POST">
            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $subject; ?>">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="3"><?php echo $message; ?></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>
