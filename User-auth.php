<?php
function userAuthentication($Email, $Password, $conn)
{   
    if (isset($_POST['login_user'])) {

        $email20  = isset($_POST['Email']) ? $_POST['Email'] : null;
        $password120 = isset($_POST['Password']) ? $_POST['Password'] : null;
    
        if (empty($email20)) {
            array_push($errors, "Email is required");
        }
        if (empty($password120)) {
            array_push($errors, "Password is required");
        }
        if (count($errors) == 0) {
    
            // $query = "SELECT * FROM users WHERE email='$email20' AND password='$password_hash'";
            $query = "SELECT Email, User_Password FROM Users WHERE Email = ? ";
    
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $Email);
            $stmt->execute();
            $stmt->bind_result($Email,$Password);
            $stmt->store_result();
            if ($stmt->num_rows == 1) // Check if the row exists
                {
                if ($stmt->fetch()) // Fetching the contents of the row
                    {
                    // Verify user password
                    if (password_verify($password120, $Password)) {
                        //password_verify("userenteredPassword",PasswordFromDatabase);
    
                        $_SESSION['Email'] = $Email;
                        $_SESSION['success']  = "You are now logged in";
                        $hour                 = time() + 15 * 24 * 60 * 60;
                        setcookie('c_useremail', $email20, $hour);
                        setcookie('c_password', $Password, $hour);
                        header('location: home.php');
    
                    } else {
    
                        array_push($errors, "Password and username does not match");
                    }
    
                }
    
            } else {
    
                array_push($errors, "Invalid Admin account");
            }
    
    
    
        } else {
            array_push($errors, "Unknown Error!");
        }
    }
}
function adminAuthentication($Email, $Password, $conn){
    
    if (isset($_POST['login_admin'])) {

        $email20  = isset($_POST['Email']) ? $_POST['Email'] : null;
        $password120 = isset($_POST['Password']) ? $_POST['Password'] : null;
    
        if (empty($email20)) {
            array_push($errors, "Email is required");
        }
        if (empty($password120)) {
            array_push($errors, "Password is required");
        }
        if (count($errors) == 0) {
    
            // $query = "SELECT * FROM users WHERE email='$email20' AND password='$password_hash'";
            $query = "SELECT AdminEmail, AdminPass FROM WebAdmin WHERE AdminEmail = ? ";
    
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $Email);
            $stmt->execute();
            $stmt->bind_result($Email,$Password);
            $stmt->store_result();
            if ($stmt->num_rows == 1) // Check if the row exists
                {
                if ($stmt->fetch()) // Fetching the contents of the row
                    {
                    // Verify user password
                    if (password_verify($password120, $Password)) {
                        //password_verify("adminenteredPassword",PasswordFromDatabase);
    
                        $_SESSION['Email'] = $Email;
                        $_SESSION['success']  = "You are now logged in";
                        $hour                 = time() + 15 * 24 * 60 * 60;
                        setcookie('c_adminemail', $email20, $hour);
                        setcookie('c_password', $Password, $hour);
                        header('location: home.php');
    
                    } else {
    
                        array_push($errors, "Password and username does not match");
                    }
    
                }
    
            } else {
    
                array_push($errors, "Invalid Admin account");
            }
    
    
    
        } else {
            array_push($errors, "Unknown Error!");
        }
    }
}
?>