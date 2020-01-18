<?php

namespace App\Http\hotelsProviders;
use App\Http\hotelsProviders\parentHotelProvider as parentHotelProvider;

/**
 * The Context defines the interface of interest to clients.
 */
class Context
{
    /**
     * @var hotelProvider The Context maintains a reference to one of the Provider
     * objects. The Context does not know the concrete class of a Provider. It
     * should work with all Providers via the parentHotelProvider interface.
     */
    private $hotelProvider;

    /**
     * Usually, the Context accepts a Provider through the constructor, but also
     * provides a setter to change it at runtime.
     */
    public function __construct(parentHotelProvider $hotelProvider)
    {
        $this->hotelProvider = $hotelProvider;
    }

    /**
     * Usually, the Context allows replacing a Provider object at runtime.
     */
    public function setHotelProvider(parentHotelProvider $hotelProvider)
    {
        $this->hotelProvider = $hotelProvider;
    }

    /**
     * The Context delegates some work to the Provider object instead of
     * implementing multiple versions of the algorithm on its own.
     */
    public function getProviderHotels($request): array
    {
        $result = $this->hotelProvider->getHotels($request);
        return $result;
    }
}
