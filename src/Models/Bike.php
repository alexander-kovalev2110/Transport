<?php

namespace TransportCalculator\Models;

class Bike extends Vehicle
{
    public function __construct()
    {
        parent::__construct('Bike', 1, 0, 0, 20, 1, 1);
    }

    public function calculateTripCost($passengers, $baggage, $distance, $fuelPrice, $kilometerRate)
    {
        try {
            if ($passengers > $this->passengers || $baggage > $this->maxBaggageWeight || $distance > $this->maxDistance) {
              throw new \Exception("Недійсна поїздка на велосипеді.<br>");
            } 
            
            $driverSalary = 3 * $distance * $kilometerRate * $this->driverCoef;
            $totalCost = $driverSalary;

            return $totalCost;

          } catch (\Exception $e) {
            echo "Error: " . $e->getMessage() . "\n"; // Error message output          
          }
    }
}
