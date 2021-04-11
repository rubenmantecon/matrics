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
                    <label for="state.email">NOM</label>
                    <p><-nom-></p>
                </div>

                <div class="form-group">
                    <label for="state.email">COGNOM</label>
                    <p><-cognom-></p>
                </div>

                <div class="form-group">
                    <label for="state.email">Telefon</label>
                    <p><-telefon-></p>
                </div>

                <div class="form-group">
                    <label for="state.email">Email</label>
                    <p><-email-></p>
                </div>

                <div class="form-group">
                    <label for="state.email">DNI</label>
                    <p><-dni-></p>
                </div>


                <div class="form-group">
                    <label for="state.email">ADREÇA</label>
                    <p><-adreça-></p>
                </div>


                <div class="form-group">
                    <label for="state.email">Poblacio</label>
                    <p><-poblacion-></p>
                </div>

                <div class="form-group">
                    <label for="state.email">Telefon</label>
                    <p><-telefon-></p>
                </div>

                <div class="form-group">
                    <label for="state.email">DATA NEIXAMENT</label>
                    <p><-data neixament-></p>
                </div>

                <div class="form-group">
                    <label for="state.email">PARE</label>
                    <p><-padre-></p>
                </div>

                <div class="form-group">
                    <label for="state.email">MARE</label>
                    <p><-madre-></p>
                </div>

            </form>
            <div class="form-group">
                <label for="state.email">Solicitar cambios</label>
                <textarea>cambios</textarea>.
            </div>
            <a href="" class="btn primary-btn">Solicitar Cambios</a>
        </div>
    </div>
</x-app-layout>
