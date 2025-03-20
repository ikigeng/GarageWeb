<?php
// Start the session
session_start();

// Check if user is logged in and has admin role
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['role'] !== 'admin') {
    // Not logged in or not an admin, redirect to login page
    header("Location: ../login.php?error=Please login with admin credentials to access the dashboard");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KK Auto Garage - Admin Dashboard</title>
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="#appointments-section">Appointments</a></li>
                        <li class="nav-item"><a class="nav-link" href="#products-section">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="dashboard-container container mt-5">
        <h2 class="dashboard-title text-center mb-4">Admin Dashboard</h2>

        <div class="stats-grid row row-cols-1 row-cols-md-4 g-4 mb-5">
            <div class="col"><div class="stat-card card shadow-sm"><h3>Total Appointments</h3><p class="stat-value" id="total-appointments">0</p></div></div>
            <div class="col"><div class="stat-card card shadow-sm"><h3>Pending Services</h3><p class="stat-value" id="pending-services">0</p></div></div>
            <div class="col"><div class="stat-card card shadow-sm"><h3>Total Customers</h3><p class="stat-value" id="total-customers">0</p></div></div>
            <div class="col"><div class="stat-card card shadow-sm"><h3>Revenue Today</h3><p class="stat-value" id="revenue-today">$0</p></div></div>
        </div>

        <!-- Appointments Section -->
        <div class="appointments-section card shadow-sm mb-5" id="appointments-section">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="card-title">Appointments</h3>
                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addAppointmentModal">Add Appointment</button>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="appointments-table"></tbody>
                </table>
            </div>
        </div>

        <!-- Products Section -->
        <div class="products-section card shadow-sm" id="products-section">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="card-title">Products</h3>
                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="products-table"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Appointment Modal -->
    <div class="modal fade" id="addAppointmentModal" tabindex="-1" aria-labelledby="addAppointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAppointmentModalLabel">Add Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add-appointment-form">
                        <div class="mb-3">
                            <label for="appt-customer" class="form-label">Customer</label>
                            <input type="text" class="form-control" id="appt-customer" required>
                        </div>
                        <div class="mb-3">
                            <label for="appt-service" class="form-label">Service</label>
                            <input type="text" class="form-control" id="appt-service" required>
                        </div>
                        <div class="mb-3">
                            <label for="appt-date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="appt-date" required>
                        </div>
                        <div class="mb-3">
                            <label for="appt-time" class="form-label">Time</label>
                            <input type="time" class="form-control" id="appt-time" required>
                        </div>
                        <div class="mb-3">
                            <label for="appt-status" class="form-label">Status</label>
                            <select class="form-select" id="appt-status" required>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save-appointment">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Appointment Modal -->
    <div class="modal fade" id="editAppointmentModal" tabindex="-1" aria-labelledby="editAppointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAppointmentModalLabel">Edit Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-appointment-form">
                        <input type="hidden" id="edit-appt-id">
                        <div class="mb-3">
                            <label for="edit-appt-customer" class="form-label">Customer</label>
                            <input type="text" class="form-control" id="edit-appt-customer" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-appt-service" class="form-label">Service</label>
                            <input type="text" class="form-control" id="edit-appt-service" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-appt-date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="edit-appt-date" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-appt-time" class="form-label">Time</label>
                            <input type="time" class="form-control" id="edit-appt-time" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-appt-status" class="form-label">Status</label>
                            <select class="form-select" id="edit-appt-status" required>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="update-appointment">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add-product-form">
                        <div class="mb-3">
                            <label for="product-name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="product-name" required>
                        </div>
                        <div class="mb-3">
                            <label for="product-price" class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control" id="product-price" required>
                        </div>
                        <div class="mb-3">
                            <label for="product-stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="product-stock" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save-product">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-product-form">
                        <input type="hidden" id="edit-product-id">
                        <div class="mb-3">
                            <label for="edit-product-name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="edit-product-name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-product-price" class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control" id="edit-product-price" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-product-stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="edit-product-stock" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="update-product">Update</button>
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