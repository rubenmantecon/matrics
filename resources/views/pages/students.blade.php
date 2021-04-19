<x-app-layout page="students">
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Dashboard') }}
		</h2>
	</x-slot>
	@section('breadcrumbs')
	{{ Breadcrumbs::render('students') }}
	@endsection
	<div class="students">
		<div class="btn-import">
			<form enctype="multipart/form-data" action="/api/students/import" method="post" id="form-file">
				<input type="file" name="file" id="file" class="dis-none">
				<label class="btn save" for="file"><i class="fas fa-file-import"></i> Importació</label>
			</form>
		</div>
		<div class="w-11/12 mx-auto flex mt-4 mb-2 justify-around items-center" id="form_alumn">
			<section class="filter flex-wrap justify-around">
				<x-input type="text" class="p-1 mt-2 xl:mt-0" placeholder="Nom" name="firstname" id="" />
				<x-input type="text" class="p-1 mt-2 xl:mt-0" placeholder="Primer cognom" name="lastname1" id="" />
				<x-input type="text" class="p-1 mt-2 xl:mt-0" placeholder="Segon cognom" name="lastname2" id="" />
				<x-input type="text" class="p-1 mt-2 xl:mt-0" placeholder="Correu electrònic" name="email" id="" />
				<x-input type="text" class="p-1 mt-2 xl:mt-0" placeholder="Codi de curs" name="career_id" id="" />
			</section>
			<button type="submit" class="filter btn primary-btn w-2/12">Filtra</button>
		</div>
		<table>
			<caption>Llistat d'alumnes</caption>
			<thead>
				<tr>
					<th>Nom</th>
					<th>Cognoms</th>
					<th>Email</th>
					<th>Cicle</th>
					<th>Estat matricula</th>
					<th>Dades</th>
				</tr>
			</thead>
			<tbody style="display: none">
				<tr>
					<td colspan="6" class="loading inverted"></td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<th>Nom</th>
					<th>Cognoms</th>
					<th>Email</th>
					<th>Cicle</th>
					<th>Estat matricula</th>
					<th>Dades</th>
				</tr>
			</tfoot>
		</table>
		<ul class="pagination"></ul>
	</div>
</x-app-layout>