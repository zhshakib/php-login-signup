<?php
    session_start();
    include '../includes/header.php';
    include '../config/db.php';

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $user->bindParam(':email', $email);
        $user->execute();

        $user = $user->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header('Location: ../index.php');
            exit();
        } else {
            $_SESSION['error'] = 'Invalid email or password';
            header('Location: ./login.php');
            exit();
        }
    }
?>

<body>

    <div class="signup-card">
        <h2 class="mb-4 text-center fw-bold text-purple">Login</h2>
         <?php 
    if (isset($_SESSION['success'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> ' . $_SESSION['success'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        unset($_SESSION['success']);
    }
    ?>
        <form method="POST" action="./login.php">
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email address</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Enter password" required />
            </div>
            <div class="error-message text-center mb-3 text-danger fw-semibold"><?php echo isset($_SESSION['error']) ? $_SESSION['error'] : ''; unset($_SESSION['error']);?></div>
            <button type="submit" class="btn btn-primary w-100 fw-bold">Login</button>
        </form>
        <p class="text-center fw-semibold mt-3"> Don't have an account? <a class="fw-semibold text-purple text-decoration-none" href="./signup.php">Sign Up</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

