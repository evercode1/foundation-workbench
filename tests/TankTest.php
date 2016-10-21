<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TankTest extends TestCase
{
    public function testCreateNewTank()
    {

        $randomString = str_random(10);

        $this->visit('/tank/create')
             ->type($randomString, 'name')
             ->press('Create')
             ->seePageIs('/tank');
    }

}