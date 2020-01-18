<?php

namespace App\Http\hotelsProviders;
use App\Http\hotelsProviders\parentHotelProvider ;
class TopHotels implements parentHotelProvider
{
    private $providerHotels;
    public function getHotelsFromTheProvider($request)
    {
        //filling the providerHotels variable with dummy data instead of getting it from a third party according to the request inputs
        $this->providerHotels = array(
            array(
                'hotelName'=> 'TopHotel1',
                'rate'=> '**',
                'price'=> 200,
                'discount'=> 50,
                'amenities'=> array('amenity1','amenity2','amenity3')
            ),array(
                'hotelName'=> 'TopHotel2',
                'rate'=> '****',
                'price'=> 400,
                'amenities'=> array('amenity1','amenity2','amenity3')
            ),array(
                'hotelName'=> 'TopHotel3',
                'rate'=> '*',
                'price'=> 100,
                'amenities'=> array('amenity1','amenity2','amenity3')
            ),array(
                'hotelName'=> 'TopHotel4',
                'rate'=> '*****',
                'price'=> 500,
                'discount'=> 50,
                'amenities'=> array('amenity1','amenity2','amenity3')
            ),array(
                'hotelName'=> 'TopHotel5',
                'rate'=> '***',
                'price'=> 300,
                'discount'=> 50,
                'amenities'=> array('amenity1','amenity2','amenity3')
            ),array(
                'hotelName'=> 'TopHotel6',
                'rate'=> '****',
                'price'=> 400,
                'discount'=> 50,
                'amenities'=> array('amenity1','amenity2','amenity3')
            ),array(
                'hotelName'=> 'TopHotel7',
                'rate'=> '**',
                'price'=> 200,
                'discount'=> 50,
                'amenities'=> array('amenity1','amenity2','amenity3')
            ),array(
                'hotelName'=> 'TopHotel8',
                'rate'=> '*',
                'price'=> 100,
                'amenities'=> array('amenity1','amenity2','amenity3')
            ),array(
                'hotelName'=> 'TopHotel9',
                'rate'=> '*****',
                'price'=> 400,
                'discount'=> 50,
                'amenities'=> array('amenity1','amenity2','amenity3')
            ),array(
                'hotelName'=> 'TopHotel10',
                'rate'=> '***',
                'price'=> 300,
                'discount'=> 50,
                'amenities'=> array('amenity1','amenity2','amenity3')
            ),);
    }
    public function getHotels($request): array
    {
        $this->getHotelsFromTheProvider($request);
        $hotels = array();
        if(is_array($this->providerHotels)&& count($this->providerHotels)){
            foreach ($this->providerHotels as $hotel){// mapping the provider response to be standard for all providers
                if(isset($hotel['discount'])){
                    $hotel['price'] = $hotel['price']-$hotel['discount'];
                }
                array_push($hotels,array(
                    'provider' => 'TopHotels',
                    'hotelName' => $hotel['hotelName'],
                    'fare' => $hotel['price'],
                    'amenities' => $hotel['amenities'],
                    'rate'=> strlen($hotel['rate'])
                ));
    
            }
        }
        return $hotels;

    }
}

?>