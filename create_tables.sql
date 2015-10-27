/*
* create_tables.sql
*	DB:
* TABLES:
*		Car
*		Customer
*/

USE z1662427;

-- -------------------
-- Car table
-- -------------------
CREATE TABLE IF NOT EXISTS Car(
	VIN					NVARCHAR(17)	NOT NULL UNIQUE,
	Type				NVARCHAR(4)		NOT NULL,
	Make  				NVARCHAR(50)	NOT NULL,
	Model 				NVARCHAR(50)	NOT NULL,
	Year  				NVARCHAR(4)		NOT NULL,
	ExteriorColor 		NVARCHAR(50)	NOT NULL,
	InteriorColor		NVARCHAR(50)	        ,
	DealerCost			NVARCHAR(15)	NOT NULL,
	SellPrice			NVARCHAR(15)	        ,
	AcquiredDate		NVARCHAR(30)	NOT NULL,
	Options				NVARCHAR(255)	        ,
	Mileage				NVARCHAR(7)				,
	ManufacturedDate	NVARCHAR(30)			,
	Status				NVARCHAR(15)			,
	Location			NVARCHAR(30)			,
	PRIMARY KEY (VIN)
);

-- -------------------
-- Customer table
-- -------------------
CREATE TABLE IF NOT EXISTS Customer(
	CustomerID			INT				NOT NULL AUTO_INCREMENT,
	FirstName			NVARCHAR(50)	NOT NULL,
	MiddleName			NVARCHAR(50)	,	
	LastName			NVARCHAR(50)	NOT NULL,
	StreetAddress		NVARCHAR(50)	NOT NULL,
	City				NVARCHAR(50)	NOT NULL,
	State				NVARCHAR(2)		NOT NULL,
	ZipCode				INT				NOT NULL,
	PhoneNumber			NVARCHAR(10)	,
	Email				NVARCHAR(50)	,
	Status				NVARCHAR(50)	NULL,
	Notes				NVARCHAR(255)	NULL,
	PRIMARY KEY (CustomerID)
);
