<?php

use Way\Tests\Factory as f;
use App\Services\FindPricesService;

use App\Port;
use App\Container;
use App\Carrier;
use Carbon\Carbon;

class FindPricesServiceTest extends TestCase {

    protected $service;

    public function setUp() {
        parent::setUp();
        $this->db();
        $this->buildPrices();
        $this->service = new FindPricesService("EUR");
    }

    //1: +2 till +10  
    //2: +3 till +10  
    //3: +4 till +8  
    // test 1, 2, 3, 10, 11
    // test 2 prices for different carriers
    // test no prices for route at all
    // test no prices for container at all
    // test no route

    public function testNoThc() {
        $thcPrices = $this->service->getThcPrice(Port::find(1), Carrier::find(1), Container::find(1), Carbon::now());
        $this->assertNull($thcPrices);
    }
/*
    public function testNoPricesYet() {
        $prices = $this->service->getRouteDatePrices(1, 2, 1, Carbon::now());
        $this->assertEquals(count($prices), 0);
    }*/
/*
    public function testNoPricesAnyMore() {
        $prices = $this->service->getRouteDatePrices(1, 2, 1, Carbon::now()->addDays(10));
        $this->assertEquals(count($prices), 0);
    }
*/
/*
    public function testLastPriceExpired() {
        $prices = $this->service->getRouteDatePrices(1, 2, 1, Carbon::now()->addDays(9));
        $this->assertEquals(0, count($prices));
    }*/
/*
    public function testSinglePrice() {
        $prices = $this->service->getRouteDatePrices(1, 2, 1, Carbon::now()->addDays(2));
        $this->assertEquals(count($prices), 1);
        $this->assertEquals(1, reset($prices)->id);
    }
*/
/*
    public function testPriceOverride() {
        $prices = $this->service->getRouteDatePrices(1, 2, 1, Carbon::now()->addDays(3));
        $this->assertEquals(count($prices), 1);
        $this->assertEquals(2, reset($prices)->id);
    }
*/
/*    public function testTwoPrices() {
        $prices = $this->service->getRouteDatePrices(1, 2, 1, Carbon::now()->addDays(5));
        $this->assertEquals(count($prices), 2);
        foreach ($prices as $carrierId => $price) {
            $this->assertContains($carrierId, [1, 2]);
            if ($carrierId == 1) {
                $this->assertEquals(3, $price->id);
            } else {
                $this->assertEquals(4, $price->id);
            }
        }
    }
*/
   /* public function testNoPriceForRoute() {
        $prices = $this->service->getRouteDatePrices(2, 1, 1, Carbon::now()->addDays(5));
        $this->assertEquals(count($prices), 0);
    }*/

 /*   public function testNoPriceForContainer() {
        $prices = $this->service->getRouteDatePrices(1, 2, 2, Carbon::now()->addDays(5));
        $this->assertEquals(count($prices), 0);
    }
*/
 /*   public function testNoRoute() {
       $prices = $this->service->getRouteDatePrices(1, 3, 1, Carbon::now()->addDays(5));
        $this->assertEquals(count($prices), 0);
    }
*/
    private function buildPrices() {
       
        $carrier1 = f::create('App\Carrier');
        $carrier2 = f::create('App\Carrier');
        $cont1 = f::create('App\Container');
        $cont2 = f::create('App\Container');
        $port1 = f::create('App\Port',['country_id'=>1]);
        $port2 = f::create('App\Port',['country_id'=>1]);
        $port3 = f::create('App\Port',['country_id'=>1]);
        $route1 = f::create('App\Route', ['origin_id' => $port1->id, 'destination_id' => $port2->id, 'carrier_id' => $carrier1->id]);
        $route2 = f::create('App\Route', ['origin_id' => $port2->id, 'destination_id' => $port1->id, 'carrier_id' => $carrier1->id]);
        $route3 = f::create('App\Route', ['origin_id' => $port1->id, 'destination_id' => $port2->id, 'carrier_id' => $carrier2->id]);

        $price1 = f::create('App\Price', [
                    'route_id' => $route1->id,
                    'container_id' => $cont1->id,
                    'user_id'		=> 1,
                    'validity_start' => Carbon::today()->addDays(2),
                    'validity_end' => Carbon::today()->addDays(10)
        ]);
        $price2 = f::create('App\Price', [
                    'route_id' => $route1->id,
                    'container_id' => $cont1->id,
                    'user_id'		=> 1,
                    'validity_start' => Carbon::today()->addDays(3),
                    'validity_end' => Carbon::today()->addDays(10)
        ]);
        $price3 = f::create('App\Price', [
                    'route_id' => $route1->id,
                    'container_id' => $cont1->id,
                    'user_id'		=> 1,
                    'validity_start' => Carbon::today()->addDays(4),
                    'validity_end' => Carbon::today()->addDays(8)
        ]);
        $price4 = f::create('App\Price', [
                    'route_id' => $route3->id,
                    'container_id' => $cont1->id,
                    'user_id'	=> 1,
                    'validity_start' => Carbon::today()->addDays(4),
                    'validity_end' => Carbon::today()->addDays(8)
        ]);
    }

}
