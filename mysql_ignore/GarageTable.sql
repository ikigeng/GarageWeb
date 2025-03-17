CREATE TABLE Users (
    UserID INT IDENTITY(1,1) PRIMARY KEY,
    Email NVARCHAR(50) UNIQUE NOT NULL,
    User_password NVARCHAR(255) NOT NULL,  -- Store hashed passwords
    User_address NVARCHAR(100)
);

CREATE TABLE Products (
    ProductID INT IDENTITY(1,1) PRIMARY KEY,
    ProductName NVARCHAR(50) NOT NULL,
    ProductDesc NVARCHAR(MAX),
    Price DECIMAL(8,2) NOT NULL,
    Sold BIT NOT NULL DEFAULT 0
);

CREATE TABLE GarageServices (
    ServiceID INT IDENTITY(1,1) PRIMARY KEY,
    ServiceName NVARCHAR(50) NOT NULL,
    ServiceDesc NVARCHAR(MAX),
    MinimumPrice DECIMAL(10,2) NOT NULL
);

CREATE TABLE WebAdmin (
    AdminID INT IDENTITY(1,1) PRIMARY KEY,
    AdminName NVARCHAR(50) NOT NULL,
    AdminEmail NVARCHAR(50) UNIQUE NOT NULL,
    AdminPass NVARCHAR(255) NOT NULL  -- Store hashed passwords
);

CREATE TABLE PurchaseHistory (
    PurchaseID INT IDENTITY(1,1) PRIMARY KEY,
    UserID INT NOT NULL FOREIGN KEY REFERENCES Users(UserID),
    ProductID INT NULL FOREIGN KEY REFERENCES Products(ProductID),
    ServiceID INT NULL FOREIGN KEY REFERENCES GarageServices(ServiceID),
    Purchase_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    Payment_Method NVARCHAR(50) NOT NULL
);
