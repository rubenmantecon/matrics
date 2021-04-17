<x-app-layout page="profile_reqs">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('terms') }}
    @endsection
    <div class="profile-req">
        <p class="text">
            <span class="red">*</span>
            Consulta i modifica els perfils de requeriment
            <span class="red">*</span>
        </p>
		<div class="btn-create-profile">
			<button type="button" class="btn save" id="new-profile">Crear nou perfil</button>
		</div>
        <div class="cards">
        </div>
        <div class="bg-dialog"></div>
        <div class="modal-profile-req dis-none" title="Nou Perfil de Requeriments">
            <div class="label-group">
                <label for="name">Nom: <span class="red">*</span></label>
                <input type="text" id="name" name="name" class="input">
            </div>
        </div>
        <div class="modal-req dis-none" title="Nou Requeriment">
            <div class="row">
                <div class="label-group">
                    <label for="profile_id">Perfil de requeriment: <span class="red">*</span></label>
                    <select id="profile_id" name="profile_id" clase="input"></select>
                </div>
                <div class="label-group">
                    <label for="name">Nom Requeriment: <span class="red">*</span></label>
                    <input type="text" id="name" name="name" class="input">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
