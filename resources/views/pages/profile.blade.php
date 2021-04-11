<x-app-layout page="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <form role="form">
                <div class="form-group">
                    <label for="state.nom">NOM</label>
                    <p>{{ $data->name }}</p>
                </div>
                
                <div class="form-group">
                    <label for="state.cognom">COGNOM</label>
                    <p>{{ $data->lastname }}</p>
                </div>

                <div class="form-group">
                    <label for="state.telef">Telefon</label>
                    <p>{{ $data->phone }}</p>
                </div>

                <div class="form-group">
                    <label for="state.email">Email</label>
                    <p>{{ $data->email }}</p>
                </div>

                <div class="form-group">
                    <label for="state.dni">DNI</label>
                    <p>{{ $data->dni }}</p>
                </div>


                <div class="form-group">
                    <label for="state.adre">ADREÇA</label>
                    <p>{{ $data->adress }}</p>
                </div>


                <div class="form-group">
                    <label for="state.pobla">Poblacio</label>
                    <p>{{ $data->poblation }}</p>
                </div>

                <div class="form-group">
                    <label for="state.date">DATA NEIXAMENT</label>
                    <p>{{ $data->date }}</p>
                </div>

                <div class="form-group">
                    <label for="state.pare">PARE</label>
                    <p>{{ $data->father }}</p>
                </div>

                <div class="form-group">
                    <label for="state.mare">MARE</label>
                    <p>{{ $data->mather }}</p>
                </div>

            </form>
            <div class="form-group">
                <label for="state.cambio">Solicitar cambios</label>
                <textarea>cambios</textarea>.
            </div>
            <a href="" class="btn primary-btn">Solicitar Cambios</a>
        </div>
    </div>
</x-app-layout>
