<x-app-layout page="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if(Auth::user()->role == 'admin')
    <div class="flex justify-center space-x-4 p-10">
        <div class="flex items-center justify-center border max-w-xs rounded overflow-hidden shadow-md my-2 bg-white">
            <div class="px-4 py-2">
                <img src="{{ asset('images/cursos.png') }}" alt="logo" class="logo w-24 m-4"/>
            </div>
            <div class="px-6 py-4">
                <a href="admin/dashboard/terms" class="btn primary-btn">Cursos</a>
            </div>
        </div>
        <div class="flex items-center justify-center border max-w-xs rounded overflow-hidden shadow-md my-2 bg-white">
            <div class="px-4 py-2">
                <img src="{{ asset('images/icono-alumno.png') }}" alt="logo" class="logo w-24 m-4"/>
            </div>
            <div class="px-6 py-4">
                <a class="btn primary-btn">Alumnes</a>        
            </div>
        </div>
    </div>
    @endif

</x-app-layout>
