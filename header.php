<?php
require_once "function.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="px-4 pt-2 pb-1 d-flex bg-white justify-content-between">
    <div class="logo">
        <a href="home.php">
            SanpVault
        </a>
    </div>
    <ul class="d-flex m-0 p-0">
        <li class="nav-item"><a href="home.php" class="text-decoration-none nav-link">Home</a></li>
        <li class="nav-item"><a href="album.php" class="text-decoration-none nav-link">Album</a></li>
        <li class="nav-item"><a href="new_album.php" class="text-decoration-none nav-link">New Album</a></li>
        <li class="nav-item"><a href="upload.php" class="text-decoration-none nav-link">Upload Image</a></li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link"><?php echo $_SESSION['name']; ?></a>
            <ul class="dropdown-content">
                <li><a class="dropdown-item border-bottom" href="profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>

</body>

</html>