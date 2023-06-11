<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-black opacity-50 transition-opacity " wire:click="closemodalnuetrient_analysis()" aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>


        <div class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
            <div>
                <div class="mx-auto flex items-center justify-center h-12 w-full rounded-full bg-green-100">
                    <h3 class="items-center">Lanzar Analicis Nutricional</h3>
                </div>
                <div class="mt-3 text-center sm:mt-5 border rounded">
                    <div class="mt-2">
                        <!--FORMULARIO-->
                        <form>
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="">
                                    <div class="mb-4">
                                        <input type="file" wire:model="path_nutrient_analysi" class="form-control shadow rounded-lg appearance-none border w-full" placeholder="Inserte el archivo pdf">
                                        @error('path_nutrient_analysi') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                </div>


                            </div>


                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex  flex justify-center">
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button wire:click.prevent="save_nutrient_analisi()" type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-800 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Guardar
                                    </button>
                                </span>
                                <div class="w-1/2"></div>
                                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                    <button wire:click="closemodalnuetrient_analysis()" type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
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
