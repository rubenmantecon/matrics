<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;

use Tests\DuskTestCase;

class ForbiddenURLTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
    * @test
    */
    public function forbiddenUrl()
    {
        User::factory()->create([
            'name'=>'test',
            'password'=>\Hash::make('test123'),
            'role'=>'alumne'

        ]);
        $this->browse(function (Browser $browser) {
            //Replace the id with one that dont have admin role
            $browser->loginAs(User::find(1))
          
                    ->visit('/admin')
                    ->pause(2000)
                    ->assertSee('No tens permisos per veure aquesta pàgina.');
                    

        });
    }
}
