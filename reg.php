<?php
error_reporting(0);
require_once "db.php";
if ($_SESSION['user_id'] != null) {
    header("location: home.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get form input values
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);

    // Check if the username or email already exists
    $s_query = "SELECT * FROM `myguests` WHERE username='$username' OR email='$email'";
    $sql = mysqli_query($conn, $s_query);  

    if (mysqli_num_rows($sql) == 0) {
        // Insert the new user record
        $query = "INSERT INTO `myguests`(`name`, `username`, `email`, `password`, `contact`) VALUES ('$name','$username','$email','$password','$contact')";
        mysqli_query($conn, $query);
        header("Location: index.php");
    } else {
    echo '<div class="alert alert-danger custom-alert fade-out" role="alert">Oops! That username or email is already taken. Looks like someone beat you to it—try another one!</div>';

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
    .custom-alert {
  position: fixed;
  top: 50px;
  right: 20px;
  z-index: 9999;
  width: auto;
  padding: 10px 20px;
  border-radius: 5px;
  font-size: 16px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}
</style>
<body class="reg-body">
        <div class="album_form m-auto w-50">
            <h2 class="text-center text-white form_heading">Register</h2>
            <form action="" method="post">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Your full name, please!" required><br>
                <label>Username:</label>
                <input type="text" name="username" class="form-control" placeholder="Pick a cool username" required><br>
                <label>Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Your email address" required><br>
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Type...but don't let anyone see" required><br>
                <label>Contact:</label>
                <input type="number" name="contact" class="form-control" placeholder="How can we reach you?" required>
                <br><input type="submit" name="submit" value="Register" class="form-control">
                <p>Already have account? <a href="index.php">LOGIN</a> now</p>
            </form>
        </div>
</body>
</html>