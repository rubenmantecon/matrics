<x-app-layout page="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="updateProfileInformation" role="form">
                <div class="form-group">
                    <label for="state.nom">NOM</label>
                    <p><-nom-></p>
                </div>
                
                <div class="form-group">
                    <label for="state.cognom">COGNOM</label>
                    <p><-cognom-></p>
                </div>

                <div class="form-group">
                    <label for="state.telef">Telefon</label>
                    <p><-telefon-></p>
                </div>

                <div class="form-group">
                    <label for="state.email">Email</label>
                    <p><-email-></p>
                </div>

                <div class="form-group">
                    <label for="state.dni">DNI</label>
                    <p><-dni-></p>
                </div>


                <div class="form-group">
                    <label for="state.adre">ADREÇA</label>
                    <p><-adreça-></p>
                </div>


                <div class="form-group">
                    <label for="state.pobla">Poblacio</label>
                    <p><-poblacion-></p>
                </div>

                <div class="form-group">
                    <label for="state.date">DATA NEIXAMENT</label>
                    <p><-data neixament-></p>
                </div>

                <div class="form-group">
                    <label for="state.pare">PARE</label>
                    <p><-padre-></p>
                </div>

                <div class="form-group">
                    <label for="state.mare">MARE</label>
                    <p><-madre-></p>
                </div>

            </form>
            <div class="form-group">
                <label for="state.cambio">Solicitar cambios</label>
                <textarea>cambios</textarea>.
            </div>
            <a href="" class="btn primary-btn">Solicitar Cambios</a>
        </div>
    </div>
</x-app-layout>
