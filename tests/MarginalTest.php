<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MarginalTest extends TestCase {

	protected $user = null;

	public function setUp()
	{
		parent::setUp();
		$this->user = App\User::where("email", "margus.pala@gmail.com")->first();
	}

	public function testMarginal()
	{
		$this->actingAs($this->user)
			->visit("admin/marginal")
			->see("Current marginals");
	}
	
	public function testMarginalPost()
	{
		$this->actingAs($this->user)
			->visit("admin/marginal")
			->type("45", "min")
			->type("45", "max")
			->type("2015-09-24", "validity_start")
			->type("2015-09-26", "validity_end")
			->press("Save")
			->seePageIs("admin/marginal");
	}
}
