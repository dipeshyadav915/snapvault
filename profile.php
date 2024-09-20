 <?php
     error_reporting(0);
    require_once "db.php";
    require_once "function.php";
    require_once "header.php";
    $name = $_POST['name'];
    $username = $_POST['username'];
    $userid = $_SESSION['user_id'];
    $query = "UPDATE `myguests` SET `name`='$name',`username`='$username' WHERE id='$userid'";
    if (isset($_POST['changeinfo'])) {
        mysqli_query($conn, $query);
    echo '<div class="alert alert-success custom-alert fade-out" role="alert">
    🎉 Hooray! Your profile info is now so fresh and fabulous, even your cat is impressed! Check it out before the excitement fades!
</div>';


    }

    // changing password
    $password = md5($_POST["password"]);
    $repassword = md5($_POST["repassword"]);

    $p_query = "UPDATE `myguests` SET `password`='$password' WHERE id='$userid'";
    if (isset($_POST["changepw"])) {
        if ($repassword == $password) {
            mysqli_query($conn, $p_query);
    echo '<div class="alert alert-success custom-alert fade-out" role="alert">
    🎉 Whoa! Your password is now so secure it just high-fived itself! Remember it before it becomes a top-secret code!</div>';

        } else {
    echo '<div class="alert alert-danger custom-alert fade-out" role="alert">
    🚨 Oops! Your password check failed. They’re more mismatched than socks in the laundry! Try again to make them dance in sync.
</div>';

        }
    }
?>
 <!DOCTYPE html>
 <html>
 <head>
     <title>SnapVault</title>
     <link rel="stylesheet" href="style.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <style>
     </style>
 </head>

 <body>
    <main class="d-flex justify-content-evenly px-3 bg-light">
        <div class="p-4">
            <h1 class="head">Profile</h1>
            <form action="" method="post">
                <label>Name</plabel>
                <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['name'] ?>" required><br>

                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['username'] ?>" ><br>

                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email'] ?>"  disabled><br>

                <label>Contact</label>
                <input type="number" class="form-control" name="contact" value="<?php echo $_SESSION['contact'] ?>"  disabled><br>
                <p class="text-dark-emphasis">Update your personal information to keep your profile current. Make changes to your name, email, and other details with ease.</p>
                <input name="changeinfo" class="form-control bg-primary text-light" type="submit" value="Submit Changes">
            </form>
        </div>
        <div class="p-4 border-start">
            <h1 class="head">Change Password</h1>
            <form action="" method="post">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" name="password"><br>

                <label for="conf_password">Confirm Password</label>
                <input type="password" class="form-control" name="repassword" required><br>
                
                <p class="text-dark-emphasis">For your security, remember to choose a strong, unique password. You can update it anytime if needed.</p>
                <input name="changepw" class="form-control bg-primary text-light" type="submit" value="Change password">
            </form>
        </div>
    </main>
    <?php require_once "footer.php"; ?>
<script type="text/javascript" src="script.js"></script>

 </body>
 </html>