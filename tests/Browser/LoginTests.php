<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTests extends DuskTestCase
{
        use DatabaseMigrations;

    /**
    * @test
    */
    public function LoginStudent()
    {
        User::factory()->create([
            'name'=>'test',
            'password'=>\Hash::make('test123'),
            'role'=>'alumne'

        ]);
        
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('name', 'test')
                    ->type('password', 'test123')
                    ->press('Accedir')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Student')
                    ->pause(2000)
                    ->logout();
        });
    }

    /**
    * @test
    */
    public function LoginAdmin()
    {
        User::factory()->create([
            'name'=>'admin',
            'password'=>\Hash::make('admin123'),
            'role'=>'admin'

        ]);
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('name', 'admin')
                    ->type('password', 'admin123')
                    ->press('Accedir')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Admin')
                    ->pause(2000)
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
                    ->pause(2000);
                    
        });


    }
}
