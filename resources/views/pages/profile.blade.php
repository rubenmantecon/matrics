<x-app-layout page="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('profile') }}
    @endsection
    <div class="container-form-user p-10">
        <div class="card-body">
            <form role="form">
                <div class="form-group grid sm:grid-cols-2">
                    <label for="state.nom">NOM</label>
                    <p>{{ Auth::user()->name }}</p>
                </div>
                
                <div class="form-group grid sm:grid-cols-2">
                    <label for="state.cognom">COGNOM</label>
                    <p>{{ Auth::user()->firstname }}</p>
                </div>

                <div class="form-group grid sm:grid-cols-2">
                    <label for="state.email">EMAIL</label>
                    <p>{{ Auth::user()->email }}</p>
                </div>

                <div class="form-group grid sm:grid-cols-2">
                    <label for="state.dni">DNI</label>
                    <p>{{ $enrollments[0]->dni }}</p>
                </div>
                <div class="form-group grid sm:grid-cols-2">
                    <label for="state.address">Adreça</label>
                    <p>{{ $enrollments[0]->address }}</p>
                </div>
                <div class="form-group grid sm:grid-cols-2">
                    <label for="state.population">Poblacio</label>
                    <p>{{ $enrollments[0]->population }}</p>
                </div>
                <div class="form-group grid sm:grid-cols-2">
                    <label for="state.phone_number">Telefon</label>
                    <p>{{ $enrollments[0]->phone_number }}</p>
                </div>
                <div class="form-group grid sm:grid-cols-2">
                    <label for="state.emergency_number">Telefon d'emergència </label>
                    <p>{{ $enrollments[0]->emergency_number }}</p>
                </div>
                <div class="form-group grid sm:grid-cols-2">
                    <label for="state.postal_code">Codigo Postal</label>
                    <p>{{ $enrollments[0]->postal_code }}</p>
                </div>
            </form>
            <div class="form-group pt-5">
                <label for="state.cambio">Solicitar cambios:</label>
                <textarea class="form-textarea border-black border-opacity-50 mt-1 block w-full " rows="3"></textarea>
            </div>
            <div class="label-group-admin grid justify-end pt-5">
                <a href="" class="btn primary-btn">Solicitar Cambios</a>
            </div>
        </div>
    </div>
</x-app-layout>
