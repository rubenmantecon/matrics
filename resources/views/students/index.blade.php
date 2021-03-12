<x-app-layout page="students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="students">
        <div class="btn-import">
            <form enctype="multipart/form-data" action="/api/students/import" method="post" id="form-file">
                <input type="file" name="file" id="file" class="dis-none">
                <label class="btn save" for="file"><i class="fas fa-file-import"></i> Impotació</label>
            </form>
        </div>
        <table>
            <caption>Llistat d'alumnes</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Creació</th>
                    <th>Darrera modificació</th>
                </tr>
            </thead>
            <tbody style="display: none">
                <tr>
                    <td colspan="5" class="loading inverted"></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Creació</th>
                    <th>Darrera modificació</th>
                </tr>
            </tfoot>
        </table>
        <ul class="pagination"></ul>
    </div>
</x-app-layout>
