<x-app-layout page="students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="students">
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

    </div>
</x-app-layout>
