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
        <div class="grid grid-cols-4 gap-4 p-3">
            <div class="col-span-3">
                <h1 class="text-2xl"><span id="codeCareer">{{ $career->code }}</span>. {{ $career->name }}</h1>
            </div>
            <div class="p-1.5 border-gray-200 bg-white w-full border border-gray-300">
                <label>
                    <input type="checkbox" id="allCourse" onchange="selectedAllCourse(this)" class="mr-2 appearance-none checked:bg-blue-600 checked:border-transparent" checked>
                    Fer tot el curs
                </label>
            </div>
        </div>
        <div id="selectionCareerIncomplete" class="grid grid-cols-1 gap-4 p-3">
            @foreach ($mps as $key => $mp)
            <div class="bg-white w-full border border-gray-300" x-data="{selected:null}">
                <ul class="shadow-box">
                    <li class="relative border-b border-gray-200">
                        <button type="button" class="w-full px-8 py-6 text-left">
                            <div class="flex items-center justify-between">
                                <label>
                                    <input type="checkbox" onchange="selectedModule(this)" id="module" group="module{{ $key+1 }}" class="mr-8 appearance-none checked:bg-blue-600 checked:border-transparent disabled:opacity-50" checked>
                                    {{ $mp->code }}. {{ $mp->name}}
                                </label>
                                <span class="ico-plus text-2xl text-gray-500" @click="selected !== 1 ? selected = 1 : selected = null">
                                    <i class="fas fa-chevron-down"></i>
                                </span>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                            x-ref="module{{ $key+1 }}"
                            x-bind:style="selected == 1 ? 'max-height: ' + $refs.module{{ $key+1 }}.scrollHeight + 'px' : ''">
                            @foreach ($mp->ufs as $uf)
                            <div class="p-6">
                                <label class="ml-14 p-2.5">
                                    <input type="checkbox" id="uf" group="module{{ $key+1 }}" onclick="selectedUf(this)" class="mr-8 appearance-none checked:bg-blue-600 checked:border-transparent disabled:opacity-50" checked>
                                    {{ $uf->code }}. {{ $uf->name}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
            @endforeach
        </div>

        <div class="grid grid-cols-4 gap-4 p-3">
            <div></div>
            <div></div>
            <div class="text-right">Total</div>
            <div id="totalSelected" class="text-center">0</div>
        </div>

        <script type="text/javascript" defer>
            calculatePrice({!! $rights !!});

            $('.container-form-user input[type=checkbox]').change(function() {
                calculatePrice({!! $rights !!});
            });
        </script>
    </div>
</x-app-layout>
