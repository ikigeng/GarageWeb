<!DOCTYPE html>
<!-- TODO: theres a lot to fix here; including making the form work -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>KK Auto Garage - Contact</title>
    <link rel="stylesheet" href="css/Contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-black">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand" href="Home.php">
                    <img src="Photos/IconOnly_TransparentCopy.png" alt="KK Auto Garage Logo" class="logo">
                </a>
                
                <!-- Hamburger Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!-- Navigation Menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="services.php">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="appointment.php">Take appointment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="shop.php">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        </ul>
                </div>
            </div>
        </nav>
</header>
        
        <div class="container">
        <section class="contact-section">
            <div class="contact-form">
                <h2>Feedback</h2>
                <form>
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" class="form-control" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" class="form-control" placeholder="Enter your phone number">
                    </div>
                    <div class="form-group">
                        <label for="feedback">Feedback</label>
                        <textarea id="feedback" class="form-control" rows="4" placeholder="Your feedback"></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Submit</button>
                </form>
            </div>
            <div class="contact-info">
                <h2>Contact Info</h2>
                <p>188 Rue Brière, Saint-Jérôme</p>
                <p>(438)-778-5775</p>
                <p>kkautogarage@gmail.com</p>
                <p>www.kkautogarage.com</p>
            </div>
        </section>

        <section class="map-section">
            <h2>Hi! We're here!</h2>
            <div class="map-placeholder"></div>
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
    </div>
    <script src="js/Contact.html"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>