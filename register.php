<?php
include 'db-connect.php';

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
   // $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
   // $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
   // $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   // $address = mysqli_real_escape_string($conn, $_POST['address']);

    $check_query = "SELECT * FROM users WHERE email='$email' OR username='$username' LIMIT 1";
    $check_result = mysqli_query($conn, $check_query);
    
    if (mysqli_num_rows($check_result) > 0) {
        $error = "Username or Email already exists!";
    } else {
        $query = "INSERT INTO users (username, email, password) 
                  VALUES ('$username', '$email', '$password')";
        
        if (mysqli_query($conn, $query)) {
            header("Location: customer_login.php?registered=success");
            exit();
        } else {
            $error = "Registration failed! Try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f6fa;
        }
        .register-container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 600px;
            animation: slideUp 0.5s ease-in-out;
        }
        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .form-row {
            display: flex;
            gap: 10px;
        }
        .form-row .form-control {
            flex: 1;
        }
    </style>
</head>
<body>
    <div class="register-container text-center">
        <h4 class="text-primary">Registration</h4>
        <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
        <form method="POST">
            <div class="mb-3 form-row">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3 form-row">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
            </div>
            <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
        </form>
        <p class="mt-3">Already have an account? <a href="customer_login.php">Login here</a></p>
        <p><a href="../index.php">Back to Home</a></p>
    </div>
</body>
</html>
