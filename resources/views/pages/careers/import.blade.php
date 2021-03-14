<x-app-layout page="students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="import">
        <div class="btn-start-import">
            <button type="button" class="btn save">Començar Importació</button>
        </div>
        <p class="text">
            <span class="red">*</span>
            Selecciona els cicles formatius que vols importar
            <span class="red">*</span>
        </p>
        <table>
            <caption>Llistat de cicles</caption>
            <thead>
                <tr>
                    <th>Cicles Formatius</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3" class="loading inverted"></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Cicles Formatius</th>
                </tr>
            </tfoot>
        </table>
        <div class="btn-start-import">
            <button type="button" class="btn save">Començar Importació</button>
        </div>
    </div>
</x-app-layout>
