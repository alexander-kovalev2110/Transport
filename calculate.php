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
$passengers = 4;
$baggageWeight = 20;
$distance = 100;
$fuelPrice = 1.2;
$kilometerRate = 0.5;

// Trip cost calculation
$results = $tripCalculator->calculate($passengers, $baggageWeight, $distance, $fuelPrice, $kilometerRate);

// Output of results
foreach ($results as $result) {
    echo "Транспортний засіб: " . $result['vehicle'] . " - Вартість поїздки: " . $result['cost'] . " грн\n";
}
