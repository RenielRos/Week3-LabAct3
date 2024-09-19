<?php

// Base class Vehicle
class Vehicle {
    protected $make;
    protected $model;
    protected $year;

    // Constructor to initialize common vehicle details
    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // Final method to display common details for all vehicles
    final public function getDetails() {
        return "Make: $this->make, Model: $this->model, Year: $this->year";
    }

    // Placeholder for method that describes the vehicle (to be overridden in child classes)
    public function describe() {
        return "This is a vehicle.";
    }
}

// Derived class Car
class Car extends Vehicle {
    private $doors;

    // Constructor to initialize Car-specific details
    public function __construct($make, $model, $year, $doors) {
        parent::__construct($make, $model, $year);
        $this->doors = $doors;
    }

    // Override describe method to specify that this is a car
    public function describe() {
        return "This is a car with $this->doors doors.";
    }
}

// Final class Motorcycle (cannot be extended further)
final class Motorcycle extends Vehicle {
    
    // Constructor for Motorcycle
    public function __construct($make, $model, $year) {
        parent::__construct($make, $model, $year);
    }

    // Override describe method to specify that this is a motorcycle
    public function describe() {
        return "This is a motorcycle.";
    }
}

// Interface for Electric Vehicles
interface ElectricVehicle {
    public function chargeBattery(); // Method to charge the battery
}

// ElectricCar class extending Car and implementing ElectricVehicle interface
class ElectricCar extends Car implements ElectricVehicle {
    
    private $batteryLevel;

    // Constructor to initialize ElectricCar-specific details
    public function __construct($make, $model, $year, $doors, $batteryLevel) {
        parent::__construct($make, $model, $year, $doors);
        $this->batteryLevel = $batteryLevel;
    }

    // Implementing chargeBattery method from ElectricVehicle interface
    public function chargeBattery() {
        return "Battery charging... Current battery level: $this->batteryLevel%";
    }

    // Override describe method to specify this is an electric car
    public function describe() {
        return "This is an electric car with $this->batteryLevel% battery level.";
    }
}

// Test the system

// Creating a Car instance
$car = new Car("Toyota", "Corolla", 2020, 4);
echo $car->getDetails() . "<br>";
echo $car->describe() . "<br><br>";

// Creating a Motorcycle instance
$motorcycle = new Motorcycle("Harley-Davidson", "Sportster", 2019);
echo $motorcycle->getDetails() . "<br>";
echo $motorcycle->describe() . "<br><br>";

// Creating an ElectricCar instance
$electricCar = new ElectricCar("Tesla", "Model S", 2021, 4, 85);
echo $electricCar->getDetails() . "<br>";
echo $electricCar->describe() . "<br>";
echo $electricCar->chargeBattery() . "<br>";

?>
