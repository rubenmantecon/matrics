<x-app-layout page="enrolments">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('students') }}
    @endsection
    <div class="enrolments">
        <form class="form-alumn-data" action="#" method="post">
            @csrf
            <!-- RECOMENDACIOND DE BACKEND ADMIN CREAR UN COLLAPSIBLE PARA ESTAS OPCIONES CON EL NOMBRE "DETALLS D'ALUMNE" -->
            <div class="row">
                <div class="label-group">
                    <label for="name">Nom Alumne: </label>
                    <input type="text" id="name" class="input">
                </div>
                <div class="label-group">
                    <label for="surname1">Cognom 1: </label>
                    <input type="text" id="surname1" class="input">
                </div>
                <div class="label-group">
                    <label for="surname2">Cognom 2: </label>
                    <input type="text" id="surname2" class="input">
                </div>
            </div>
            <div class="row">
                <div class="label-group">
                    <label for="username">Nom d'usuari: </label>
                    <input type="text" id="username" class="input">
                </div>
                <div class="label-group">
                    <label for="mail">Email: </label>
                    <input type="mail" id="mail" class="input">
                </div>
            </div>

            <!-- RECOMENDACIOND DE BACKEND ADMIN CREAR UN COLLAPSIBLE PARA ESTAS OPCIONES CON EL NOMBRE DE "CICLE Y MODULS" -->
            <div class="label-group">
                <label for="cycle">Cicle Formatiu: </label>
                <input readonly id="cycle" class="input">
            </div>
            <div class="label-group">
                <label for="modules">Moduls: </label>
                <ul class="list" id="modules">
                </ul>
            </div>

            <!-- RECOMENDACIOND DE BACKEND ADMIN CREAR UN COLLAPSIBLE PARA ESTAS OPCIONES CON EL NOMBRE DE "REQUERIMENTS" -->
            <div class="label-group">
                <label for="modules">Requeriments: </label>
                <p>FALTA QUE EL FRONT DE LOS ALUMNOS HAGA LO SUYO PARA PODER VER LOS REQUERIMINETOS</p>
            </div>
            
            <button class="btn cancel">Cancelar</button>
            <button class="btn save">Desar</button>
        </form>
    </div>
</x-app-layout>
