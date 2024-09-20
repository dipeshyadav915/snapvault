<?php
require_once "db.php";
require_once "function.php";
require_once "header.php";

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
.createAlbum {
width:100vw;
height:100vh;
  background-image: url(img/memo2.jpg);
  background-size: cover;
  background-repeat: no-repeat;
}
.album_form{
    margin-top: -11%;
    margin-left: 60%;
    position: absolute;
    top: 88%; 
    right: 10%; 
    z-index: 10;
    width:40%
}
.rotate{
transform:rotate(-20deg);
}
</style>

<body>
    <?php
error_reporting(0);
$folderName = $_POST["album"];
$description = $_POST["description"];
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO `gallery_album`(`album_name`,`user_id`,`description`) VALUES ('$folderName','$user_id','$description')";
$s_query = "SELECT * FROM `gallery_album` WHERE album_name='$folderName' AND user_id='$user_id'";
$sql = mysqli_query($conn, $s_query);
if (isset($_POST["submit"])) {
    if (mysqli_num_rows($sql) == 0) {
        mysqli_query($conn, $query); 
echo '<div class="alert alert-success custom-alert fade-out" role="alert">
    🎉 Woohoo! The folder has been created successfully. Your files just got a brand new home!
</div>';
    } else {
echo '<div class="alert alert-danger custom-alert fade-out" role="alert">
    Uh-oh! The folder creation crew went on a coffee break. Looks like we couldn’t create that folder. Maybe try again when they’re back!
</div>';
    }
}
?>
<section class="createAlbum text-light p-5 d-flex align-items-center" >
<div>
    <h2>Create a New Album</h2>
    <p>Ready to organize your photos<strong>?</strong> Fill out the details below to start organizing your memories. <br> Give your album a name that brings a smile to your face!
    </p>
</div>
<div class="album_form">
        <h2 class="form_heading" style="text-align:center">Create Album</h2>
        <form action="" method="post">
            <label>Album Name:</label>
            <input type="text" name="album" class="form-control" placeholder="Album Name" required><br>
            <label>Description:</label>
            <textarea name="description" id="description" class="form-control" placeholder="Add a short description to give your album a personal touch." ></textarea><br>
            <input type="submit" name="submit" value="Create" class="form-control">
        </form>
    </div>
</section>
    <div class="description p-5 d-flex align-items-center justify-content-around bg-light">
        <img src="img/document.png" alt="img" class="w-25 rotate">
        <div class="p-4 text-center">
        <h2>DESCRIPTION</h2>
        <p>Add a little note about your album.<br>Add a little note about your album. It could be about the theme, the occasion, or just a sweet message to yourself. Whether it’s a special memory, a fun adventure, or a collection of your favorite things, let your words give your album that extra personal touch. Make it as heartfelt or as playful as you like!</p>
        </div>
    </div>
<?php require_once "footer.php"?>
<script type="text/javascript" src="script.js"></script>

</body>

</html>