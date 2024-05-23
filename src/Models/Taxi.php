<?php

namespace TransportCalculator\Models;

class Taxi extends Vehicle
{
    public function __construct()
    {
        parent::__construct('Taxi', 4, 40, 10, 100, 2, 1.6);
    }

    public function calculateTripCost($passengers, $baggageWeight, $distance, $fuelPrice, $kilometerRate)
    {
        try {
            if ($passengers > $this->passengers || $baggageWeight > $this->maxBaggageWeight || $distance > $this->maxDistance) {
              throw new \Exception("Недійсна поїздка для такси.");
            } 
            
            $fuelCost = ($distance / 100) * $this->fuelConsumptionPer100Km * $fuelPrice;
            $driverSalary = 3 * $distance * $kilometerRate * $this->driverCoef;
            $totalCost = $driverSalary + ($fuelCost * $this->depreciation);

            return $totalCost;

          } catch (\Exception $e) {
            echo "Error: " . $e->getMessage() . "\n"; // Error message output           
          }
    }
}
