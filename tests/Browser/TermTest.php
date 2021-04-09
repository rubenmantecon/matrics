<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Term;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TermTest extends DuskTestCase
{
	use DatabaseTransactions;

    /**
     * Can we access inside the terms page being ADMIN?
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

    /**
     * Can we access inside the terms page being STUDENT?
     *
     * @return void
     */
    public function testAccessTermsPageStudent()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/admin/dashboard/terms')
                    ->assertDontSee('Llistat de cursos');
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
					->type('#name', 'Curso de prueba #182349174192')
					->type('#description', 'Esto es una prueba de curso.')
					->type('#start', '01/09/2021')
					->type('#end', '31/08/2022')
					->press('Desa')
                    ->pause(5000)
					->assertSee('Curso de prueba #182349174192');
        });
    }

	/**
     * Edit a term but now, not following the condition about the first that needs to be smaller than the second one.
     *
     * @return void
     */
    public function testEditTermNotDates()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/admin/dashboard/terms')
                    ->pause(5000)
                    ->clickAtXPath('(//button[@id="edit"])[1]')
					->type('#name', 'Curso de prueba #918233912742')
					->type('#description', 'Esto es una prueba de curso.')
					->type('#start', '01/09/2022')
					->type('#end', '31/08/2021')
					->press('Desa')
                    ->pause(5000)
					->assertDontSee('Curso de prueba #918233912742');
        });
    }

    /**
	 * Delete a term but writing wrong the name.
	 *
	 * @return void
	 */
	public function testDeleteTermWrong()
	{
		$this->browse(function (Browser $browser) {
			$browser->loginAs(User::find(1))
                    ->visit('/admin/dashboard/terms')
                    ->pause(5000)
					->clickAtXPath('(//a[@title="Elimina"])[1]')
                    ->pause(2500)
                    ->assertSee('Curso de prueba #182349174192')
                    ->type('#name', 'Curso de prueba #634932562375')
                    ->assertVisible('#remove.disabled');

		});
	}

	/**
	 * Delete a term.
	 *
	 * @return void
	 */
	public function testDeleteTerm()
	{
		$this->browse(function (Browser $browser) {
			$browser->loginAs(User::find(1))
                    ->visit('/admin/dashboard/terms')
                    ->pause(5000)
					->clickAtXPath('(//a[@title="Elimina"])[1]')
                    ->pause(2500)
                    ->assertSee('Curso de prueba #182349174192')
                    ->type('#name', 'Curso de prueba #182349174192')
                    ->press('Eliminar')
                    ->waitForReload()
                    ->pause(3000)
                    ->assertDontSee('Curso de prueba #182349174192');
		});
	}
}
