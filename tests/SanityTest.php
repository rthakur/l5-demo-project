<?php

use Way\Tests\Factory;

class SanityTest extends TestCase {

    protected $baseUrl = "";

    public function setUp() {
        parent::setUp();
        $this->db();
    }

    public function testSinglePriceFind() {
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
    }

}
