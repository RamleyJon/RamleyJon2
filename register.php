<?php
// Include the database connection
require 'database.php';

// Check if the signup form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    // Check if password and confirm match
    if ($password !== $confirm) {
        die("Passwords do not match.");
    }

    // Prepare and execute the insert query
    $stmt = $connection->prepare("INSERT INTO rjmtbl (Email, Username, Password, Confirm) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $username, $password, $confirm);

    if ($stmt->execute()) {
        // Use echo to alert registration success
        echo "<script>alert('Registered successfully! You can now log in.');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];

    // Prepare and execute the select query
    $stmt = $connection->prepare("SELECT * FROM rjmtbl WHERE Username = ? AND Password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Successful login, redirect to menu.php
        header("Location: menu.php");
        exit(); // Ensure no further code is executed after the redirect
    } else {
        echo "<script>alert('Invalid username or password.');</script>";
    }

    // Close statement
    $stmt->close();
}

// Close the database connection
$connection->close();
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login & Signup</title>
    <link rel="stylesheet" href="style1.css" />
</head>
<body>
    <section class="wrapper">
        <div class="form signup">
            <header>Signup</header>
            <form action="" method="post"> <!-- Action is empty to submit to the same page -->
                <input type="email" name="email" placeholder="Email address" required />
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="password" name="confirm" placeholder="Confirm Password" required />
                <div class="checkbox">
                    <input type="checkbox" id="signupCheck" required />
                    <label for="signupCheck">I accept all terms & conditions</label>
                </div>
                <input type="submit" name="signup" value="Signup" />
            </form>
        </div>

        <div class="form login">
            <header>Login</header>
            <form action="" method="post"> <!-- Action is empty to submit to the same page -->
                <input type="text" name="login_username" placeholder="Username" required />
                <input type="password" name="login_password" placeholder="Password" required />
                <a href="#">Forgot password?</a>
                <input type="submit" name="login" value="Login" />
            </form>
        </div>

        <script>
            const wrapper = document.querySelector(".wrapper"),
                signupHeader = document.querySelector(".signup header"),
                loginHeader = document.querySelector(".login header");

            loginHeader.addEventListener("click", () => {
                wrapper.classList.add("active");
            });
            signupHeader.addEventListener("click", () => {
                wrapper.classList.remove("active");
            });
        </script>
    </section>
</body>
</html>
