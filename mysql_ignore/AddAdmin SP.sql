CREATE PROCEDURE AddAdmin
    @ADMINNAME NVARCHAR(100),
    @ADMINEMAIL NVARCHAR(100),
    @ADMINPASS NVARCHAR(255)
AS
BEGIN
    SET NOCOUNT ON;

    -- Validate email format
    IF @ADMINEMAIL NOT LIKE '%_@__%.__%' 
    BEGIN
        RAISERROR('Invalid email format for admin.', 16, 1);
        RETURN;
    END

    -- Check if ADMINID already exists
    IF EXISTS (SELECT 1 FROM WebAdmin WHERE ADMINID = @ADMINEMAIL)
    BEGIN
        RAISERROR('ADMINID already exists.', 16, 1);
        RETURN;
    END

    -- Insert the new admin
    INSERT INTO WebAdmin (ADMINNAME, ADMINEMAIL, ADMINPASS)
    VALUES (@ADMINNAME, @ADMINEMAIL, @ADMINPASS);

    PRINT 'Admin successfully added.';
END;