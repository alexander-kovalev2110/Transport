<?php

namespace TransportCalculator\Models;

class MiniBus extends Vehicle
{
    public function __construct()
    {
        parent::__construct('MiniBus', 10, 80, 15, 150, 2, 1.4);
    }

    public function calculateTripCost($passengers, $baggageWeight, $distance, $fuelPrice, $kilometerRate)
    {
        try {
            if ($passengers > $this->passengers || $baggageWeight > $this->maxBaggageWeight || $distance > $this->maxDistance) {
              throw new \Exception("Недійсна поїздка для мікроавтобуса.");
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
