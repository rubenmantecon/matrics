<x-app-layout page="students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="import">
        <form method="post" action="https://css-tricks.com/examples/DragAndDropFileUploading//?"
            enctype="multipart/form-data" novalidate="" class="box has-advanced-upload">
            <div id="drag" class="ui placeholder segment">
                <div class="ui icon header">
                    <i class="fas fa-file-csv icon"></i>
                    Arrossega l'arxiu o selecciona-ho amb el botó per començar amb la importació.
                </div>
                <input type="file" name="file-csv" id="file-csv" class="dis-none">
                <label class="btn primary-btn" for="file-csv">Seleccionar .CSV</label>
            </div>
        </form>
    </div>
</x-app-layout>
