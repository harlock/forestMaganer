<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-black opacity-50 transition-opacity " wire:click="closeModalPopover()" aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>


        <div class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
            <div>
                <div class="mx-auto flex items-center justify-center h-12 w-full rounded-full bg-gray-50">
                    <!-- Heroicon name: outline/check -->
                    {{--<svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>--}}
                    <h3 class="items-center">NUEVO MODO DE APLICACION</h3>
                </div>
                <div class="mt-3 text-center sm:mt-5">
                    <div class="mt-2">
                        <!--FORMULARIO-->
                        <form>
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                                <select wire:model="application_id" class="form-control">
                                    <option value="">--Aplicacion--</option>
                                    @foreach($applications as $aapl)
                                    <option type="int" value="{{$aapl->id}}">{{$aapl->date}}
                                    </option>
                                    @endforeach
                                </select>

                                <select wire:model="chemical_element_id" class="form-control">
                                    <option value="">--elemento chimico--</option>
                                    @foreach($chemical_elements as $che)
                                    <option type="int" value="{{$che->id}}">{{$che->chemical_code}}
                                    </option>
                                    @endforeach
                                </select>

                                <select wire:model="unit_id" class="form-control">
                                    <option value="">--unidad--</option>
                                    @foreach($units as $unidad)
                                    <option type="int" value="{{$unidad->id}}">{{$unidad->description}}
                                    </option>
                                    @endforeach
                                </select>

                                <div class="">
                                    <div class="mb-4">
                                        <input type="text" class="sshadow appearance-none border w-full" placeholder="dosis" wire:model="dose">
                                        @error('dose') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                            </div>


                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Guardar
                                    </button>
                                </span>
                                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                    <button wire:click="closeModalPopover()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Cerrar
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>