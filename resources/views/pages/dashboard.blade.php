<x-app-layout page="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    @if(Auth::user()->role == 'admin')
    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection
    <div class="options p-10">
        <div class="option flex items-center justify-center border max-w-xs rounded overflow-hidden shadow-md my-2 bg-white">
            <div class="px-4 py-2">
                <img src="{{ asset('images/cursos.png') }}" alt="logo" class="logo w-24 m-4"/>
            </div>
            <div class="px-6 py-4">
                <a href="/admin/dashboard/terms" class="btn primary-btn">Cursos</a>
            </div>
        </div>
        <div class="option flex items-center justify-center border max-w-xs rounded overflow-hidden shadow-md my-2 bg-white">
            <div class="px-4 py-2">
                <img src="{{ asset('images/icono-alumno.png') }}" alt="logo" class="logo w-24 m-4"/>
            </div>
            <div class="px-6 py-4">
                <a href="/admin/dashboard/students" class="btn primary-btn">Alumnes</a>        
            </div>
        </div>
    </div>
    @else
    <div class="flex flex-col">
        <div class="flex items-center justify-center w-full h-24">
            <h2>Estat de la matricula</h2>
        </div>
        <div class="flex items-center justify-center w-full">
            <div class="px-6 py-4">
                <a href="/dashboard/profile" class="btn primary-btn">Dades de l'usuari</a>
            </div>
            <div class="px-6 py-4">
                <a href="/admin/dashboard/terms" class="btn primary-btn">Recalcular matricula</a>
            </div>
            <div class="px-6 py-4">
                <a href="/documents" class="btn primary-btn">Documents</a>
            </div>
        </div>
    </div>
    @endif

</x-app-layout>
