<!DOCTYPE html>
<!-- TODO: theres a lot to fix here -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KK Auto Garage - Appointment</title>
   <link rel="stylesheet" href="css/Appointment.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="header-content">
                <div class="logo">LOGO</div>
                <nav class="nav-menu">
                    <a href="About.php">About</a>
                    <a href="Services.php">Services</a>
                    <a href="Appointment.php">Take appointment</a>
                    <a href="Shop.php">Shop</a>
                    <a href="Contact.php">Contact us</a>
                    <a class="nav-link" href="login.php">Login</a>
                            
                </nav>
                <h1>Make an Appointment</h1>
                <p>Schedule your next appointment with us using our easy-to-use online appointment form.</p>
                <div class="breadcrumb">Home / Appointment</div>
                <div class="social-icons">
                    <div class="social-icon"></div>
                    <div class="social-icon"></div>
                    <div class="social-icon"></div>
                    <div class="social-icon"></div>
                </div>
            </div>
        </header>

        <?php
        // Display success message if set
        if (isset($_GET['success'])) {
            echo '<div class="alert alert-success my-3">' . htmlspecialchars($_GET['success']) . '</div>';
        }
        
        // Display error message if set
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger my-3">' . htmlspecialchars($_GET['error']) . '</div>';
        }
        ?>

        <section class="appointment-form">
            <h2>Appointment</h2>
            <form action="process-appointment.php" method="POST">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="make">Make</label>
                        <input type="text" id="make" name="make" required>
                    </div>
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" id="model" name="model" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" id="year" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" required min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="time" id="time" name="time" required min="08:30" max="17:00">
                    </div>
                </div>

                <section class="services">
                    <h3>Select Services Needed</h3>
                    <div class="service-grid">
                        <div class="service-item">
                            <input type="checkbox" id="oil" name="services[]" value="Oil Change">
                            <label for="oil">Oil Change</label>
                        </div>
                        <div class="service-item">
                            <input type="checkbox" id="tire" name="services[]" value="Tire change and Balancing">
                            <label for="tire">Tire change and Balancing</label>
                        </div>
                        <div class="service-item">
                            <input type="checkbox" id="filter" name="services[]" value="Filter change">
                            <label for="filter">Filter change</label>
                        </div>
                        <div class="service-item">
                            <input type="checkbox" id="diagnostic" name="services[]" value="Computer diagnostic">
                            <label for="diagnostic">Computer diagnostic</label>
                        </div>
                        <div class="service-item">
                            <input type="checkbox" id="brake" name="services[]" value="Brake change">
                            <label for="brake">Brake change</label>
                        </div>
                        <div class="service-item">
                            <input type="checkbox" id="engine" name="services[]" value="Engine replacement">
                            <label for="engine">Engine replacement</label>
                        </div>
                        <div class="service-item">
                            <input type="checkbox" id="transmission" name="services[]" value="Transmission replacement">
                            <label for="transmission">Transmission replacement</label>
                        </div>
                        <div class="service-item">
                            <input type="checkbox" id="inspection" name="services[]" value="Mechanical inspection">
                            <label for="inspection">Mechanical inspection</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Make an appointment</button>
                </section>
            </form>
        </section>

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
                        <div class="social-icon"></div>
                        <div class="social-icon"></div>
                        <div class="social-icon"></div>
                        <div class="social-icon"></div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>Copyright 2025 KK Auto Garage. All rights reserved</p>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>