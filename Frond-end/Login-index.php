<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KK Auto Garage - Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="Login-index.css">
</head>
<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-black">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand" href="Home-index.html">
                    <img src="IconOnly_TransparentCopy.png" alt="KK Auto Garage Logo" class="logo">
                </a>
                
                <!-- Hamburger Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!-- Navigation Menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="Home-index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="About-index.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Services-index.html">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Appointment-index.html">Take appointment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Shop-index.html">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contact-index.html">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Login-index.html">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!--The Form-->
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Login to KK Auto Garage</h2>
                        <form action="../User-auth.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter password" required>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select" id="role" required>
                                    <option value="" disabled selected>Select your role</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <div class="text-center mt-3">
                                <a href="#" class="text-muted">Forgot Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">KK Auto Garage</div>
            <div class="footer-column">
                <h4>Reach to Us</h4>
                <p>188 Rue Brière, Saint-Jérôme</p>
                <p>(438)-778-5775</p>
                <p>kkautogarage@gmail.com</p>
                <p>www.kkautogarage.com</p>
            </div>
            <div class="footer-column">
                <h4>Opening Hours</h4>
                <p>Mon-Fri : 8:30 - 17:30</p>
                <p>Saturday : 8:30 - 12:00</p>
            </div>
            <div class="footer-column">
                <h4>Quick Links</h4>
                <p>About Us</p>
                <p>Why with Us</p>
                <p>Our Services</p>
                <p>How It Works</p>
                <p>Appointment</p>
            </div>
            <div class="footer-column">
                <h4>Social Media Links</h4>
                <div class="social-icons">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-youtube"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-whatsapp"></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright © 2025 KK Auto Garage. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <!-- <script src="login.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>