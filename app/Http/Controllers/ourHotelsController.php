<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\hotelsProviders\BestHotels;
use App\Http\hotelsProviders\TopHotels;
use App\Http\hotelsProviders\Context;

class ourHotelsController extends Controller
{

public function getHotels(Request $request){
    $validatedData = $request->validate([ //validate the request
        'from_date' => ['required','date','after:today'],
        'to_date' => ['required','date','after:from_date'],
        'city' => ['required','min:3','max:3','alpha'],
        'adults_number' => ['required','integer'],
    ]);

    $context = new Context(new BestHotels);
    $bestHotels = $context->getProviderHotels($request); //get the hotels from the first provider
    $context->setHotelProvider(new TopHotels);
    $topHotels = $context->getProviderHotels($request);//get the hotels from the second provider
    $allHotels = array_merge($bestHotels,$topHotels); //merge the results in one array to can sort it
    if(count($allHotels)){
        usort($allHotels, function($a, $b) { // sort results according to the hotels' rates
            return $b['rate'] <=> $a['rate'];
        });
    }
    return response()->json($allHotels, 200);
}




}
