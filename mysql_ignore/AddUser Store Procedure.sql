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
    -- Insert new user
    INSERT INTO Users (EMAIL, USER_PASSWORD, USER_ADDRESS)
    VALUES ( @EMAIL, @USER_ADDRESS, @USER_ADDRESS);

    PRINT 'User successfully added';
END;

