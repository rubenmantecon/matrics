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
                    <label for="state.email">Name</label>
                    <p><-nombre-></p>
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
                    <label for="state.email">Telefon</label>
                    <p><-telefon-></p>
                </div>

                <div class="form-group">
                    <label for="state.email">Localidad</label>
                    <p><-localidad-></p>
                </div>
            </form>
            <div class="form-group">
                <label for="state.email">Solicitar cambios</label>
                <textarea>cambios</textarea>.
            </div>
            <a href="/admin/dashboard/terms" class="btn primary-btn">Solucitar</a>
            <a href="/dashboard" class="btn primary-btn">Solucitar</a>
        </div>
    </div>
</x-app-layout>
