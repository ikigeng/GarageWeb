<?php
session_start();
include 'config.php'; // Make sure this points to your correct config file location

// Initialize errors array
$errors = [];

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form inputs
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $role = isset($_POST['role']) ? $_POST['role'] : '';
    
    // Validate inputs
    if (empty($email)) {
        $errors[] = "Email is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }
    if (empty($role)) {
        $errors[] = "Role selection is required";
    }
    
    // If no validation errors, attempt authentication
    if (count($errors) == 0) {
        // Query to check user credentials based on role
        $query = "SELECT * FROM Users WHERE Email = ? AND Role = ?";
        
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $email, $role);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            
            // Verify password
            if (password_verify($password, $user['User_Password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['UserID'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['Role'];
                $_SESSION['logged_in'] = true;
                
                // Redirect based on role
                if ($role == 'admin') {
                    header('Location: admin/dashboard.php');
                } else {
                    header('Location: user/dashboard.php');
                }
                exit();
            } else {
                // Password incorrect
                header('Location: login.php?error=Invalid email or password');
                exit();
            }
        } else {
            // User not found
            header('Location: login.php?error=Invalid email, password, or role');
            exit();
        }
    } else {
        // Validation errors
        $error_message = implode("<br>", $errors);
        header("Location: login.php?error=$error_message");
        exit();
    }
} else {
    // If not accessed via POST, redirect to login
    header('Location: login.php');
    exit();
}

?>