<?php
error_reporting(0);
echo $post['delete_image'];
echo $post['photo_id'];
die;
if (isset($_POST['delete_image'])) {
    $image_id = $_POST['photo_id'];
    $delete = "DELETE FROM `gallery_photos` WHERE photo_id='$image_id'";
    mysqli_query($conn, $delete);
}