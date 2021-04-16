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
    @section('breadcrumbs')
        {{ Breadcrumbs::render('home') }}
    @endsection
    <div class="grid grid-cols-2 justify-center">
        <div class="flex flex-col items-center">
            <h2 class="font-bold text-2xl p-6">ESTAT DE LA MATRICULA:
                <button class="statuscancel ml-2 flex-initial"></button>
                <button class="statusnothing ml-2 flex-initial"></button>
                <button class="statusnothing ml-2 flex-initial"></button>
            </h2>
            <div class="items-center justify-center w-1/2 text-center container-formlights mt-5 statesdiv content-start">
                <p class="pb-2">Estat dels documents:</p>
                <span title="Cap document pujat">
                    <div class="border-double border-4 border-light-blue-500 w-1/2 mt-2 w-full text-xl p-2">
                        <label>DNI:</label> 
                        <button class="statusnothing ml-2 flex-initial"></button>
                        <button class="statusnothing ml-2 flex-initial"></button>
                        <button class="statusnothing ml-2 flex-initial"></button>
                    </div>
                </span>
                <span title="Document acceptat">
                    <div class="border-double border-4 border-green-500 w-1/2 mt-2 w-full text-xl p-2">
                        <label>CATSALUT:</label> 
                        <button class="statusnothing ml-2 flex-initial"></button>
                        <button class="statusnothing ml-2 flex-initial"></button>
                        <button class="statusok ml-2 flex-start"></button>
                    </div>
                </span>
                <span title="Document pendent de verificar">
                    <div class="border-double border-4 border-yellow-500 w-1/2 mt-2 w-full text-xl p-2">
                        <label>TÍTOL ACADÈMIC:</label> 
                        <button class="statusnothing ml-2 flex-initial"></button>
                        <button class="statusprocesing ml-2 flex-initial" alt="Pendent de verificar"></button>
                        <button class="statusnothing ml-2 flex-initial"></button>
                    </div>
                </span>
                <span title="Document rebutjat. Torna a pujar correctament.">
                    <div class="border-double border-4 border-red-500 w-1/2 mt-2 w-full text-xl p-2">
                        <label>PAGAMENT:</label>
                        <button class="statuscancel ml-2 flex-initial"></button>
                        <button class="statusnothing ml-2 flex-initial"></button>
                        <button class="statusnothing ml-2 flex-initial"></button>
                    </div>
                </span>
            </div>
        </div>
        <div class="options flex flex-col items-center">
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
