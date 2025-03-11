create table Users(
UserID int identity(1,1) primary key,
Email nvarchar(50),
User_password nvarchar(20),
User_address nvarchar(50)
);
create table Products(
ProductID int identity(1,1) primary key,
ProductName nvarchar(20),
ProductDesc text,
Price decimal(8,2) not null,
Sold bit not null,
);
create table GarageServices(
ServiceID int identity(1,1) primary key,
ServiceName nvarchar(20),
ServiceDesc text,
MinimumPrice decimal(10,2) not null
);
create table WebAdmin(
AdminID int identity(1,1) primary key,
AdminName nvarchar(20),
AdminEmail nvarchar(50),
AdminPass nvarchar(20)
);
create table PurchaseHistory(
PurchaseID  int identity(1,1) primary key,
UserID int foreign key references Users(UserID),
ProductID int foreign key references Products(ProductID),
ServiceID int foreign key references GarageServices(ServiceID),
Purchase_date datetime default current_timestamp,
Payment_Method nvarchar(100),
);
