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
    'upcomingAppointments' => [],
    'purchaseHistory' => []
];

// Get user basic info
$userQuery = "SELECT Email FROM Users WHERE UserID = ?";
$stmt = $conn->prepare($userQuery);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    // Extract username from email (part before @)
    $username = explode('@', $user['Email'])[0];
    $userData['name'] = $username;
    $userData['email'] = $user['Email'];
    
    // Get upcoming appointments
    $apptQuery = "SELECT ServiceType, AppointmentDate, AppointmentTime, Status 
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
            'time' => $appointment['AppointmentTime'],
            'status' => $appointment['Status']
        ];
    }
    
    // Get purchase history (both products and services)
    $historyQuery = "SELECT 
                        ph.PurchaseID,
                        ph.Purchase_date,
                        ph.Payment_Method,
                        p.ProductName,
                        p.Price as ProductPrice,
                        gs.ServiceName,
                        gs.MinimumPrice as ServicePrice
                     FROM 
                        PurchaseHistory ph
                     LEFT JOIN 
                        Products p ON ph.ProductID = p.ProductID
                     LEFT JOIN 
                        GarageServices gs ON ph.ServiceID = gs.ServiceID
                     WHERE 
                        ph.UserID = ?
                     ORDER BY 
                        ph.Purchase_date DESC";
                        
    $historyStmt = $conn->prepare($historyQuery);
    $historyStmt->bind_param("i", $userId);
    $historyStmt->execute();
    $historyResult = $historyStmt->get_result();
    
    while ($purchase = $historyResult->fetch_assoc()) {
        // Determine if it's a product or service purchase
        $itemName = !empty($purchase['ProductName']) ? $purchase['ProductName'] : $purchase['ServiceName'];
        $itemPrice = !empty($purchase['ProductPrice']) ? $purchase['ProductPrice'] : $purchase['ServicePrice'];
        $itemType = !empty($purchase['ProductName']) ? 'Product' : 'Service';
        
        $userData['purchaseHistory'][] = [
            'id' => $purchase['PurchaseID'],
            'date' => $purchase['Purchase_date'],
            'item' => $itemName,
            'price' => $itemPrice,
            'type' => $itemType,
            'paymentMethod' => $purchase['Payment_Method']
        ];
    }
}

// Return user data as JSON
header('Content-Type: application/json');
echo json_encode($userData);
?>