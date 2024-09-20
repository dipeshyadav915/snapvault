<?php
require_once "db.php";
require_once "header.php";
require_once "function.php";

error_reporting(0);
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM `gallery_album` WHERE user_id='$user_id' ";
$sql = mysqli_query($conn, $query);
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
    <!-- <h1 class="text-center pt-4 text-dark-emphasis"><strong>Welcome to Your Album!</strong></h1 > -->
        <?php   
        if (mysqli_num_rows($sql) > 0) {
            echo"<div class='d-flex'>";
            while ($rows = mysqli_fetch_assoc($sql)) {
                $album_name = $rows['album_name'];
                $album_id = $rows['album_id'];
                $description = $rows['description'];
        ?>
        <div class="title p-3">
            <form action="image.php" method="post">
                <input type="hidden" name="album_id" value="<?= $album_id ?>">
                <input type="hidden" name="description" value="<?= $description ?>">
                <button type="submit" class="text-capitalize bg-transparent" style="border:none">
                    <img src="img/album.png" alt="" style="width:120px"><br>
                    <?php echo $album_name ?>
                </button>
            </form>
        </div>
        <?php
            }echo"</div>";
        }else{
            ?>
        <section class="p-4">
            <div class="text-center">
                <h2 class="head">Album-less in a World of Memories?</h2>
                <p class="text-dark-emphasis">Don't let your precious moments collect digital dust! Create your first album and start snapping your way to a happier you. <br>Begin your journey with SnapVault today!</p>
                    <a href="new_album.php" class="btn btn-primary">Snap Out of It! Create Your First Album</a>
            </div>
        </section>
            <?php
        }
        ?>
</div>
</body>

</html>