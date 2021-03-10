<x-app-layout page="logs">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="logs">
        <table>
            <caption>Visor de registres</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuari</th>
                    <th>Categoria</th>
                    <th>Descripció</th>
                    <th>Data de registre</th>
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
                    <th>Usuari</th>
                    <th>Categoria</th>
                    <th>Descripció</th>
                    <th>Data de registre</th>
                </tr>
            </tfoot>
        </table>

    </div>
</x-app-layout>
