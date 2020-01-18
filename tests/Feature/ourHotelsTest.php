<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ourHotelsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testourHotelsApiSuccess()
    {
        $response = $this->json('POST', '/api/ourHotels', ['from_date'=>'10-10-2025','to_date'=>'12-10-2025','city'=>'auh','adults_number'=>2]);
        $response->assertStatus(200);  
    }

    public function testourHotelsApiFailWithoutFrom_date()
    {
        $response = $this->json('POST', '/api/ourHotels', ['to_date'=>'12-10-2025','city'=>'auh','adults_number'=>2]);
        $response->assertStatus(422);  
    }

    public function testourHotelsApiFailInvalidFrom_date()
    {
        $response = $this->json('POST', '/api/ourHotels', ['from_date'=>'1-1-2020','to_date'=>'12-10-2025','city'=>'auh','adults_number'=>2]);
        $response->assertStatus(422);  
    }

    public function testourHotelsApiFailWithoutTo_date()
    {
        $response = $this->json('POST', '/api/ourHotels', ['from_date'=>'12-10-2025','city'=>'auh','adults_number'=>2]);
        $response->assertStatus(422);  
    }

    public function testourHotelsApiFailInvalidTo_date()
    {
        $response = $this->json('POST', '/api/ourHotels', ['from_date'=>'12-10-2025','to_date'=>'1-1-2020','city'=>'auh','adults_number'=>2]);
        $response->assertStatus(422);  
    }

    public function testourHotelsApiFailWithoutCity()
    {
        $response = $this->json('POST', '/api/ourHotels', ['from_date'=>'10-10-2025','to_date'=>'12-10-2025','adults_number'=>2]);
        $response->assertStatus(422);  
    }

    public function testourHotelsApiFailInvalidCity()
    {
        $response = $this->json('POST', '/api/ourHotels', ['from_date'=>'10-10-2025','to_date'=>'12-10-2025','city'=>'test','adults_number'=>2]);
        $response->assertStatus(422);  
    }

    public function testourHotelsApiFailWithoutAdults_number()
    {
        $response = $this->json('POST', '/api/ourHotels', ['from_date'=>'10-10-2025','to_date'=>'12-10-2025','city'=>'auh']);
        $response->assertStatus(422);  
    }

    public function testourHotelsApiFailInvalidAdults_number()
    {
        $response = $this->json('POST', '/api/ourHotels', ['from_date'=>'10-10-2025','to_date'=>'12-10-2025','city'=>'auh','adults_number'=>"test"]);
        $response->assertStatus(422);  
    }
}
