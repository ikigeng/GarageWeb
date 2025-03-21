CREATE TABLE IF NOT EXISTS Appointments (
    AppointmentID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NULL, -- NULL allows guest bookings
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Phone VARCHAR(20) NOT NULL,
    VehicleMake VARCHAR(50) NOT NULL,
    VehicleModel VARCHAR(50) NOT NULL,
    VehicleYear VARCHAR(4) NOT NULL,
    AppointmentDate DATE NOT NULL,
    AppointmentTime TIME NOT NULL,
    ServiceType TEXT NOT NULL,
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Status VARCHAR(20) DEFAULT 'Scheduled',
    Notes TEXT,
    FOREIGN KEY (UserID) REFERENCES Users(UserID) ON DELETE SET NULL
);