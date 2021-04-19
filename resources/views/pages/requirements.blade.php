<x-app-layout page="requirements">
	@section('breadcrumbs')
        {{ Breadcrumbs::render('requirements') }}
    @endsection
        <form action="enrolments" method="post" class="form" required>
			@csrf
			<div class="container-form-user">
			@if(count($profile_req) > 0)
				<label for="code">Perfils de requeriments: <span class="red">*</span></label>
				@foreach ($profile_req as $prof)
				     <div>
					    <input type="checkbox" id="pr_{{$prof->id}}" name="pr[]" value="{{$prof->id}}">
					    <label for="pr_{{$prof->id}}"> {{$prof->name}}</label>
					</div>
				@endforeach
			@endif
			<div class="grid w-full justify-center ">
				<div class="p-4">
					<p>DERECHOS DE IMAGEN</p>
					<input type="radio" id="pr_image_permit" name="pr_image" value="yes" required>
					<label for="pr_image_permit"> Permetre</label>
					<input type="radio" id="pr_image_deny" name="pr_image" value="no">
					<label for="pr_image_deny"> Denegar</label>
				</div>
				
				<div  class="p-4">
					<p>AUTORIZACION DE SALIDAS</p>
					<input type="radio" id="pr_excursions_permit" name="pr_excursions" value="yes" required>
					<label for="pr_excursions_permit"> Permetre</label>
					<input type="radio" id="pr_excursions_deny" name="pr_excursions" value="no">
					<label for="pr_excursions_deny"> Denegar</label>
				</div>
				
				<div class="p-4">
					<p>AUTORIZACION DE EXTRAESCOLARES</p>
					<input type="radio" id="pr_extracurricular_permit" name="pr_extracurricular" value="yes" required>
					<label for="pr_extracurricular_permit"> Permetre</label>
					<input type="radio" id="pr_extracurricular_deny" name="pr_extracurricular" value="no">
					<label for="pr_extracurricular_deny"> Denegar</label>
				</div>
				<input type="submit" class="btn save my-4" value="Siguiente">
			</div>

			<!--
			https://stackoverflow.com/questions/8287779/how-to-use-the-required-attribute-with-a-radio-input-field
			
			TODO:
				DERECHOS DE IMAGEN
				AUTORIZACION DE SALIDAS
				AUTORIZACION DE EXTRAESCOLARES
			-->
		    </div>
        </form>
</x-app-layout>

