<?php session_start(); 
    include './includes/header.php';
if (!isset($_SESSION['username'])) {
    header('Location: ./auth/login.php');
    exit();
}
?>


<h2>Welcome, <span style="font-size: 5rem" class="fw-bold text-purple"><?php echo $_SESSION['username']; ?></span></h2>

<a style="position: absolute; top: 10px; right: 10px" class="btn btn-danger" href="./auth/logout.php">Logout Now</a>
