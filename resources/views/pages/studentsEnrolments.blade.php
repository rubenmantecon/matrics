<x-app-layout page="students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('enrolments') }}
    @endsection
    <div class="container-form-user">
        <div class="grid grid-cols-2 gap-4 p-3">
            <div><h1>{career name}</h1></div>
            <div>
                <select class="flex w-full bg-transparent">
                    <option disabled selected>Selecciona el cicle</option>
                </select>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4 p-3">
            <div class="bg-white w-full border border-gray-300" x-data="{selected:null}">
                <ul class="shadow-box">
                    <li class="relative border-b border-gray-200">
                        <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 1 ? selected = 1 : selected = null">
                            <div class="flex items-center justify-between">
                                <span><input type="checkbox" class="mr-8 appearance-none checked:bg-blue-600 checked:border-transparent ..."> MP01. Sistemes informàtics</span>
                                <span class="ico-plus"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="module1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.module1.scrollHeight + 'px' : ''">
                            <div class="p-6">
                                <div class="ml-14 p-2.5"><input type="checkbox" class="mr-8 appearance-none checked:bg-blue-600 checked:border-transparent ..."> UF1. Instal·lació, configuració i explotació del sistema informàtic</div>
                                <div class="ml-14 p-2.5"><input type="checkbox" class="mr-8 appearance-none checked:bg-blue-600 checked:border-transparent ..."> UF2. Gestió de la informació i de recursos en una xarxa</div>
                            </div>
                        </div>
                    </li>
                    <li class="relative border-b border-gray-200">
                        <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 2 ? selected = 2 : selected = null">
                            <div class="flex items-center justify-between">
                                <span><input type="checkbox" class="mr-8 appearance-none checked:bg-blue-600 checked:border-transparent ..."> MP01. Sistemes informàtics</span>
                                <span class="ico-plus"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="module2" x-bind:style="selected == 1 ? 'max-height: ' + $refs.module2.scrollHeight + 'px' : ''">
                            <div class="p-6">
                                <div class="ml-14 p-2.5"><input type="checkbox" class="mr-8 appearance-none checked:bg-blue-600 checked:border-transparent ..."> UF1. Instal·lació, configuració i explotació del sistema informàtic</div>
                                <div class="ml-14 p-2.5"><input type="checkbox" class="mr-8 appearance-none checked:bg-blue-600 checked:border-transparent ..."> UF2. Gestió de la informació i de recursos en una xarxa</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 p-3">
        </div>
    </div>
</x-app-layout>
