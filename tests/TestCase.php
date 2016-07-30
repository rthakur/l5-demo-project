<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

    
     protected $baseUrl = 'http://localhost';
     
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication() {
        $app = require __DIR__ . '/../bootstrap/app.php';
        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
        return $app;
    }

    protected function db() {
        
    }

    public function setUp() {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

}
