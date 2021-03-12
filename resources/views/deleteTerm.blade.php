<x-app-layout page="terms">
    <div class="delete-term" data-id="{{ $term->id }}" data-name="{{ $term->name }}"
        data-desc="{{ $term->description }}" data-start="{{ $term->start }}" data-end="{{ $term->end }}"
        data-updated="{{ $term->updated_at }}">
        <div class="modal-dialog">
        @section('breadcrumbs')
            {{ Breadcrumbs::render('term', $term) }}
        @endsection
            <div class="modal-header">
                <h4 class="modal-title">Eliminació de curs</h4>
            </div>
            <div class="modal-body">
                <h4>Estas a punt d'esborrar un curs.</h4>
                <p>Per esborrar el curs introueix el següent text
                    <span title="NOM" class="code">{{ $term->name }}</span> en el camp de
                    text.
                </p>
                <input id="name" type="text" class="input" placeholder="Nom">
            </div>
            <div class="modal-footer">
                <div class="buttons-group">
                    <a href="/admin/dashboard/terms" class="btn save">Tornar enrere</a>
                    <div class="or"></div>
                    <button id="remove" type="button" class="btn cancel disabled">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
