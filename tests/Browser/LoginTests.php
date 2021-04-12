<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTests extends DuskTestCase
{
    /**
    * @test
    */
    public function LoginStudent()
    {
        
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('name', 'test')
                    ->type('password', 'test123')
                    ->press('Accedir')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Student')
                    ->screenshot('loginStudent')
                    ->logout();
        });
    }

    /**
    * @test
    */
    public function LoginAdmin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('name', 'admin')
                    ->type('password', 'admin123')
                    ->press('Accedir')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Admin')
                    ->screenshot('loginAdmin')
                    ->logout();
        });


    }

    /**
    * @test
    */
    public function loginFailed()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('name', 'admin')
                    ->type('password', 'admin')
                    ->press('Accedir')
                    ->assertsee('Whoops! Something went wrong.')
                    ->screenshot('loginFailed');
        });


    }
}
