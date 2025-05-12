<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login/Signup Page</title>
  <!-- Bootstrap 5 CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(135deg, #6f42c1, #d63384);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .signup-card {
      background: #fff;
      border-radius: 1rem;
      box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
      max-width: 400px;
      width: 100%;
      padding: 2rem;
    }
    .form-control:focus {
      box-shadow: 0 0 0 0.25rem rgba(111, 66, 193, 0.25);
    }
    .btn-primary {
      background-color: #6f42c1;
      border-color: #6f42c1;
    }
    .btn-primary:hover {
      background-color: #5a3399;
      border-color: #5a3399;
    }
    @media (max-width: 400px) {
      .signup-card {
        margin: 1rem;
        padding: 1.5rem;
      }
    }
  </style>
</head>