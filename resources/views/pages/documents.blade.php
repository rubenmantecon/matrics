
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
        <form action="" method="post" enctype="multipart/form-data" class="p-10">
            <div class="label-group-admin grid sm:grid-cols-2">
                <label for="DNI">Còpia del DNI:</label>
                <input class="btn" type="file" name="DNI" id="DNI" multiple><br>
            </div>                
            <div class="label-group-admin grid sm:grid-cols-2">
                <label for="Tarjeta sanitaria">Tarjeta sanitària:</label>
                <input class="btn" type="file" name="Tsanitaria" id="Tarjeta sanitaria" multiple><br>
            </div>
            <div class="label-group-admin grid sm:grid-cols-2">
                <label for="Resguard del titol">Resguard del títol:</label>
                <input class="btn" type="file" name="RTitul" id="Resguard del titol" multiple><br>
            </div>
            <div class="label-group-admin grid justify-end">
                <input class="btn primary-btn"type="submit" value="Puja arxius">
            </div>
        </form>
    </div>
</x-app-layout>

