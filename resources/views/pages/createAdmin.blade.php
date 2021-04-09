<x-app-layout page="createAdmin">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('createAdmin') }}
    @endsection
    <div class="container-form-admin">
        <form method="POST" action={{ route('dashboard') }}>
            @csrf

            <!-- Username -->
            <div class="label-group-admin">
                <x-label for="username" :value="__('Username')" />

                <x-input id="username" class="input block mt-1 h-8" type="text" name="username" :value="old('username')" required
                    autofocus />
            </div>

            <!-- Name -->
            <div class="label-group-admin">
                <x-label for="firstname" :value="__('Firstame')" />

                <x-input id="firstname" class="input block mt-1 h-8" type="text" name="firstname" :value="old('firstname')" required
                    autofocus />
            </div>

            <!-- Surname -->
            <div class="label-group-admin">
                <x-label for="lastname1" :value="__('Lastname1')" />

                <x-input id="lastname1" class="input block mt-1 h-8" type="text" name="lastname1" :value="old('lastname1')" required
                    autofocus />
            </div>

            <!-- Second Surname -->
            <div class="label-group-admin">
                <x-label for="lastname2" :value="__('Lastname2')" />

                <x-input id="lastname2" class="input block mt-1 h-8" type="text" name="lastname2" :value="old('lastname2')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="label-group-admin">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="input block mt-1 h-8" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="label-group-admin">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="input block mt-1 h-8" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="label-group-admin">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="input block mt-1 h-8 " type="password" name="password_confirmation"
                    required />
            </div>

            <div class="flex items-center justify-center mt-4">
                <a class="underline text-sm text-yellow-600 hover:text-yellow-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
