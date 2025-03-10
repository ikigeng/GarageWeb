CREATE PROCEDURE AddAdmin
    @ADMINID NVARCHAR(50),
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
    IF EXISTS (SELECT 1 FROM WebAdmin WHERE ADMINID = @ADMINID)
    BEGIN
        RAISERROR('ADMINID already exists.', 16, 1);
        RETURN;
    END

    -- Hash the admin password before storing
    DECLARE @HashedPassword VARBINARY(64);
    SET @HashedPassword = HASHBYTES('SHA2_256', CONVERT(VARBINARY, @ADMINPASS));

    -- Insert the new admin
    INSERT INTO WebAdmin (ADMINID, ADMINNAME, ADMINEMAIL, ADMINPASS)
    VALUES (@ADMINID, @ADMINNAME, @ADMINEMAIL, @HashedPassword);

    PRINT 'Admin successfully added.';
END;
