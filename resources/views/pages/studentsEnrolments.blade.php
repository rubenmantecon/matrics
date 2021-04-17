<x-app-layout page="students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section('breadcrumbs')
    {{ Breadcrumbs::render('enrolments') }}
    @endsection
    <div class="container-form-user">
        <div class="grid grid-cols-2 gap-4 p-3">
            <div>
                <h1 class="text-2xl">{{ $career->code }}. {{ $career->name }}</h1>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4 p-3">
            @foreach ($mps as $key => $mp)
            <div class="bg-white w-full border border-gray-300" x-data="{selected:null}">
                <ul class="shadow-box">
                    <li class="relative border-b border-gray-200">
                        <button type="button" class="w-full px-8 py-6 text-left">
                            <div class="flex items-center justify-between">
                                <span>
                                    <input type="checkbox" onclick="selectedModule(this)" id="module" group="module{{ $key+1 }}" class="mr-8 appearance-none checked:bg-blue-600 checked:border-transparent">
                                    {{ $mp->code }}.{{ $mp->name}}
                                </span>
                                <span class="ico-plus text-2xl text-gray-500" @click="selected !== 1 ? selected = 1 : selected = null">
                                    <i class="fas fa-chevron-down"></i>
                                </span>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                            x-ref="module{{ $key+1 }}"
                            x-bind:style="selected == 1 ? 'max-height: ' + $refs.module{{ $key+1 }}.scrollHeight + 'px' : ''">
                            @foreach ($mp->ufs as $uf)
                            <div class="p-6">
                                <div class="ml-14 p-2.5"><input type="checkbox" id="uf" group="module{{ $key+1 }}" onclick="selectedUf(this)" class="mr-8 appearance-none checked:bg-blue-600 checked:border-transparent"> {{ $uf->code }}. {{ $uf->name}}</div>
                            </div>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 gap-4 p-3">
        </div>
    </div>
</x-app-layout>
