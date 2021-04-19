
<x-app-layout page="documents"> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('breadcrumbs')
        {{ Breadcrumbs::render('documents') }}
    @endsection
    <div class="container-form-user">
        <form action="/api/documents" id="documentForm" method="post" enctype="multipart/form-data" class="p-10">
            @csrf
            <div class="label-group-admin grid sm:grid-cols-2">
                <label for="DNI">Còpia del DNI:</label>
                <input class="btn" type="file" name="DNI" id="DNI" multiple><br>
            </div>    
            <div class="label-group-admin grid sm:grid-cols-2">
                <label for="Tarjeta sanitaria">Tarjeta sanitària:</label>
                <input class="btn" type="file" name="tarjeta_sanitaria" id="tarjeta_sanitaria" multiple><br>
            </div>
            <div class="label-group-admin grid sm:grid-cols-2">
                <label for="Resguard del titol">Resguard del títol:</label>
                <input class="btn" type="file" name="resguard_del_titol" id="resguard_del_titol" multiple><br>
            </div>
            <div class="label-group-admin grid sm:grid-cols-2">
                <label for="Resguard del pagament">Resguard de pagament:</label>
                <input class="btn" type="file" name="resguard_del_pagament" id="resguard_del_pagament" multiple><br>
            </div> 
            <div class="label-group-admin grid justify-end">
                <input class="btn primary-btn"type="submit" value="Puja arxius">
            </div>           
        </form>
    </div>
</x-app-layout>

