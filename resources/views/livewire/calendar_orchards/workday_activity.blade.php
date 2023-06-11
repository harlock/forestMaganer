<header class="w-full text-center text-teal-900 font-extrabold">
    Actividades en el mes de <br> {{$mespanish}}
</header>
<div class=" w-full"></div>
<div class="bg-green-50 rounded-lg" style="padding: 10px">
    <div class="bg-gray-800 rounded-t-lg">
        <div class="flex justify-between text-center font-semibold text-white">
            <div class="w-1/4">
                Actividad
            </div>
            <div class="w-1/4">
                Costo
            </div>
            <div class="w-1/4">
                Visualizar
            </div>
            <div class="w-1/4">
                Estado
            </div>
        </div>
    </div>

    <div class="">
        @foreach($data['calendar'] as $semanas)
        @foreach($semanas['datos'] as $dias)
        @if($dias['mes'] == $mesingles)
        @foreach($workdays as $work)
        @if($dias['fecha'] == $work->date_work)

        <div class="flex justify-center text-center ">
            <div class="flex justify-center text-center font-bold rounded-full w-full bg-gray-300">{{$work->date_work}}</div>
        </div>

        @foreach($activities as $activity)
        @if($activity->workday->id == $work->id)
        <div class="flex justify-between text-center font-semibold">
            <div class="w-1/4 py-2">{{$activity->typejob->type_job}}
            </div>

            {{--<div class="w-1/5 py-2">{{date('d',strtotime($activity->workday->date_work))}}
        </div>--}}


        <div class="w-1/4 py-2">$ {{$activity->cost}}</div>
        <div class="w-1/4 py-2 content-center">
            <button data-tooltip-target="tooltip-activiti{{$activity->id}}" class="bg-green-700 text-white rounded-full w-1/2 py-1 hover:bg-green-500">ver</button>
            <div id="tooltip-activiti{{$activity->id}}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                {{$activity->typejob->description}}
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            @if($activity->typejob->type == "suplemento")
            <div class="py-2">
            <button class="bg-green-700 text-white rounded-full p-2 hover:bg-green-500"   wire:click="openmodalsupplements({{$activity->workday->id}},'{{$activity->typejob->type_job}}',{{$activity->id}})">ver suplementos
            </button>
            </div>
            
            @endif
            @if($supplements_modal == true)
            @include('livewire.supplies_orchards.registered_supplies')
            @endif
        </div>
        @if($activity->status == "pendiente")
        <div class="w-1/4 py-1 px-4">
            <!-- DETECTOR DE ACTIVIDADES QUE NECESITAN UN SUPLEMENTO
            @if($activity->typejob->type == "suplemento")
            <button wire:click="openmodalsupplements({{$activity->workday->id}},'{{$activity->typejob->type_job}}',{{$activity->id}})" data-tooltip-target="tooltip-pendiente" class="w-full px-2 rounded-lg py-1 border border-indigo-400 bg-red-300 hover:bg-red-500 hover:text-white" type="button"><i class="fa-solid fa-pen-to-square"></i>{{$activity->workday->id}},'{{$activity->typejob->type_job}}',{{$activity->id}}</button>
            @else
            <button wire:click="do_activiti({{$activity->id}},{{$activity->workday->id}})" data-tooltip-target="tooltip-pendiente" class="w-full px-2 rounded-lg py-1 border border-indigo-400 bg-red-300 hover:bg-red-500 hover:text-white" type="button"><i class="fa-solid fa-right-to-bracket"></i></button>
            @endif
            <div id="tooltip-pendiente" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                Presiona para finalizar tarea
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
-->
            <button wire:click="do_activiti({{$activity->id}},{{$activity->workday->id}})" data-tooltip-target="tooltip-pendiente" class="w-full px-2 rounded-lg py-1 border border-indigo-400 bg-red-300 hover:bg-red-500 hover:text-white" type="button"><i class="fa-solid fa-right-to-bracket"></i></button>
            <div id="tooltip-pendiente" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                Presiona para finalizar tarea
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
        @elseif($activity->status == "realizado")
        <div class="w-1/4 py-1 px-4">
            <div class="w-full rounded-lg py-1 " data-tooltip-target="tooltip-realizado"><i class="fa-solid fa-check-double"></i></div>
            <div id="tooltip-realizado" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                Actividad Realizada
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
        @endif

    </div>

    <div class="flex justify-center">
        {{--<div class="suraya-blue"></div>--}}
    </div>
    @endif
    @endforeach
    @endif
    @endforeach
    @endif
    @endforeach
    @endforeach
</div>