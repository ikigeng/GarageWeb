CREATE PROCEDURE AddService
    @SERVICENAME NVARCHAR(100),
    @SERVICEDESC NVARCHAR(255),
    @MINIMUMPRICE DECIMAL(10, 2)
AS
BEGIN
    SET NOCOUNT ON;
	BEGIN TRY
        -- Check for duplicate service name
        IF EXISTS (SELECT 1 FROM GarageServices WHERE SERVICENAME = @SERVICENAME)
        BEGIN
            PRINT 'Error: Service name already exists.';
            RETURN;
        END
    -- Insert a new service
    INSERT INTO GarageServices (SERVICENAME, SERVICEDESC, MINIMUMPRICE)
    VALUES (@SERVICENAME, @SERVICEDESC, @MINIMUMPRICE);

    PRINT 'Service successfully added.';
    END TRY
    BEGIN CATCH
        PRINT 'Error: ' + ERROR_MESSAGE();
    END CATCH
END;
