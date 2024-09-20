 <?php
error_reporting(0);
require_once "db.php";
if ($_SESSION['user_id'] != null) {
    header("location: home.php");
}

$loginid = $_POST["loginid"];
$password = md5($_POST["password"]);
$query = "SELECT * FROM `myguests` WHERE username = '$loginid' or email='$loginid'";
$sql = mysqli_query($conn, $query);
if (isset($_POST["submit"])) {
    if (mysqli_num_rows($sql) > 0) {
        $user = mysqli_fetch_assoc($sql);
        $hash_password = $user["password"];
        if ($hash_password == $password) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['contact'] = $user['contact'];
            $_SESSION['email'] = $user['email'];
            header("location:home.php");
        } else {
             echo '<div class="alert alert-danger custom-alert fade-out" role="alert">Oops! That password didn’t work. Did your fingers slip? Try again, champ!</div>';

        }
    } else {
            echo '<div class="alert alert-danger custom-alert fade-out" role="alert">User not found! Maybe try registering first before you start the adventure?</div>';

    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>SnapVault</title>
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
<body class="login-body">
    <div class="album_form m-auto w-50">
        <h2 class="form_heading">LOGIN</h2>
        <form action="" method="post">
            <label>Email/Username:</label>
            <input type="text" name="loginid" class="form-control" placeholder="Enter your username" required><br>
            <label>Password:</label>
            <input type="password" name="password" class="form-control" placeholder="Your magic word" required><br>
            <input type="submit" name="submit" class="form-control" value="Login">
            <p>Don't have an account? <a href="reg.php">Sign up</a> now</p>
        </form>
    </div>
<script type="text/javascript" src="script.js"></script>
</body>
</html>

