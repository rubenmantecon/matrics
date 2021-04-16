<x-app-layout page="terms">
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Dashboard') }}
		</h2>
	</x-slot>
	@section('breadcrumbs')
	{{ Breadcrumbs::render('terms') }}
	@endsection
	<div class="profile_reqs">
		<p class="text">
			<span class="red">*</span>
			Consulta i modifica els perfils de requeriment
			<span class="red">*</span>
		</p>
		<div class="">
			<div class="option flex flex-col items-center justify-center border max-w-xs rounded overflow-hidden shadow-md my-2 bg-white">
				<div class="px-4 py-2">
					<p>Monoparental</p>
				</div>
				<div class="px-6 py-4">
					<a href="/admin/dashboard/createAdmin" class="btn primary-btn">Crea admin</a>
					<ul>
						<li>This is a li</li>
						<li>Another li</li>
					</ul>
				</div>

			</div>
		</div>
		<div class="bg-dialog"></div>
		<div class="modal-term dis-none" title="Nou Curs">
			<div class="label-group">
				<label for="name">Nom: <span class="red">*</span></label>
				<input type="text" id="name" class="input">
			</div>
			<div class="label-group">
				<label for="description">Descripció: <span class="red">*</span></label>
				<input type="text" id="description" class="input">
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