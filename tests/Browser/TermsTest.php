<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Term;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TermsTest extends DuskTestCase
{
    /**
     * Can we access inside the terms page?
     *
     * @return void
     */
    public function testAccessTermsPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/admin/dashboard/terms')
                    ->assertSee('Llistat de cursos');
        });
    }

    /**
     * Create a new term.
     *
     * @return void
     */
    public function testCreateNewTerm()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/admin/dashboard/terms')
                    ->pause(5000)
                    ->press('Afegeix un nou curs')
                    ->type('#name', 'Curso de prueba #2309123912')
                    ->type('#description', 'Esto es un curso de prueba.')
                    ->type('#start', '05/01/2021')
                    ->type('#end', '05/01/2022')
                    ->press('Crea')
                    ->pause(5000)
                    ->assertSee('Curso de prueba #2309123912');
        });
    }

    /**
     * Create a new term but now, not following the condition about the first that needs to be smaller than the second one.
     *
     * @return void
     */
    public function testCreateNewTermNotDates()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/admin/dashboard/terms')
                    ->pause(5000)
                    ->press('Afegeix un nou curs')
                    ->type('#name', 'Curso de prueba #9223403084')
                    ->type('#description', 'Esto es un curso de prueba.')
                    ->type('#start', '05/01/2022')
                    ->type('#end', '05/01/2021')
                    ->press('Crea')
                    ->pause(5000)
                    ->assertDontSee('Curso de prueba #9223403084');
        });
    }

    /**
     * Edit a term.
     *
     * @return void
     */
    public function testEditTerm()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/admin/dashboard/terms')
                    ->pause(5000)
                    ->clickAtXPath('(//button[@id="edit"])[1]')
                    ->clear('#name')
                    ->clear('#name')'#description', '#start', '#end']);
        });
    }
}
