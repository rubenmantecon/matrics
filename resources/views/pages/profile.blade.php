<x-app-layout page="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="updateProfileInformation" role="form">
                <div class="form-group">
                    <label for="state.nom">NOM</label>
                    <p>{{ $userDetail->name }}</p>
                </div>
                
                <div class="form-group">
                    <label for="state.cognom">COGNOM</label>
                    <p>{{ $userDetail->lastname }}</p>
                </div>

                <div class="form-group">
                    <label for="state.telef">Telefon</label>
                    <p>{{ $userDetail->telefon }}</p>
                </div>

                <div class="form-group">
                    <label for="state.email">Email</label>
                    <p>{{ $userDetail->mail }}</p>
                </div>

                <div class="form-group">
                    <label for="state.dni">DNI</label>
                    <p>{{ $userDetail->dni }}</p>
                </div>


                <div class="form-group">
                    <label for="state.adre">ADREÇA</label>
                    <p>{{ $userDetail->adress }}</p>
                </div>


                <div class="form-group">
                    <label for="state.pobla">Poblacio</label>
                    <p>{{ $userDetail->poblation }}</p>
                </div>

                <div class="form-group">
                    <label for="state.date">DATA NEIXAMENT</label>
                    <p>{{ $userDetail->date }}</p>
                </div>

                <div class="form-group">
                    <label for="state.pare">PARE</label>
                    <p>{{ $userDetail->father }}</p>
                </div>

                <div class="form-group">
                    <label for="state.mare">MARE</label>
                    <p>{{ $userDetail->mather }}</p>
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
