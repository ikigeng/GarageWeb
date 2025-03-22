<!DOCTYPE html>
<!-- TODO: FIX THE NAVBAR -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KK Auto Garage</title>
    <link rel="stylesheet" href="css/Services.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <header class="header">
            <div class="header-content">
            
                <div class="title">KK Auto Garage Service</div>
                <div class="subtitle">A range of services that we provide</div>
                <div class="breadcrumb">Home / Services</div>
            </div>
        </header>

        <section class="services">
            <div class="service-grid">
                <div class="service-card">
                    <div class="service-icon"></div>
                    <h3>Oil Change</h3>
                    <p>Keep your engine running smoothly with our quick and efficient oil change service using high-quality oils and filters.</p>
                </div>
                <a class="service-card" href="Service-Details-index.html">
                    <div class="service-icon"></div>
                    <h3>Tire change & Balancing</h3>
                    <p>Ensure a safe and smooth ride with professional tire replacement and precision balancing for optimal performance.</p></a>
                
                <a class="service-card" href="Service-Details-index.html">
                    <div class="service-icon"></div>
                    <h3>Filter Change</h3>
                    <p>Improve your car’s efficiency and air quality by replacing oil, fuel, and air filters as needed.</p></a>
                
                <div class="service-card">
                    <div class="service-icon"></div>
                    <h3>Computer Diagnostic</h3>
                    <p>Identify and resolve issues fast with our advanced computer diagnostics, ensuring peak vehicle performance.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"></div>
                    <h3>Mechanical Inspection</h3>
                    <p>Get a thorough check-up of your vehicle’s critical components to ensure safety and reliability.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"></div>
                    <h3>Brake Change</h3>
                    <p>Stay safe on the road with expert brake pad and rotor replacement for optimal stopping power.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"></div>
                    <h3>Engine Replacement</h3>
                    <p>Restore your vehicle’s power with our professional engine replacement services using top-quality parts.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"></div>
                    <h3>Transmission Replacement</h3>
                    <p>Keep your car shifting smoothly with our expert transmission replacement and repair services.</p>
                </div>
            </div>
        </section>

        <section class="appointment">
            <div class="appointment-content">
                <h2>Ready to schedule an <span>appointment</span>?</h2>
                <p>Contact us today to book your next service.</p>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>
