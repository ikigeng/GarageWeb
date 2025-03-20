<?php
session_start();
include '../config.php';

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['role'] !== 'user') {
    // Return error if not authenticated
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Not authenticated']);
    exit();
}

// Get user ID from session
$userId = $_SESSION['user_id'];

// Initialize response array
$userData = [
    'name' => '',
    'email' => '',
    'profilePhoto' => 'default-profile.jpg',
    'upcomingAppointments' => [],
    'serviceHistory' => []
];

// Get user basic info
$userQuery = "SELECT Username, Email FROM Users WHERE UserID = ?";
$stmt = $conn->prepare($userQuery);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $userData['name'] = $user['Username'];
    $userData['email'] = $user['Email'];
    
    // Check if user has a profile photo
    // This assumes you have a UserProfiles table with profile photos
    $profileQuery = "SELECT ProfilePhoto FROM UserProfiles WHERE UserID = ?";
    $profileStmt = $conn->prepare($profileQuery);
    $profileStmt->bind_param("i", $userId);
    $profileStmt->execute();
    $profileResult = $profileStmt->get_result();
    
    if ($profileResult->num_rows === 1) {
        $profile = $profileResult->fetch_assoc();
        if (!empty($profile['ProfilePhoto'])) {
            $userData['profilePhoto'] = $profile['ProfilePhoto'];
        }
    }
    
    // Get upcoming appointments
    $apptQuery = "SELECT ServiceType, AppointmentDate, AppointmentTime 
                  FROM Appointments 
                  WHERE UserID = ? AND AppointmentDate >= CURDATE() 
                  ORDER BY AppointmentDate ASC, AppointmentTime ASC";
    $apptStmt = $conn->prepare($apptQuery);
    $apptStmt->bind_param("i", $userId);
    $apptStmt->execute();
    $apptResult = $apptStmt->get_result();
    
    while ($appointment = $apptResult->fetch_assoc()) {
        $userData['upcomingAppointments'][] = [
            'service' => $appointment['ServiceType'],
            'date' => $appointment['AppointmentDate'],
            'time' => $appointment['AppointmentTime']
        ];
    }
    
    // Get service history
    $historyQuery = "SELECT ServiceType, ServiceDate, Status 
                     FROM ServiceHistory 
                     WHERE UserID = ? 
                     ORDER BY ServiceDate DESC";
    $historyStmt = $conn->prepare($historyQuery);
    $historyStmt->bind_param("i", $userId);
    $historyStmt->execute();
    $historyResult = $historyStmt->get_result();
    
    while ($service = $historyResult->fetch_assoc()) {
        $userData['serviceHistory'][] = [
            'service' => $service['ServiceType'],
            'date' => $service['ServiceDate'],
            'status' => $service['Status']
        ];
    }
}

// Return user data as JSON
header('Content-Type: application/json');
echo json_encode($userData);
?>