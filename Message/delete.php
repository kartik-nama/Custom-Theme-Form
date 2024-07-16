<?php
require_once("../../../wp-load.php");

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // Delete post and its meta data
    $deleted = wp_delete_post($post_id, true);

    if ($deleted) {
        header('Location:theme-cust');
        exit;
    } else {
        echo 'Error deleting post.';
    }
}
?>
