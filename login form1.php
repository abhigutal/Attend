<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login form.css">
</head>
<body>
    <div class="login-container">
        <h2>Login Form</h2>
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="Name">Username</label>
                <input type="text" id="Name" name="Name" required min=1>
            </div>
			<!--<div class="form-group">
                <label for="mobile-no">Mobile-no</label>
                <input type="text" id="mobile-no" name="mobile-no" required  pattern="\d{10}" title="Please enter a 10-digit mobile number."><br>
            </div>
			<div class="form-group">
                <label for="email">Email-id</label>
                <input type="email" id="email" name="email" required><br>
            </div>-->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button><br><br>
			<button type="reset">Reset</button>
        </form>
    </div>
</body>
</html>