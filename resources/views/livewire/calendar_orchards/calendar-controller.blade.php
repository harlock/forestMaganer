<div>
    @include('livewire.orchards.acciones_huerto')
    <script>
        show_nav(), calend()
    </script>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="">
        <div class=" z-20 flex flex-none items-center justify-between border-b border border-gray-200 py-2 px-6 my-3" style="border-top: 2px solid #8cdeaa; white-space: normal">
            <div class="">
                <h1 class="text-lg font-semibold leading-6 text-gray-900">
                    <time class="sm:hidden">{{ $dia }} {{ $mespanish }} {{ $data['year'] }}</time>
                    <time class="sm:inline">{{ $dia }} {{ $mespanish }} {{ $data['year'] }}</time>
                </h1>
                <p class="mt-1 text-sm text-gray-900 font-semibold">{{$datos_orchard->name_orchard}} , Localización: {{$datos_orchard->location_orchard}} , Año de creación: {{$datos_orchard->creation_year}}</p>
            </div>
            <div class="flex items-center w-48">
                <div class="ml-6 h-6 w-px bg-gray-300"></div>
                <div x-data="{ isActive: true, open: false}">
                    <button data-dropdown-toggle="dropdown" type="button" @click="$event.preventDefault(); open = !open" role="button" aria-haspopup="true" class="focus:outline-none ml-6 rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Acciones extra
                    </button>

                    <div role="menu" x-show="open" class="border border-gray-300 my-3 rounded-lg" style="margin-left: 15px">
                        <a href="{{route('photograph',$datos_orchard->id)}}" type="button" class="bg-gray-200 w-full">
                            <button type="button" class="py-2 bg-gray-200 border border-gray-300 w-full px-3">Galeria de fotos</button>
                        </a>
                        <a href="{{route('produccion',$datos_orchard->id)}}" type="button" class="bg-gray-200 w-full">
                            <button type="button" class="py-2 bg-gray-200 border border-gray-300 w-full px-3">Mi producción </button>
                        </a>
                        <a href="{{route('fenofase',$datos_orchard->id)}}" type="button" class="bg-gray-200 w-full">
                            <button type="button" class="py-2 bg-gray-200 border border-gray-300 w-full px-3">Fenofase</button>
                        </a>
                    </div>
                    @if($modal)
                    @include('livewire.calendar_orchards.create_worday_activity')
                    @endif

                    @if($modalview_nutrient_analysi)
                    @include('livewire.nutrient_analysis.view_nutrient_analysi')
                    @endif
                </div>
            </div>
        </div>

        <div class=" bg-white">
            {{-----------------------------------------------DIAS-CALENDARIO-----------------------------------------------------}}
            <div class="flex">
                <div class="hidden w-2/5 flex-none border-l border-gray-100 py-10 px-8 md:block">
                    <div class="flex items-center text-center text-gray-900 w-3/5">
                        <button type="button" wire:click="last_year()" onclick="actualizar()" class="-m-1.5 toltip flex flex-none items-center justify-center p-1.5 text-gray-600 hover:text-gray-900">
                            <span class="sr-only">Previous month</span>
                            <!-- Heroicon name: solid/chevron-left -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="flex-auto font-semibold">{{ $mespanish }} {{ $data['year'] }}</div>
                        <button type="button" wire:click="next_year()" onclick="actualizar()" class="-m-1.5 toltip flex flex-none items-center justify-center p-1.5 text-gray-600 hover:text-gray-900">
                            <span class="sr-only">Next month</span>
                            <!-- Heroicon name: solid/chevron-right -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 grid grid-cols-7 text-center text-xs leading-6 text-gray-500">
                        <div class="hover:text-black">Lunes</div>
                        <div class="hover:text-black">Martes</div>
                        <div class="hover:text-black">Miercoles</div>
                        <div class="hover:text-black">Jueves</div>
                        <div class="hover:text-black">Viernes</div>
                        <div class="hover:text-black">Sabado</div>
                        <div class="hover:text-black">Domingo</div>
                    </div>
                    <div class="isolate mt-2 grid grid-cols-7 gap-px rounded-lg bg-gray-200 text-sm shadow ring-1 ring-gray-200 relative ">
                        @foreach($data['calendar'] as $semanas)
                        @foreach($semanas['datos'] as $dias)
                        @php $banMenor=false@endphp
                        @if($dias['fecha']<$fecha_completa) @php $banMenor=true@endphp @endif @php $band_workday=false @endphp @foreach($workdays as $workday) @if($dias['fecha']==$workday->date_work)
                            @php $band_workday=true@endphp
                            <button type="button" wire:click="{{!$banMenor?"openmodal('".$dias['fecha']."')":''}}" class="w-full {{$banMenor?'bg-gray btn-tooltip':'bg-white'}} border border-gray-100  py-1.5 text-gray-900 hover:bg-gray-100 focus:z-10 hover:border-gray-900">
                                <time class="mx-auto rounded-lg {{$banMenor?'bg-indigo-300':'bg-indigo-500'}} flex h-7 w-7 items-center justify-center rounded-full">{{$dias['dia']}}</time>
                            </button>
                            @endif
                            @endforeach
                            @if($band_workday)
                            @else
                            @if($banMenor){{--Si la fecha es menor a hoy entonces abrir tooltip--}}
                            <div class="inline group">
                                <button type="button" wire:click="{{!$banMenor?"openmodal('".$dias['fecha']."')":''}}" class="w-full {{$banMenor?'bg-gray btn-tooltip':'bg-white'}} border border-gray-100  py-1.5 text-gray-900 hover:bg-gray-100 focus:z-10 hover:border-gray-900">
                                    <time class="mx-auto rounded-lg flex h-7 w-7 items-center justify-center ">{{$dias['dia']}}</time>
                                </button>
                                <div class="invisible group-hover:visible absolute  bg-gray-900 text-gray-50 text-center text-sm rounded px-4 py-1 w-24 max-w-xs shadow-md" role="tooltip" aria-hidden="true">
                                    <p>Tiempo Caducado</p>
                                </div>
                            </div>
                            @else{{--Si es mayor o igual entonces podra asignar actividades--}}
                            <button type="button" wire:click="{{!$banMenor?"openmodal('".$dias['fecha']."')":''}}" class="w-full {{$banMenor?'bg-gray btn-tooltip':'bg-white'}} border border-gray-100  py-1.5 text-gray-900 hover:bg-gray-100 focus:z-10 hover:border-gray-900">
                                <time class="mx-auto rounded-lg flex h-7 w-7 items-center justify-center">{{$dias['dia']}}</time>
                            </button>
                            @endif
                            @endif
                            @endforeach
                            @endforeach
                    </div>
                </div>
                <!--{{--++++++++++++++++++++++++++++++++++++++++++++ACTIVIDADES++++++++++++++++++++++++++++++++++++++++++--}}-->
                <div class="w-3/5 py-8 px-10">
                    @include('livewire.calendar_orchards.workday_activity')
                </div>

            </div>
        </div>

        {{---++++++++++++++++++++++++++++++++++++++++++Elementos Activos ++++++++++++++++++++++++++++++++++++++++++---}}
        <div class="w-full bg-white">
            <div class="w-full border border-green-300 rounded-lg">
                <div class="font-extrabold text-xl text-center w-full">Análisis Nutricional</div>
                <div class="w-full">
                    <div class="flex justify-end px-10">
                        <button type="button" wire:click="openmodalnuetrient_analysis('{{$fecha_completa}}')" data-tooltip-target="tooltip-add_analysis" class="border bg-green-500 hover:bg-green-800 font-bold text-white py-1 px-3 rounded">+</button>
                        <div id="tooltip-add_analysis" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                            Agregar Analicis Nutricional
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        @if($modalnutrient_analysi)
                        @include('livewire.nutrient_analysis.create')
                        @endif
                    </div>
                    <div class="grid  sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 px-2 py-2">
                        @foreach($nutrient_analysis as $nutrient_analy)
                        <div class="border bg-indigo-50 py-2 px-2 rounded-lg mx-4 my-3">
                            <div class="flex justify-center border bg-green-200 rounded-lg font-bold">
                                <div>Análisis del dia {{$nutrient_analy->id}}</div>
                            </div>
                            <br>
                            <div class="flex justify-between px-4">
                                <button wire:click="openmodalview_nuetrient_analysis('{{$nutrient_analy->id}}')" class=" rounded-lg bg-indigo-300 border py-1 px-2 hover:bg-indigo-600 font-medium hover:text-white">Visualizar</button>
                                <button class=" rounded-lg bg-indigo-300 border py-1 px-2 hover:bg-indigo-600 font-medium hover:text-white">Descargar</button>
                            </div>
                            <br>
                            <div class="flex justify-end">
                                <button class=" rounded-lg border bg-green-500 py-1 px-2 hover:bg-green-800 font-medium hover:text-white">Modificar Archivo</button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="font-extrabold text-xl text-center w-full">Suplementos</div>

            <div class="w-full">
                @include('livewire.calendar_orchards.supplements_view')
            </div>
            <div class="flex justify-between">
                <div class="">
                    <div class="font-extrabold text-xl text-center w-full">Elementos Activos</div>
                    <div>
                        HOLA
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>