<?php
require_once "db.php";
require_once "function.php";
require_once "header.php";

error_reporting(0);
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM gallery_album WHERE user_id= '$user_id'";
$sql = mysqli_query($conn, $query);

if (isset($_POST['submit'])) {
    $sfile = $_POST["album"];
    $files = $_FILES["photo"];
    $total_files = count($files["name"]);
    
    for ($i = 0; $i < $total_files; $i++) {
        $file = $files["name"][$i];
        $targetdir = "uploads/" . $file;
        if (file_exists($targetdir)) {

            echo '<div class="alert alert-danger custom-alert fade-out" role="alert">
    Whoa there! The file <strong>'. $file.'</strong> is already chilling in the Album. Try giving it a new name   !
</div>';

        } else {
            if (move_uploaded_file($files["tmp_name"][$i], $targetdir)) {
                $s_query = "INSERT INTO gallery_photos(album_id, user_id, photo_link) VALUES ('$sfile','$user_id','$file')";
                mysqli_query($conn, $s_query);
                header("Location: album.php");

            } else {
                echo '<div class="alert alert-danger custom-alert fade-out" role="alert">
    Oops! The file <strong>'. $file.'</strong> decided to take a vacation instead of uploading. Maybe try again after it comes back!
</div>';

            }
        }
    }
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SnapVault</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
.upload_form {
    width:100vw;
    height:100vh;
    background-image: url(img/memo1.jpg);
    background-size: cover;
    background-repeat: no-repeat;
}
</style>
<body>
<section class="p-5">
    <div class="text-center">
        <h2 class="head">Add Images to Your Album</h2>
        <p>Select an album from your collection where you want to showcase your new photos. Choose your images from your device and effortlessly add them to your personalized gallery. Relive your favorite memories as you organize them just the way you like. Whether it’s a special moment or a fun snapshot, keep your memories safe and beautifully arranged. It’s your story, told your way.<br> It’s as easy as pie!</p>
    </div>
</section>
<section class="upload_form p-5 h-auto">
    <div class="album_form w-50 m-auto">
        <h2 class="text-center text-white form_heading">Upload Image</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Album Name:</label>
            <select name="album" id="album" class="form-control" required>
                <option value=""> -- Select -- </option>
                <?php
                while ($album = mysqli_fetch_assoc($sql))
                    echo '<option value="' . $album['album_id'] . '">' . $album['album_name'] . ' </option>'
                ?>
            </select><br>
            <label>Upload Photo:</label>
            <input type="file" name="photo[]" id="photo" value="Select images" class="form-control" multiple accept=".jpeg,.jpg,.png" required><br>
            <input type="submit" name="submit" value="Upload" class="form-control">
        </form>
    </div>
</section>
<?php
require_once "footer.php"
?>
<script type="text/javascript" src="script.js"></script>
</body>
</html> 