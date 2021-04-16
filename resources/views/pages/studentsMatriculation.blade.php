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
        <form class="form-alumn-data" action="/api/enrolments" method="POST">
            @method('PATCH')
            @csrf
            <input type="hidden" id="user_id" name="user_id">
            <input type="hidden" id="term_id" name="term_id">
            <div class="row">
                <div class="label-group">
                    <label for="firstname">Nom Alumne: </label>
                    <input type="text" id="firstname" name="firstname" class="input">
                </div>
                <div class="label-group">
                    <label for="lastname1">Cognom 1: </label>
                    <input type="text" id="lastname1" name="lastname1" class="input">
                </div>
                <div class="label-group">
                    <label for="lastname2">Cognom 2: </label>
                    <input type="text" id="lastname2" name="lastname2" class="input">
                </div>
            </div>
            <div class="row">
                <div class="label-group">
                    <label for="name">Nom d'usuari: </label>
                    <input type="text" id="name" name="name" class="input">
                </div>
                <div class="label-group">
                    <label for="email">Email: </label>
                    <input type="mail" id="email" name="email" class="input">
                </div>
                <div class="label-group">
                    <label for="dni">DNI: </label>
                    <input type="text" id="dni" name="dni" class="input">
                </div>
            </div>

            <div class="row new-user" style="display: none">
                <div class="label-group cycle">
                    <label for="term">Curs: </label>
                    <select name="term" id="term">
                    </select>
                </div>
                <div class="label-group cycle">
                    <label for="career">Cicle Formatiu: </label>
                    <select name="career" id="career">
                    </select>
                </div>
            </div>

            <div class="row account-user">
                <div class="label-group cycle">
                    <label for="career">Curs: </label>
                    <input readonly id="career" class="input">
                </div>
                <div class="label-group cycle">
                    <label for="cycle">Cicle Formatiu: </label>
                    <input readonly id="cycle" class="input">
                </div>
            </div>
            <div class="label-group modules">
                <label for="modules">Moduls: </label>
                <ul class="list" id="modules">
                </ul>
            </div>

            <div class="label-group">
                <label for="modules">Requeriments: </label>
            </div>

            <div class="row btns">
                <a href="/admin/dashboard/students" class="btn cancel">Cancelar</a>
                <button class="btn save" type="submit">Desar</button>
            </div>
        </form>
    </div>
</x-app-layout>
