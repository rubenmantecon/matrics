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
		<section class="filter">
			<input type="text" placeholder="Nom" name="firstname" id="">
			<input type="text" placeholder="Primer cognom" name="lastname1" id="">
			<input type="text" placeholder="Segon cognom" name="lastname2" id="">
			<input type="text" placeholder="Correu electrònic" name="email" id="">
			<input type="text" placeholder="Codi de curs" name="career_id" id="">
		</section>

		<button type="submit" class="filter">Filtra</button>
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