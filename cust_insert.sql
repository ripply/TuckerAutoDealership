use DATABASE;

-- insert Customer
INSERT INTO Customer 
	(FirstName, MiddleName, LastName,
	 StreetAddress, City, State, ZipCode,
	 PhoneNumber, Email, Notes)
	VALUES('John', 'A', 'Smith', '133 East St',
		   'CITY', 'STATE', 61451, '8151115555',
		   'jsmith@gmail.com', 'notes...');
