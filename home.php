<?php
require_once "db.php";
require_once "header.php";
require_once "function.php";

error_reporting(0);
if (isset($_POST['delete_image'])) {
    $image_id = $_POST['photo_id'];
    $delete = "DELETE FROM `gallery_photos` WHERE photo_id='$image_id'";
    mysqli_query($conn, $delete);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SnapVault</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f8552ba515.js" crossorigin="anonymous"></script>
</head>
<style>
    .land_page,
    .step_page{
        width:100vw;
        height:92vh;
        background-image: url(img/memo4.jpg);
        background-size: cover;
        background-repeat: no-repeat;
    }
    .step_page{
        height:fit-content;
        background-image: url(img/step.jpg);
    }
    .welcome{
        font-size:80px
    }
</style>
<body>
    <section class="land_page text-white text-center p-5 d-flex align-items-center justify-content-center ">
        <div>
            <p class="welcome text-capitalize fw-bolder typing-text">Welcome, <?php echo $_SESSION['name']; ?>!</p>

            <h5>We're glad you're here. Start storing your memories with SnapVault today.</h5>
        </div>
    </section>
    <section>
            <div class="p-5 d-flex align-items-center justify-content-around bg-light">
                <div class="p-4 text-center">
                    <h2>Preserve Your Memories</h2>
                    <p>At SnapVault, we understand that every picture tells a story. Our mission is to help you store, organize, and cherish your memories in a safe and secure environment. Whether it's a snapshot from your latest adventure or a treasured family photo, SnapVault is here to keep your memories alive.</p>
                </div>
                <img src="img/vault.png" alt="img">
            </div>
        </section>  
    <section class="step_page p-5 d-flex align-items-center justify-content-around">
            <div class="step p-4 text-center w-25 text-white">
                <h3><strong>01</strong></h3>
                <h4 class="steps">Create Your Album</h4>
                <!-- <img src="img/vault.png" alt="img" class="w-75"> -->
                <p> Create a new album to begin organizing your cherished memories.</p>
            </div>
            <div class="step p-4 text-center w-25 text-white">
                <h3><strong>02</strong></h3>
                <h4 class="steps">Upload Your Memories</h4>
                <!-- <img src="img/image_upload.png" alt="img" class="w-50"> -->
                <p> Easily upload your images to keep them safe and accessible, stored forever</p>
            </div>
            <div class="step p-4 text-center w-25 text-white">
                <h3><strong>03</strong></h3>
                <h4 class="steps">Relive Your Memories</h4>
                <!-- <img src="img/vault.png" alt="img" class="w-50"> -->
                <p>Access your stored images anytime to revisit and cherish your favorite memories.</p>
            </div>
    </section>
    <section>
        <div class="p-5 d-flex align-items-center justify-content-around bg-light">
            <div class="p-4 text-center">
                <h2>Join the SnapVault Community</h2>
                <p>Don’t let your memories fade away. Start storing your images with SnapVault today and ensure they’re always safe, secure, and ready to be relived.</p>
            </div>
        </div>
    </section>
<?php require_once "footer.php"?>
<script type="text/javascript" src="script.js"></script>
</body>

</html>