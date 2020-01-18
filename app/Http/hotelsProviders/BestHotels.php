<?php

namespace App\Http\hotelsProviders;
use App\Http\hotelsProviders\parentHotelProvider;
/**
 * BestHotels class implements the algorithm while following the base parentHotelProvider
 * interface. The interface makes them interchangeable in the Context.
 */


class BestHotels implements parentHotelProvider
{
    private $providerHotels;
    public function getHotelsFromTheProvider($request)
    {
        //filling the providerHotels variable with dummy data instead of getting it from a third party according to the request inputs
        $this->providerHotels = array(
            array(
                'hotel'=> 'BestHotel1',
                'hotelRate'=> 2,
                'hotelFare'=> 200,
                'roomAmenities'=> 'amenity1,amenity2,amenity3'
            ),array(
                'hotel'=> 'BestHotel2',
                'hotelRate'=> 4,
                'hotelFare'=> 400,
                'roomAmenities'=> 'amenity1,amenity2,amenity3'
            ),array(
                'hotel'=> 'BestHotel3',
                'hotelRate'=> 1,
                'hotelFare'=> 100,
                'roomAmenities'=> 'amenity1,amenity2,amenity3'
            ),array(
                'hotel'=> 'BestHotel4',
                'hotelRate'=> 5,
                'hotelFare'=> 500,
                'roomAmenities'=> 'amenity1,amenity2,amenity3'
            ),array(
                'hotel'=> 'BestHotel5',
                'hotelRate'=> 4,
                'hotelFare'=> 300,
                'roomAmenities'=> 'amenity1,amenity2,amenity3'
            ),array(
                'hotel'=> 'BestHotel6',
                'hotelRate'=> 4,
                'hotelFare'=> 400,
                'roomAmenities'=> 'amenity1,amenity2,amenity3'
            ),array(
                'hotel'=> 'BestHotel7',
                'hotelRate'=> 2,
                'hotelFare'=> 200,
                'roomAmenities'=> 'amenity1,amenity2,amenity3'
            ),array(
                'hotel'=> 'BestHotel8',
                'hotelRate'=> 1,
                'hotelFare'=> 100,
                'roomAmenities'=> 'amenity1,amenity2,amenity3'
            ),array(
                'hotel'=> 'BestHotel9',
                'hotelRate'=> 5,
                'hotelFare'=> 400,
                'roomAmenities'=> 'amenity1,amenity2,amenity3'
            ),array(
                'hotel'=> 'BestHotel10',
                'hotelRate'=> 3,
                'hotelFare'=> 300,
                'roomAmenities'=> 'amenity1,amenity2,amenity3'
            ),);
    }

    public function getHotels($request): array
    {

        $this->getHotelsFromTheProvider($request);
        $hotels = $this->providerHotels;
        $hotels = array();
        if(is_array($this->providerHotels) && count($this->providerHotels)){
            foreach ($this->providerHotels as $hotel){// mapping the provider response to be standard for all providers
                array_push($hotels,array(
                    'provider' => 'BestHotels',
                    'hotelName' => $hotel['hotel'],
                    'fare' => $hotel['hotelFare'],
                    'amenities' => explode(',', $hotel['roomAmenities']),
                    'rate'=> $hotel['hotelRate']
                ));
            }
        }
        return $hotels;
    }
}
?>