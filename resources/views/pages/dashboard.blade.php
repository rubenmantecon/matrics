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
        <div class="option flex items-center justify-center border max-w-xs rounded overflow-hidden shadow-md my-2 bg-white">
            <div class="px-4 py-2">
                <img src="{{ asset('images/admin.png') }}" alt="logo" class="logo w-24 m-4"/>
            </div>
            <div class="px-6 py-4">
                <a href="/admin/dashboard/createAdmin" class="btn primary-btn">Crea admin</a>
            </div>
        </div>
    </div>
    @else
    <!-- @section('breadcrumbs')
        {{ Breadcrumbs::render('home') }}
    @endsection -->
    <div class="flex items-center justify-around px-10">
        <div class="flex flex-col items-center w-full">
            <h2 class="font-bold text-xl p-6 flex items-center">ESTAT DE LA MATRICULA:
                <button class="statuscancel ml-2"></button>
                <button class="statusnothing ml-2"></button>
            </h2>
            <div class="w-1/2 text-center container-formlights mt-5 statesdiv content-start">
                <p class="pb-2">Estat dels documents:</p>
                <span title="Cap document pujat">
                    <div class="flex flex-wrap justify-between border-double border-4 border-light-blue-500 mt-2 w-full text-xl p-2">
                        <label>DNI:</label> 
                        <div class="flex items-center">
                            <button class="statusnothing ml-2"></button>
                            <button class="statusnothing ml-2"></button>
                            <button class="statusnothing ml-2"></button>
                        </div>
                    </div>
                </span>
                <span title="Document acceptat">
                    <div class="flex flex-wrap justify-between border-double border-4 border-green-500 mt-2 w-full text-xl p-2">
                        <label>CatSalut:</label> 
                        <div class="flex items-center">
                            <button class="statusnothing ml-2"></button>
                            <button class="statusnothing ml-2"></button>
                            <button class="statusok ml-2"></button>
                        </div>
                    </div>
                </span>
                <span title="Document pendent de verificar">
                    <div class="flex flex-wrap justify-between border-double border-4 border-yellow-500 mt-2 w-full text-xl p-2">
                        <label>Títol acadèmic:</label> 
                        <div class="flex items-center">
                            <button class="statusnothing ml-2"></button>
                            <button class="statusprocesing ml-2" alt="Pendent de verificar"></button>
                            <button class="statusnothing ml-2"></button>
                        </div>
                    </div>
                </span>
                <span title="Document rebutjat. Torna a pujar correctament.">
                    <div class="flex flex-wrap justify-between border-double border-4 border-red-500 mt-2 w-full text-xl p-2">
                        <label>Comprovant banc:</label>
                        <div class="flex items-center">
                            <button class="statuscancel ml-2"></button>
                            <button class="statusnothing ml-2"></button>
                            <button class="statusnothing ml-2"></button>
                        </div>
                    </div>
                </span>
            </div>
        </div>
        <div class="options flex flex-col items-center w-full">
            <div class="option flex items-center justify-center border max-w-xs rounded overflow-hidden shadow-md my-2 bg-white">
                <div class="px-4">
                    <img src="{{ asset('images/usuari.png') }}" alt="logo" class="logo w-24 m-4"/>
                </div>

            
                <div class="px-6 py-4">
                    <a href="/dashboard/profile" class="btn primary-btn">Dades personals</a>
                </div>
            </div>
            <div class="option flex items-center justify-center border max-w-xs rounded overflow-hidden shadow-md bg-white">
                <div class="px-4">
                    <img src="{{ asset('images/matricula.png') }}" alt="logo" class="logo w-24 m-4"/>
                </div>
                <div class="px-6 py-4">
                    <a href="/dashboard/requirements" class="btn primary-btn">Recalcula matricula</a>
                </div>
            </div>
            <div class="option flex items-center justify-center border max-w-xs rounded overflow-hidden shadow-md my-2 bg-white">
                <div class="px-4">
                    <img src="{{ asset('images/docs.png') }}" alt="logo" class="logo w-24 m-4"/>
                </div>
                <div class="px-6 py-4">
                    <a href="/dashboard/documents" class="btn primary-btn">Documents</a>
                </div>
            </div>
        </div>
    </div>
    @endif

</x-app-layout>
