<?php

require 'vendor/autoload.php';

use TransportCalculator\Models\Bus;
use TransportCalculator\Models\MiniBus;
use TransportCalculator\Models\Taxi;
use TransportCalculator\Models\Bike;
use TransportCalculator\TripCalculator;

// Creating Vehicle Objects
$bus = new Bus();
$minibus = new MiniBus();
$taxi = new Taxi();
$bike = new Bike();

// Creating a calculator and adding vehicles
$tripCalculator = new TripCalculator();
$tripCalculator->addVehicle($bus);
$tripCalculator->addVehicle($minibus);
$tripCalculator->addVehicle($taxi);
$tripCalculator->addVehicle($bike);

// Input parameters for calculation
$fuelPrice = 1.2;
$kilometerRate = 0.5;

// Getting parameters from a dialog form
$passengers = abs($_POST['passengers']);
$baggage = abs($_POST['baggage']);
$distance = abs($_POST['distance']);

echo "Passengers: $passengers<br>";
echo "Baggage: $baggage kg<br>";
echo "Distance: $distance km<br><br>";

// Trip cost calculation
$results = $tripCalculator->calculate($passengers, $baggage, $distance, $fuelPrice, $kilometerRate);

// Output of results
foreach ($results as $result) {
    echo "Транспортний засіб: " . $result['vehicle'] . " - Вартість поїздки: " . $result['cost'] . " грн<br>";
}
