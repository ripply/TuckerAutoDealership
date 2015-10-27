<?php
require 'Slim/Slim.php';


\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app -> get('/customer', 'getCustomers');

$app -> get('/customer/:id', 'getCustomer');

$app -> post('/customer',  'addCustomer');

$app -> post('/customer/:id', 'updateCustomer');

$app -> post('/car', 'addCar');

$app -> get('/car', 'getCars');

$app->run();

function addCar() {
	$request = \Slim\Slim::getInstance()->request();

	$car = json_decode($request->getBody());
	
	$sql = "INSERT INTO Car (VIN, Type, Make, Model, Year, ExteriorColor, InteriorColor, DealerCost, SellPrice, AcquiredDate, Options, Mileage, ManufacturedDate, Status) VALUES(:VIN, :Type, :Make, :Model, :Year, :ExteriorColor, :InteriorColor, :DealerCost, :SellPrice, :AcquiredDate, :Options, :Mileage, :ManufacturedDate, :Status)";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("VIN", $car->VIN);
		$stmt->bindParam("Type", $car->Type);
		$stmt->bindParam("Make", $car->Make);
		$stmt->bindParam("Model", $car->Model);
		$stmt->bindParam("Year", $car->Year);
		$stmt->bindParam("ExteriorColor", $car->ExteriorColor);
		$stmt->bindParam("InteriorColor", $car->InteriorColor);
		$stmt->bindParam("DealerCost", $car->DealerCost);
		$stmt->bindParam("SellPrice", $car->SellPrice);
		$stmt->bindParam("AcquiredDate", $car->AcquiredDate);
		$stmt->bindParam("Options", $car->Options);
		$stmt->bindParam("Mileage", $car->Mileage);
		$stmt->bindParam("ManufacturedDate", $car->ManufacturedDate);
		$stmt->bindParam("Status", $car->Status);
		$stmt->execute();
		
		$db = null;
		echo json_encode($car);
	} catch(PDOException $e) {
		echo '{"error":{"text":' . $e->getMessage() .'}}';
	}
}

function getCars() {
	$sql = "SELECT * FROM Car ORDER BY Make";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);
		$cars = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($cars);
	} catch (PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

function getCustomer($id) {
	$sql = "SELECT * FROM Customer WHERE CustomerID = :id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$customer = $stmt->fetchObject();
		$db = null;
		echo json_encode($customer);
	} catch(PDOException $e) {
		echo '{"error":{"text":' . $e->getMessage() .'}}';
	}
}

function getCustomers() {
	$sql = "SELECT * FROM Customer ORDER BY LastName";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);
		$customers = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($customers);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

function addCustomer() {
	$request = \Slim\Slim::getInstance()->request();
	
	$customer = json_decode($request->getBody());
	//$phone =  $customer->homePhoneFirst.$customer->homePhoneSecond.$customer->homePhoneThird;
	
	$sql = "INSERT INTO Customer (FirstName, MiddleName, LastName, StreetAddress, City, State, ZipCode, PhoneNumber, Email, Notes) VALUES(:FirstName, :MiddleName, :LastName, :StreetAddress, :City, :State, :ZipCode, :PhoneNumber, :Email, :Notes)";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("FirstName", $customer->FirstName);
		$stmt->bindParam("MiddleName", $customer->MiddleName);
		$stmt->bindParam("LastName", $customer->LastName);
		$stmt->bindParam("StreetAddress", $customer->StreetAddress);
		$stmt->bindParam("City", $customer->City);
		$stmt->bindParam("State", $customer->State);
		$stmt->bindParam("ZipCode", $customer->ZipCode);
		$stmt->bindParam("PhoneNumber", $customer->PhoneNumber);
		$stmt->bindParam("Email", $customer->Email);
		$stmt->bindParam("Notes", $customer->Notes);
		$stmt->execute();
		//$customer->id = $db->lastInsertId();
		$db = null;
		echo json_encode($customer);
	} catch (PDOException $e) {
		echo '{"error":{"text":' . $e->getMessage() .'}}';
	}
}

function updateCustomer($id) {
	$request = \Slim\Slim::getInstance()->request();

	$customer = json_decode($request->getBody());
	//$phone = $customer->homePhoneFirst.$customer->homePhoneSecond.$customer->homePhoneThird;

	$sql = "UPDATE Customer SET FirstName = :FirstName, MiddleName = :MiddleName, LastName = :LastName, StreetAddress = :StreetAddress, City = :City, State = :State, ZipCode = :ZipCode, PhoneNumber = :PhoneNumber, Email = :Email, Notes = :Notes WHERE CustomerID=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("FirstName", $customer->FirstName);
		$stmt->bindParam("MiddleName", $customer->MiddleName);
		$stmt->bindParam("LastName", $customer->LastName);
		$stmt->bindParam("StreetAddress", $customer->StreetAddress);
		$stmt->bindParam("City", $customer->City);
		$stmt->bindParam("State", $customer->State);
		$stmt->bindParam("ZipCode", $customer->ZipCode);
		$stmt->bindParam("PhoneNumber", $customer->PhoneNumber);
		$stmt->bindParam("Email", $customer->Email);
		$stmt->bindParam("Notes", $customer->Notes);
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$db = null;
		echo json_encode($customer);
	} catch (PDOException $e) {
		echo '{"error":{"text":' . $e->getMessage() .'}}';
	}
}




function getConnection() {
	$dbhost="courses";
	$dbuser="z1662427";
	$dbpass="19880501";
	$dbname="z1662427";
	$dbh = new PDO('mysql:host=courses; dbname=z1662427', $dbuser, $dbpass);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}

?>
