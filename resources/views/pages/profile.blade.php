<x-app-layout page="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container-form">
        <div class="card-body">
            <form role="form">
                <div class="form-group">
                    <label for="state.nom">NOM</label>
                    <p>{{ Auth::user()->name }}</p>
                </div>
                
                <div class="form-group">
                    <label for="state.cognom">COGNOM</label>
                    <p>{{ Auth::user()->firstname }}</p>
                </div>

                <div class="form-group">
                    <label for="state.email">Email</label>
                    <p>{{ Auth::user()->email }}</p>
                </div>

                <div class="form-group">
                    <label for="state.dni">DNI</label>
                    <p>{{ $enrollments[0]->dni }}</p>
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
