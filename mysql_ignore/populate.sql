-- Populate Users table
INSERT INTO Users (UserName, UserPassword, UserFName, UserLName, UserEmail, UserRole)
VALUES 
('admin1', 'password123', 'Admin', 'User', 'admin@garage.com', 'admin'),
('tech1', 'password123', 'Tech', 'Support', 'tech@garage.com', 'technician'),
('customer1', 'password123', 'John', 'Doe', 'john@example.com', 'customer'),
('customer2', 'password123', 'Jane', 'Smith', 'jane@example.com', 'customer'),
('customer3', 'password123', 'Robert', 'Johnson', 'robert@example.com', 'customer');

-- Populate Products table
INSERT INTO Products (ProductName, ProductDescription, ProductPrice, ProductQuantity, ProductImage)
VALUES 
('Oil Filter', 'High-quality oil filter for all vehicle types', 15.99, 100, 'oil_filter.jpg'),
('Air Filter', 'Premium air filter for improved engine performance', 12.99, 75, 'air_filter.jpg'),
('Brake Pads', 'Durable brake pads for safe stopping', 45.99, 50, 'brake_pads.jpg'),
('Spark Plugs', 'Set of 4 spark plugs', 24.99, 60, 'spark_plugs.jpg'),
('Windshield Wipers', 'All-weather windshield wipers', 19.99, 80, 'wipers.jpg');

-- Populate Services table
INSERT INTO GarageServices (ServiceName, ServiceDescription, ServicePrice)
VALUES 
('Oil Change', 'Complete oil change service with filter replacement', 49.99),
('Tire Rotation', 'Rotate tires for even wear and extended life', 29.99),
('Brake Service', 'Inspect and replace brake pads if needed', 129.99),
('Engine Tune-up', 'Comprehensive engine tune-up service', 199.99),
('Air Conditioning Service', 'AC system check and recharge', 89.99);


-- Populate Appointments table
INSERT INTO Appointments (AppointmentDate, AppointmentTime, AppointmentReason, VehicleID, UserID, ServiceID, AppointmentStatus)
VALUES 
('2023-11-25', '10:00:00', 'Regular oil change and inspection', 1, 3, 1, 'Scheduled'),
('2023-11-26', '14:30:00', 'Brake noise when stopping', 2, 4, 3, 'Scheduled'),
('2023-11-27', '09:15:00', 'Engine tune-up', 3, 5, 4, 'Scheduled'),
('2023-11-28', '13:00:00', 'Tire rotation service', 4, 3, 2, 'Scheduled'),
('2023-11-29', '11:45:00', 'AC not cooling properly', 5, 4, 5, 'Scheduled');

-- Populate PurchaseHistory table
INSERT INTO PurchaseHistory (UserID, ProductID, PurchaseDate, PurchaseQuantity, PurchaseTotal)
VALUES 
(3, 1, '2023-11-10', 2, 31.98),
(4, 3, '2023-11-12', 1, 45.99),
(5, 4, '2023-11-15', 1, 24.99),
(3, 2, '2023-11-18', 1, 12.99),
(4, 5, '2023-11-20', 2, 39.98);

