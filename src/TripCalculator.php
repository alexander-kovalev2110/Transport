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

    public function calculate($passengers, $baggage, $distance, $fuelPrice, $kilometerRate)
    {
        $results = [];
        foreach ($this->vehicles as $vehicle) {
            try {
                $cost = $vehicle->calculateTripCost($passengers, $baggage, $distance, $fuelPrice, $kilometerRate);
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
