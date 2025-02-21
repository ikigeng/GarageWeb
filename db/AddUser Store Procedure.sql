CREATE PROCEDURE AddUser
    @EMAIL NVARCHAR(100),
    @USER_PASSWORD NVARCHAR(255),
    @USER_ADDRESS NVARCHAR(255) = NULL
AS
BEGIN
    SET NOCOUNT ON;

    -- Validate email format (Basic Check)
    IF @EMAIL NOT LIKE '%@%._%'
    BEGIN
        RAISERROR('Invalid email format', 16, 1);
        RETURN;
    END

    -- Check if Email already exists
    IF EXISTS (SELECT 1 FROM Users WHERE Email = @EMAIL)
    BEGIN
        RAISERROR('USERID already exists', 16, 1);
        RETURN;
    END

    -- Hash the password before storing (using HASHBYTES with SHA2_256)
    DECLARE @HashedPassword VARBINARY(64);
    SET @HashedPassword = HASHBYTES('SHA2_256', @USER_PASSWORD);

    -- Insert new user
    INSERT INTO Users (EMAIL, USER_PASSWORD, USER_ADDRESS)
    VALUES ( @EMAIL, @HashedPassword, @USER_ADDRESS);

    PRINT 'User successfully added';
END;


