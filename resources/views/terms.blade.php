<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <script>

    </script>
    <div class="terms">
        <table>
            <caption>Llistat de cursos</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Descripció</th>
                    <th>Data d'inici</th>
                    <th>Data de finalització</th>
                    <th>Creació</th>
                    <th>Darrera modificació</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody style="display: none">
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Descripció</th>
                    <th>Data d'inici</th>
                    <th>Data de finalització</th>
                    <th>Creació</th>
                    <th>Darrera modificació</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </tfoot>
        </table>
    </div>
</x-app-layout>
