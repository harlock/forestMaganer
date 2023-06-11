<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-black opacity-50 transition-opacity " wire:click="closemodal()" aria-hidden="true"></div>

        <span class="hidden  "></span>

        <div class=" content-center relative inline-block bg-white rounded-lg px-4 ">
            <div class="p-2">
                <div class="p-2 justify-center   rounded-full bg-gray-100">
                    <h3 class="text-center px-2 py-2 bg-green-100 rounded-full">Actividades para el dia {{$date_work}}</h3>
                </div>
                {{----------------------------------------------ACTIVIDADES---------------------------------------}}
                <div id="Actividad" class="border rounded-lg my-4">
                    <form>
                        @if($modalworkday)
                        <div class="px-7">
                            @if($clicksave)
                            <div class="flex justify-between w-full">
                                @if($clickedit)
                                <div class="pt-2 pr-4">
                                    <h3 class=" mt-2 block text-sm font-medium text-gray-700 text-center">Fecha de trabajo</h3>
                                    <div class=" ">
                                        <input type="date" class="text-center mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Dia a trabajar" wire:model="date_work">
                                    </div>
                                    @error('date_work') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                @endif
                                <h3 class="mt-2 pt-2 pr-4 block text-sm font-medium text-gray-700 text-center">Gasto general*</h3>
                                <div class="pt-2 pr-4">
                                    <div class=" ">
                                        <input type="text" class="text-center mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Ingrese Cantidad" wire:model="general_expenses">
                                    </div>
                                    @error('general_expenses') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="flex justify-between w-full pt-2 pr-4">
                                <h3 class="py-3 block text-sm font-medium text-gray-700 text-center">Descripción*</h3>
                                <div>
                                    <textarea class=" block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" wire:model="description"></textarea>
                                </div>
                            </div>
                            <div class="pt-2 pr-4 flex justify-end">
                                <button wire:click.prevent="storeworkday()" class="text-center text-white bg-green-700 mt-1 block border border-gray-300 rounded-md shadow-sm py-1.5 px-3  font-medium">Continuar <i class="fa-solid fa-angles-right"></i></button>
                            </div>
                            @endif

                        </div>
                        <!-- segundo modal-->
                        <div class="flex content-center relative bg-white rounded-lg ">
                            @if($clicksave == false)
                            <div class=" ">
                                <div class="bg-white py-6 px-3 w-full ml-2">

                                    <div class=" justify-between w-full">
                                        <div>
                                            <div class="pt-2 pr-4">
                                                <div class="text-gray-500 font-bold pr-4">
                                                    Actividad*
                                                </div>
                                                <!--<select wire:click.prevent="changeValueCombo()" wire:model="type_job_id" class="bg-gray-200  border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white ">-->
                                                <select wire:model="type_job_id" class="bg-gray-200  border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white ">
                                                    <option value="">Selecciona opción</option>
                                                    @foreach($type_jobs as $type_job)
                                                    <option type="int" value="{{$type_job->id}}">{{$type_job->type_job}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('type_job_id') <span class="text-red-500">{{ $message }}</span>@enderror
                                            </div>


                                            <div class="pt-2 pr-4">
                                                <div class="text-gray-500 font-bold pr-4">
                                                    Costo de la actividad*
                                                </div>
                                                <div class="flex justify-between ">
                                                    <input type="text" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white " placeholder="Dia a trabajar" wire:model="cost">
                                                </div>
                                                @error('cost') <span class="text-red-500">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="px-4 py-3  sm:px-6 flex justify-center">
                                                <span class="bg-green-700 hover:bg- text-white font-bold flex   rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                                    <button wire:click.prevent="storeactiviti()" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2  text-base leading-6 font-bold text-white shadow-sm  hover:bg-green-800 focus:outline-none focus:border-green-900 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                        <i class="mt-1 fa-solid fa-plus"></i>
                                                        Agregar actividad
                                                    </button>
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class=" mx-4">
                                    <div class="py-5">
                                        <div class="bg-gray-800 rounded-t-lg">
                                            <div class="flex justify-between text-center font-semibold text-white">
                                                <div class="px-4 ">Actividad</div>
                                                <div class="px-4">Costo</div>
                                            </div>
                                        </div>

                                        @if($table_activities)
                                        @foreach($activitiesxday as $acti)
                                        <div class="flex justify-between text-center bg-gray-200 border-gray-700">
                                            <div class="px-4 ">
                                                {{$acti->typejob->type_job}}
                                            </div>
                                            <div class="px-4 ">
                                                {{$acti->cost}}
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                        <div>
                                            Presupuesto Restante:
                                        </div>
                                        @if($acti)
                                        <div class="px-4 ">
                                            {{$acti->workday->general_expenses}}
                                        </div>
                                        @endif
                                        @endif

                                    </div>
                                </div>
                            </div>


                            <div class="pt-2 pr-4">
                                @if($modalApplication == true)
                                @include('livewire.calendar_orchards.application')
                                @endif
                            </div>
                            @endif
                            @endif
                        </div>
                    </form>
                    <div class="px-4 py-3 bg-gray-100 sm:px-6 flex justify-center">
                        <span class=" bg-red-700 mt-3 flex  rounded-md shadow-sm sm:mt-0 sm:w-auto">
                            <button wire:click="closemodal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-600 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Cerrar
                            </button>
                        </span>
                    </div>
                </div>
                {{-----------------------------------------------PRODUCCION---------------------------------------}}
            </div>
        </div>
    </div>
</div>