<?php
session_start();
include 'config.php';

// Initialize variables
$userId = null;
$errors = [];

// Check if user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $userId = $_SESSION['user_id'];
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $vehicleMake = trim($_POST['make'] ?? '');
    $vehicleModel = trim($_POST['model'] ?? '');
    $vehicleYear = trim($_POST['year'] ?? '');
    $appointmentDate = $_POST['date'] ?? '';
    $appointmentTime = $_POST['time'] ?? '';
    $services = $_POST['services'] ?? [];
    
    // Validate form inputs
    if (empty($name)) {
        $errors[] = "Name is required";
    }
    
    if (empty($phone)) {
        $errors[] = "Phone number is required";
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }
    
    if (empty($vehicleMake)) {
        $errors[] = "Vehicle make is required";
    }
    
    if (empty($vehicleModel)) {
        $errors[] = "Vehicle model is required";
    }
    
    if (empty($vehicleYear) || !is_numeric($vehicleYear) || strlen($vehicleYear) != 4) {
        $errors[] = "Valid vehicle year is required (e.g. 2020)";
    }
    
    if (empty($appointmentDate)) {
        $errors[] = "Appointment date is required";
    } else {
        // Check if date is in the future
        $currentDate = date('Y-m-d');
        if ($appointmentDate < $currentDate) {
            $errors[] = "Appointment date must be in the future";
        }
    }
    
    if (empty($appointmentTime)) {
        $errors[] = "Appointment time is required";
    } else {
        // Check if time is within business hours (8:30 AM - 5:00 PM)
        $time = strtotime($appointmentTime);
        $minTime = strtotime('08:30:00');
        $maxTime = strtotime('17:00:00');
        if ($time < $minTime || $time > $maxTime) {
            $errors[] = "Appointment time must be between 8:30 AM and 5:00 PM";
        }
    }
    
    if (empty($services)) {
        $errors[] = "Please select at least one service";
    }
    
    // If there are no errors, save the appointment
    if (empty($errors)) {
        // Convert services array to string
        $servicesStr = implode(', ', $services);
        
        // Prepare SQL statement
        $query = "INSERT INTO Appointments (UserID, Name, Email, Phone, VehicleMake, VehicleModel, 
                  VehicleYear, AppointmentDate, AppointmentTime, ServiceType, Status) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Scheduled')";
        
        $stmt = $conn->prepare($query);
        $stmt->bind_param("isssssssss", $userId, $name, $email, $phone, $vehicleMake, 
                          $vehicleModel, $vehicleYear, $appointmentDate, $appointmentTime, $servicesStr);
        
        if ($stmt->execute()) {
            // Redirect with success message
            header("Location: appointment.php?success=Your appointment has been successfully scheduled for " . date("F j, Y", strtotime($appointmentDate)) . " at " . date("g:i A", strtotime($appointmentTime)));
            exit();
        } else {
            // Database error
            $errors[] = "Database error: " . $conn->error;
        }
    }
    
    // If there are errors, redirect back with error message
    if (!empty($errors)) {
        $errorMsg = implode("<br>", $errors);
        header("Location: appointment.php?error=" . urlencode($errorMsg));
        exit();
    }
} else {
    // If not a POST request, redirect to the appointment form
    header("Location: appointment.php");
    exit();
}
?>