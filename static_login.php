<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Login</title>
</head>
<body>
    
<?php
// Define individual users
$admin1 = array("role" => "Admin", "username" => "admin", "password" => "AdminPass123");
$admin2 = array("role" => "Admin", "username" => "renmark", "password" => "PogiPass");
$contentManager1 = array("role" => "Content Manager", "username" => "raechel", "password" => "Capiz2023");
$contentManager2 = array("role" => "Content Manager", "username" => "nicole", "password" => "Apostol22");
$systemUser1 = array("role" => "System User", "username" => "carolina", "password" => "Sanchez89");
$systemUser2 = array("role" => "System User", "username" => "adrian", "password" => "Atienza77");

// Combine users into the main array
$userRecords = array($admin1, $admin2, $contentManager1, $contentManager2, $systemUser1, $systemUser2);

// Initialize variables for feedback message and alert class
$feedbackMessage = '';
$alertStatus = 'hidden';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $chosenRole = $_POST['userRole'];
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // Check if the entered credentials match any user
    $isUserFound = false;
    foreach ($userRecords as $user) {
        if ($user['role'] === $chosenRole && $user['username'] === $enteredUsername && $user['password'] === $enteredPassword) {
            $feedbackMessage = "Welcome, {$chosenRole} - {$enteredUsername}!";
            $alertStatus = 'success-message';
            $isUserFound = true;
            break;
        }
    }

    // If no match found, show error message
    if (!$isUserFound) {
        $feedbackMessage = "Invalid Username or Password";
        $alertStatus = 'error-message';
    }
}
?>

<!-- Notification Box -->
<div class="notification <?php echo $alertStatus; ?>">
    <?php echo $feedbackMessage; ?>
</div>

<!-- Login Form -->
<div class="login-form">
    <h3 class="form-title">User Login</h3>
    <form method="post" action="">
        <div>
            <label for="userRole">User Role</label>
            <select name="userRole" id="userRole" required>
                <option value="Admin">Admin</option>
                <option value="Content Manager">Content Manager</option>
                <option value="System User">System User</option>
            </select>
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit">Log In</button>
    </form>
</div>

<style>
    /* General Layout */
    body, html {
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
    }

    /* Notification Styling */
    .notification {
        width: 100%;
        max-width: 350px;
        padding: 10px;
        text-align: center;
        margin-top: 20px;
        border-radius: 5px;
    }
    .hidden {
        display: none;
    }
    .success-message {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    .error-message {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    /* Login Form Styling */
    .login-form {
        max-width: 350px;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        margin-top: 40px;
    }

    .form-title {
        text-align: center;
        font-size: 1.5em;
        margin-bottom: 20px;
    }

    /* Form Elements */
    label {
        display: block;
        margin-bottom: 5px;
    }
    input[type="text"],
    input[type="password"],
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    /* Button Styling */
    button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }
    button:hover {
        background-color: #0056b3;
    }
</style>

</body>
</html>
