<x-app-layout page="careers">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('careers') }}
    @endsection
    <div class="careers">
        <div class="btn-import">
            <form enctype="multipart/form-data" action="/admin/dashboard/careers/import" method="POST" id="form-file">
                <input type="file" name="file-csv" id="file-csv" class="dis-none">
                <label class="btn save" for="file-csv"><i class="fas fa-file-import"></i> Importació</label>
            </form>
        </div>
        <table>
            <caption>Llistat de cicles del curs <a class="return-term link" href="/admin/dashboard/terms">{{ 'CURSO' }}</a></caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Codi</th>
                    <th>Nom</th>
                    <th>Descripció</th>
                    <th>Hores</th>
                    <th>Data d'inici</th>
                    <th>Data de fi</th>
                    <th>Edita</th>
                    <th>Elimina</th>
                </tr>
            </thead>
            <tbody style="display: none">
                <tr>
                    <td colspan="9" class="loading inverted">Cargando...</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Codi</th>
                    <th>Nom</th>
                    <th>Descripció</th>
                    <th>Hores</th>
                    <th>Data d'inici</th>
                    <th>Data de fi</th>
                    <th>Edita</th>
                    <th>Elimina</th>
                </tr>
            </tfoot>
        </table>
        <div class="bg-dialog"></div>
        <div class="modal-term dis-none" title="Nou Cicle">
        	<div class="label-group">
                <label for="code">Codi: <span class="red">*</span></label>
                <input type="text" id="code" class="input">
            </div>
            <div class="label-group">
                <label for="name">Nom: <span class="red">*</span></label>
                <input type="text" id="name" class="input">
            </div>
            <div class="label-group">
                <label for="description">Descripció: <span class="red">*</span></label>
                <input type="text" id="description" class="input">
            </div>
            <div class="label-group">
                <label for="hours">Hores: <span class="red">*</span></label>
                <input type="text" id="hours" class="input">
            </div>
            <div class="row">
                <div class="label-group">
                    <label for="start">Data d'inici: <span class="red">*</span></label>
                    <input type="text" id="start" class="input">
                </div>
                <div class="label-group">
                    <label for="end">Data de fi: <span class="red">*</span></label>
                    <input type="text" id="end" class="input">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
