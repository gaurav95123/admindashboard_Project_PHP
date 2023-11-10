<?php
session_start();
include('connect.php'); // Include your database connection script

$error_message = ""; // Initialize the error message variable

if (isset($_SESSION['username'])) {
    header('location:index.php'); // Redirect if the user is already logged in
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform user authentication using a UNION query to check both tables
    
    $query = "SELECT username, password FROM crud_table WHERE username = '$username' AND password = '$password'
              UNION
              SELECT auditee AS username, password FROM auditee_t WHERE auditee = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Authentication successful, set session variables
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header('location:index.php'); // Redirect to the protected page
        exit();
    } else {
        $error_message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
    *{
        margin:0;
    }
       
       body {
           background-image: url('assets/images/lbg.png'); /* Replace 'background-image.jpg' with your image file */
           background-size: cover;
           background-repeat: no-repeat;
           background-attachment: fixed;
           font-family: Arial, sans-serif;           
       }

       .container {
               
           max-width: 300px;
           margin: 0 auto;
           margin-top: 180px;
           padding: 60px;
           background-color: rgba(255, 255, 255, 0.7); /* Add a semi-transparent white background to the form */
           border-radius: 10px;
           box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
             display: grid;
           place-items: center;
       }

       .form-group {
           margin-bottom: 20px;
       }

       .form-group label {
           display: block;
       }

       .form-group input {
           width: 100%;
           padding: 10px;
           margin-top: 5px;
           border: 1px solid #ccc;
           border-radius: 5px;
       }

       .btn {
           padding: 10px 20px;
           background-color: #007BFF;
           color: #fff;
           border: none;
           border-radius: 5px;
           cursor: pointer;
       }
   </style>
</head>
<body>
    <div class="container">
        <h2>Admin Login</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">
                    <i class="fas fa-user"></i> <!-- Font Awesome user icon -->
                    Username:
                </label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">
                    <i class="fas fa-key"></i> <!-- Font Awesome key icon -->
                    Password:
                </label>
                <input type="password" id="password" name="password" required>
                <span id="showPassword" style="cursor: pointer; width: -10px;">Show Password</span>
            </div>
            <div style="color: red;"><?php echo $error_message; ?></div> <!-- Display the error message in red -->
            <button class="btn" type="submit" name="submit">Login</button>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const passwordInput = document.getElementById("password");
        const showPassword = document.getElementById("showPassword");

        showPassword.addEventListener("click", function () {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPassword.textContent = "Hide Password";
            } else {
                passwordInput.type = "password";
                showPassword.textContent = "Show Password";
            }
        });
    });
    </script>
</body>
</html>
