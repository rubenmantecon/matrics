<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Career;
use App\Models\Term;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CareerTest extends DuskTestCase
{
    use DatabaseTransactions;

    /**
     * Can we access inside the career page being ADMIN?
     *
     * @return void
     */
    public function testAccessTermsPageAdmin()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/admin/dashboard/terms')
                    ->assertSee('Llistat de cursos');
        });
    }
}
