<x-app-layout page="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('profile') }}
    @endsection
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
                <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                    <div class="form-group w-full px-2 md:w-1/2">
                        <label class="block mb-1" for="state.email">PARE</label>
                        <p class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"><-padre-></p>
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
