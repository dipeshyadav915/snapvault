<?php
require_once "db.php";
require_once "header.php";
require_once "function.php";

error_reporting(0);
$album_id = $_POST['album_id'];
$description = $_POST['description'];
if (isset($_POST['delete_image'])) {
    $image_id = $_POST['photo_id'];
    $delete = "DELETE FROM `gallery_photos` WHERE photo_id='$image_id'";
    mysqli_query($conn, $delete);
}
$s_query = "SELECT * FROM `gallery_photos` WHERE album_id= '$album_id'";
$s_sql = mysqli_query($conn, $s_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SnapVault</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f8552ba515.js" crossorigin="anonymous"></script>
</head>
<body>
   <div class="px-5 w-100">
<?php
        if (isset($_POST['album_id']) && $_POST['album_id'] == $album_id) {
            if (mysqli_num_rows($s_sql) > 0) {
              echo '<h4 class="text-dark-emphasis text-center pt-3 text-capitalize">'.$description.'<h4>';      
            while ($image_row = mysqli_fetch_assoc($s_sql)) {
                $photo_id = $image_row["photo_id"];
                $image_filename = $image_row["photo_link"];
        ?>
        <div class="images">
            <img src="uploads/<?= ($image_filename); ?>">
            <form action="" method="post">
                <input type="hidden" name="photo_id" value="<?= $photo_id ?>">
                <input type="submit" class="del_button text-danger fw-bold" name="delete_image" value="Delete">
            </form>
        </div>
        <?php
                    }
                }else{
                    ?>
                        <section class="p-4">
                            <div class="text-center">
                                <h2 class="head">Your Folder is Looking a Little Lonely!</h2>
                                <p class="text-dark-emphasis">It seems this folder hasn't received any photos yet. But don't worry, that's where you come in! Add some of your favorite pictures and start filling this space with memories. It's easy to get started—just click the button below to upload your images and give this folder the content it deserves.</p>
                                <a href="upload_image.php" class="btn btn-primary">Upload Your Photos Now</a>
                            </div>
                        </section>
                    <?php 
                }
            }
        ?>
</div>
</body>

</html>