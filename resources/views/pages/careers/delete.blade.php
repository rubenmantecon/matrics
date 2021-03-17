<x-app-layout page="careers">
    <div class="delete-term" data-id="{{ $career->id }}">
        <div class="modal-dialog">
            @section('breadcrumbs')
                {{ Breadcrumbs::render('career_delete', $career) }}
            @endsection
            <div class="modal-header">
                <h4 class="modal-title">Eliminació de cicle</h4>
            </div>
            <div class="modal-body">
                <h4>Estas a punt d'esborrar un cicle.</h4>
                <p>Per esborrar el cicle introueix el següent text
                    <span title="NOM" class="code">{{ $career->name }}</span> en el camp de
                    text.
                </p>
                <input id="name" type="text" class="input" placeholder="Nom">
            </div>
            <div class="modal-footer">
                <div class="buttons-group">
                    <a href="/admin/dashboard/careers" class="btn save">Tornar enrere</a>
                    <div class="or"></div>
                    <button id="remove" type="button" class="btn cancel disabled">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
