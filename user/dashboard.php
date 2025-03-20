<?php
// Start the session
session_start();

// Check if user is logged in and has user role
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['role'] !== 'user') {
    // Not logged in or not an user, redirect to login page
    header("Location: ../login.php?error=Please login with user credentials to access the dashboard");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KK Auto Garage - Customer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-black">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="IconOnly_TransparentCopy.png" alt="KK Auto Garage Logo" class="logo" style="max-height: 40px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Appointments</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Service History</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="dashboard-container container mt-5">
        <h2 class="dashboard-title text-center mb-4">Welcome, <span id="customer-name">[Customer Name]</span></h2>
        
        <div class="dashboard-actions text-center mb-5">
            <button class="btn btn-outline-info btn-lg" id="book-appointment">Book New Appointment</button>
        </div>

        <div class="upcoming-section card shadow-sm mb-5">
            <div class="card-body">
                <h3 class="card-title">Upcoming Appointments</h3>
                <div class="appointment-list" id="upcoming-appointments">
                    <!-- Populated by JS -->
                </div>
            </div>
        </div>

        <div class="history-section card shadow-sm">
            <div class="card-body">
                <h3 class="card-title">Service History</h3>
                <div class="history-list" id="service-history">
                    <!-- Populated by JS -->
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Your Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="profile-photo mb-3">
                        <img src="default-profile.jpg" alt="Profile Photo" class="rounded-circle" id="profile-photo">
                    </div>
                    <h5 id="modal-customer-name">[Customer Name]</h5>
                    <p id="customer-email" class="text-muted">email@example.com</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" id="modal-logout">Logout</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer bg-dark text-white text-center py-3 mt-5">
        <div class="footer-bottom">
            <p>Copyright © 2025 KK Auto Garage. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>