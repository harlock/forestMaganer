<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-black opacity-50 transition-opacity " wire:click="closeModalPopover()" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
            <div>
                <div class="justify-center   rounded-full bg-gray-100">
                    <h3 class="text-center px-2 py-2 bg-green-100 rounded-full">NUEVA MUESTRA DE NUTRIENTES</h3>
                </div>

                <div class="bg-white space-y-6  px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                    <div class="flex ">
                    <h3 class="items-center pt-2 pr-4">Analisis nutrimental</h3>
                        <select wire:model="nutrient_analysi_id" class=" rounded-full  px-4 pl-6 py-2 border w-full">
                            <option value="">Analisis nutrimental</option>
                            @foreach($nutrient_analysis as $nutri_anali)
                            <option type="int" value="{{$nutri_anali->id}}">{{$nutri_anali->date_sample}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex">
                    <h3 class="items-center pt-2 pr-4">Unidades </h3>
                        <select wire:model="unit_id" class=" rounded-full  px-4 pl-6 py-2 border w-full">
                            <option value="">Unidades</option>
                            @foreach($units as $uni)
                            <option type="int" value="{{$uni->id}}">{{$uni->description}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex">
                    <h3 class="items-center pt-2 pr-4">Elementos Quimicos </h3>
                        <select wire:model="chemical_element_id" class=" rounded-full  px-4 pl-6 py-2 border w-full">
                            <option value="">Elementos Quimicos</option>
                            @foreach($chemical_elements as $che_ele)
                            <option type="int" value="{{$che_ele->id}}">{{$che_ele->chemical_code}}
                            </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="flex">
                        <h3 class="items-center pt-2 pr-4">Porcentaje</h3>
                        <input type="text" class="sshadow appearance-none border w-full rounded-full" placeholder="Porcentaje" wire:model="percentege">
                        @error('percentege') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="flex">
                        <h3 class="items-center pt-2 pr-4">Lote</h3>
                        <input type="text" class="sshadow appearance-none border w-full rounded-full" placeholder="Lote" wire:model="lot">
                        @error('lot') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>




                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse flex justify-between">
                        <div class="mt-5 sm:mt-6">
                            <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-primary text-base leading-6 font-bold text-white shadow-sm hover:border-gray-900 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Save
                            </button>
                        </div>
                        <div class="mt-5 sm:mt-6">
                            <button wire:click="closeModalPopover()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2  bg-red-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                                Close
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>