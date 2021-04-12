<x-app-layout page="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('breadcrumbs')
        {{ Breadcrumbs::render('profile') }}
    @endsection
    <div class="card">
        <div class="card-body items-center">
            <form wire:submit.prevent="updateProfileInformation" role="form">
                <div class="flex flex-wrap">
                    <div class="form-group w-full px-2 md:w-1/2">
                        <label class="block mb-1" for="state.email">NOM</label>
                        <pclass="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"><-nom-></p>
                    </div>
                
                    <div class="form-group w-full px-2 md:w-1/2">
                        <label class="block mb-1" for="state.email">PRIMER COGNOM</label>
                        <p class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"><-cognom-></p>
                    </div>
                    <div class="form-group">
                        <label for="state.email">SEGON COGNOM</label>
                        <p class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"><-telefon-></p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                    <div class="form-group w-full px-2 md:w-1/2">
                        <label class="block mb-1" for="state.email">Email</label>
                        <p class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"><-email-></p>
                    </div>                
                    <div class="form-group w-full px-2 md:w-1/2">
                        <label class="block mb-1" for="state.email">DNI</label>
                        <p class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"><-dni-></p>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="form-group">
                        <label class="block mb-1" for="state.email">ADREÇA</label>
                        <p class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"><-adreça-></p>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="form-group">
                        <label class="block mb-1" for="state.email">Poblacio</label>
                        <p class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"><-poblacion-></p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                    <div class="form-group w-full px-2 md:w-1/2">
                        <label class="block mb-1" for="state.email">Telefon</label>
                        <p class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"><-telefon-></p>
                    </div>
                    <div class="form-group w-full px-2 md:w-1/2">
                        <label class="block mb-1" for="state.email">DATA NEIXAMENT</label>
                        <p class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"><-data neixament-></p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                    <div class="form-group w-full px-2 md:w-1/2">
                        <label class="block mb-1" for="state.email">PARE</label>
                        <p class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"><-padre-></p>
                    </div>

                    <div class="form-group w-full px-2 md:w-1/2">
                        <label class="block mb-1" for="state.email">MARE</label>
                        <p class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"><-madre-></p>
                    </div>
                </div>
            </form>
            <div class="form-group">
                <label for="state.email">Solicitar cambios</label>
                <textarea class="w-full h-16 px-3 py-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline"></textarea>
            </div>
            <a href="" class="btn primary-btn">Solicitar Cambios</a>
        </div>
    </div>
</x-app-layout>
