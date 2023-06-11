<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-black opacity-50 transition-opacity " wire:click="closeModalPopover()" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
            <div>
                <div class="rounded-full bg-green-100 px-4 pl-6 py-2 border w-full text-center">
                    <!-- Heroicon name: outline/check -->
                    {{--<svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>--}}
                    <h3 class="items-center">NUEVA PRODUCCIÓN</h3>
                </div>
                <div class="mt-3 text-center sm:mt-5">
                    <div class="mt-2">
                        <!--FORMULARIO-->
                        <form enctype="multipart/form-data">
                            <div class="shadow sm:rounded-md sm:overflow-hidden ">
                                <div class=" sm:rounded-md sm:overflow-hidden shadow-lg shadow-indigo-500/40">
                                    <div class="bg-white py-6 px-4 space-y-6 sm:p-6 ">
                                        <div class="grid grid-cols-6 gap-6">
                                            <!--
                                            <div class="col-span-6 ">
                                                <div class="pt-2 pr-4 ">
                                                    <h3 class="text-center block text-sm font-medium text-gray-700 pr-4">Huerto </h3>
                                                    <select wire:model="orchard_id" class="text-center mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        <option value="">Selecciona opción</option>
                                                        @foreach($orchards as $orcha)
                                                        <option type="int" value="{{$orcha->id}}">{{$orcha->name_orchard}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('orchard_id') <span class="text-red-500">{{ $message }}</span>@enderror
                                            </div>
                    -->
                                            <div class="col-span-6 ">
                                                <div class="pt-2 pr-4">
                                                    <h3 class="block text-sm font-medium text-gray-700 text-center">Toneladas de Cosecha</h3>
                                                    <div class=" ">
                                                        <input type="text" class="text-center mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Toneladas de cosecha" wire:model="ton_harvest">
                                                    </div>
                                                    @error('ton_harvest') <span class="text-red-500">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-span-6 ">
                                                <div class="pt-2 pr-4">
                                                    <h3 class="block text-sm font-medium text-gray-700 text-center">Fecha de Producción</h3>
                                                    <div class=" ">
                                                        <input type="date" class="text-center mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Fecha de Producción" wire:model="date_production">
                                                    </div>
                                                    @error('date_production') <span class="text-red-500">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-span-6 ">
                                                <div class="pt-2 pr-4">
                                                    <h3 class="block text-sm font-medium text-gray-700 text-center">Costo Total de Venta</h3>
                                                    <div class=" ">
                                                        <input type="text" class="text-center mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Ventas" wire:model="sale">
                                                    </div>
                                                    @error('sale') <span class="text-red-500">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-span-6 ">
                                                <div class="pt-2 pr-4">
                                                    <h3 class="block text-sm font-medium text-gray-700 text-center">Porcentaje de Daño</h3>
                                                    <div class=" ">
                                                        <input type="text" class="text-center mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Porcentaje de daño" wire:model="damage_percentage">
                                                    </div>
                                                    @error('damage_percentage') <span class="text-red-500">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="px-4 py-3 bg-gray-100 sm:px-6 flex justify-center">
                                <span class=" bg-red-700 mt-3 flex  rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                    <button wire:click="closeModalPopover()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-600 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Cerrar
                                    </button>
                                </span>
                                <span class="px-7"></span>
                                <span class="bg-green-700 hover:bg- text-white font-bold flex   rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2  text-base leading-6 font-bold text-white shadow-sm  hover:bg-green-800 focus:outline-none focus:border-green-900 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Guardar
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
