<?php

namespace App\Http\hotelsProviders;

interface parentHotelProvider {
    public function getHotels($request): array;
    public function getHotelsFromTheProvider($request);
}

?>