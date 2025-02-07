<?php
function updateUserProfile($userId, $newDetails, $conn) {
    // Prepare an SQL statement to update user profile details
    $sql = "UPDATE users SET 
                name = ?, 
                email = ?, 
                phone = ?, 
                address = ? 
            WHERE id = ?";

    // Initialize a statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the statement
    $stmt->bind_param("ssssi", 
        $newDetails['name'], 
        $newDetails['email'], 
        $newDetails['phone'], 
        $newDetails['address'], 
        $userId
    );

    // Execute the statement
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

    // Close the statement
    $stmt->close();
}


function updateUserPassword($userId, $newPassword, $conn) {
    // Prepare an SQL statement to update user password
    $sql = "UPDATE users SET password = ? WHERE id = ?";

    // Initialize a statement
    $stmt = $conn->prepare($sql);

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Bind parameters to the statement
    $stmt->bind_param("si", $hashedPassword, $userId);

    // Execute the statement
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

    // Close the statement
    $stmt->close();
}
?>