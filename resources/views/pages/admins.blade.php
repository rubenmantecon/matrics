<x-app-layout page="admins">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('admins') }}
    @endsection
    <div class="admins">
        <table>
            <caption>Llistat de admins</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuari</th>
                    <th>Email</th>
                    <th>Nom</th>
                    <th>Cognom</th>
                    <th>Segon cognom</th>
                    <th>Edita</th>
                    <th>Elimina</th>
                </tr>
            </thead>
            <tbody style="display: none">
                <tr>
                    <td colspan="10" class="loading inverted"></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Usuari</th>
                    <th>Email</th>
                    <th>Nom</th>
                    <th>Cognom</th>
                    <th>Segon cognom</th>
                    <th>Edita</th>
                    <th>Elimina</th>
                </tr>
            </tfoot>
        </table>
        <div class="bg-dialog"></div>
        <div class="modal-term dis-none" title="Nou Admin">
            <div class="label-group">
                <label for="user">Usuari: <span class="red">*</span></label>
                <input type="text" id="user" class="input" name="user">
            </div>
            <div class="label-group">
                <label for="email">Email: <span class="red">*</span></label>
                <input type="text" id="email" class="input" name="email">
            </div>
            <div class="row">
                <div class="label-group">
                    <label for="name">Nom: <span class="red">*</span></label>
                    <input type="text" id="name" class="input" name="name">
                </div>
                <div class="label-group">
                    <label for="surname">Cognom: <span class="red">*</span></label>
                    <input type="text" id="surname" class="input" name="surname">
                </div>
                <div class="label-group">
                    <label for="secondsurname">Segon cognom: <span class="red">*</span></label>
                    <input type="text" id="secondsurname" class="input" name="secondsurname">
                </div>
            </div>
            <div class="row">
                <div class="label-group">
                    <label for="password    ">Password: <span class="red">*</span></label>
                    <input type="password" id="password" class="input" name="password">
                </div>
                <div class="label-group">
                    <label for="password-confirmation">Password confirmation: <span class="red">*</span></label>
                    <input type="password" id="password-confirmation" class="input" name="password-confirmation">
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
