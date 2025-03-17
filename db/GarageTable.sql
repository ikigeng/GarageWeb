CREATE TABLE Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Email VARCHAR(50) UNIQUE NOT NULL,
    User_password VARCHAR(255) NOT NULL,  -- Store hashed passwords
    User_address VARCHAR(100)
);

CREATE TABLE Products (
    ProductID INT AUTO_INCREMENT PRIMARY KEY,
    ProductName VARCHAR(50) NOT NULL,
    ProductDesc TEXT,
    Price DECIMAL(8,2) NOT NULL,
    Sold TINYINT(1) NOT NULL DEFAULT 0  -- Using TINYINT for boolean value
);

CREATE TABLE GarageServices (
    ServiceID INT AUTO_INCREMENT PRIMARY KEY,
    ServiceName VARCHAR(50) NOT NULL,
    ServiceDesc TEXT,
    MinimumPrice DECIMAL(10,2) NOT NULL
);

CREATE TABLE WebAdmin (
    AdminID INT AUTO_INCREMENT PRIMARY KEY,
    AdminName VARCHAR(50) NOT NULL,
    AdminEmail VARCHAR(50) UNIQUE NOT NULL,
    AdminPass VARCHAR(255) NOT NULL  -- Store hashed passwords
);

CREATE TABLE PurchaseHistory (
    PurchaseID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    ProductID INT NULL,
    ServiceID INT NULL,
    Purchase_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    Payment_Method VARCHAR(50) NOT NULL,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID),
    FOREIGN KEY (ServiceID) REFERENCES GarageServices(ServiceID)
);
