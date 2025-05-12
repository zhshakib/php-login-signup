<?php 
    session_start();
    include_once '../includes/header.php';
    include_once '../config/db.php';

    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        if ($password !== $confirmPassword) {
            $_SESSION['error'] = 'Passwords do not match';
            header('Location: ./signup.php');
            exit();
        }

        $user = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $user->bindParam(':email', $email);
        $user->execute();

        if ($user->rowCount() > 0) {
            $_SESSION['error'] = 'Email already exists';
            header('Location: ./signup.php');
            exit();
        }

        $user = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $user->bindParam(':username', $username);
        $user->bindParam(':email', $email);
        $user->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
        $user->execute();

        $_SESSION['success'] = 'You are signed up successfully. Now you can login.';
        header('Location: ./login.php');
        exit();
    }
?>

<body>
  <div class="signup-card">
    <h2 class="mb-4 text-center fw-bold text-purple">Create Account</h2>
    <form method="POST" action="./signup.php">
      <div class="mb-3">
        <label for="username" class="form-label fw-semibold">Username</label>
        <input name="username" type="text" class="form-control" value= "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; unset($_SESSION['username']); ?>" id="username" placeholder="Enter username" required />
      </div>
      <div class="mb-3">
        <label for="email" class="form-label fw-semibold">Email address</label>
        <input name="email" type="email" class="form-control" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; unset($_SESSION['email']); ?>" id="email" placeholder="name@example.com" required />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label fw-semibold">Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Enter password" required />
      </div>
      <div class="mb-4">
        <label for="confirmPassword" class="form-label fw-semibold">Confirm Password</label>
        <input name="confirmPassword" type="password" class="form-control" id="confirmPassword" placeholder="Confirm password" required />
      </div>
      <div class="error-message text-center mb-3 text-danger fw-semibold"><?php echo isset($_SESSION['error']) ? $_SESSION['error'] : ''; unset($_SESSION['error']);?></div>
      <button type="submit" class="btn btn-primary w-100 fw-bold">Sign Up</button>
    </form>
    <p class="text-center fw-semibold mt-3">Already have an account? <a class="fw-semibold text-purple text-decoration-none" href="./login.php">Login</a></p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

