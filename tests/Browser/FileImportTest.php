<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;



class FileImportTest extends DuskTestCase
{
    use DatabaseMigrations;
    

    /**
    * @test
    */

    public function createCurso()
    {
        $user=User::factory()->create([
        'role'=>'admin'
        ]);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs(User::find($user->id))
                    ->visit('/admin/dashboard/terms')
                    ->pause(5000)
                    ->press('Afegeix un nou curs')
                    ->type('#name', 'Curso de prueba #2309123812')
                    ->type('#description', 'Esto es un curso de prueba.')
                    ->type('#start', '05/01/2021')
                    ->type('#end', '05/01/2022')
                    ->press('Crea')
                    ->pause(2000)
                    ->assertSee('Curso de prueba #2309123812')
                    ->visit('/admin/dashboard/terms')
                    ->pause(2000)
                    ->clickLink('Curso de prueba #2309123812')
                    ->attach('file-csv', __DIR__.'/../TestFiles/a-llista-Cicles.csv')
                    ->pause(2000)
                    ->script([
                        "var inputDiv = document.getElementsByTagName('tbody')[0];
                        var numberOfInput=inputDiv.getElementsByTagName('input').length;
                        
                        for (i = 0; i<numberOfInput; i++) {

                          document.getElementById('check-'+i).checked = true;
                        }
                        "

                        
                    ]);
            $browser->press('Començar Importació')
                    ->pause(2000)
                    ->visit('/admin/dashboard/students')
                    ->attach('file', __DIR__.'/../TestFiles/alumnes-admesos.csv')
                    ->pause(1000);
                    

        });
    }
    
    

    

    
}
