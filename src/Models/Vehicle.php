<?php

namespace TransportCalculator\Models;

abstract class Vehicle
{
    protected $name;
    protected $passengers;
    protected $maxBaggageWeight;
    protected $fuelConsumptionPer100Km;
    protected $maxDistance;
    protected $depreciation;
    protected $driverCoef;

    public function __construct(
        $name,
        $passengers,
        $maxBaggageWeight,
        $fuelConsumptionPer100Km,
        $maxDistance,
        $depreciation,
        $driverCoef
    ) {
        $this->name = $name;
        $this->passengers = $passengers;
        $this->maxBaggageWeight = $maxBaggageWeight;
        $this->fuelConsumptionPer100Km = $fuelConsumptionPer100Km;
        $this->maxDistance = $maxDistance;
        $this->depreciation = $depreciation;
        $this->driverCoef = $driverCoef;
    }

    abstract public function calculateTripCost($passengers, $baggage, $distance, $fuelPrice, $kilometerRate);

    public function getName()
    {
        return $this->name;
    }
}
