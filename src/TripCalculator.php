<?php

namespace TransportCalculator;

use TransportCalculator\Models\Vehicle;

class TripCalculator
{
    private $vehicles;

    public function __construct()
    {
        $this->vehicles = [];
    }

    public function addVehicle(Vehicle $vehicle)
    {
        $this->vehicles[] = $vehicle;
    }

    public function calculate($passengers, $baggageWeight, $distance, $fuelPrice, $kilometerRate)
    {
        $results = [];
        foreach ($this->vehicles as $vehicle) {
            try {
                $cost = $vehicle->calculateTripCost($passengers, $baggageWeight, $distance, $fuelPrice, $kilometerRate);
                if ($cost > 0) {
                    $results[] = ['vehicle' => $vehicle->getName(), 'cost' => $cost];
                }
            } catch (\Exception $e) {
                continue;
            }
        }
        return $results;
    }
}
