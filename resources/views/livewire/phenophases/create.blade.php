<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-black opacity-50 transition-opacity " wire:click="closeModalPopover()" aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>


        <div class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
            <div>
                <div class="justify-center   rounded-full bg-gray-100">
                    <h3 class="text-center px-2 py-2 bg-green-100 rounded-full">NUEVA PHENOPHASE</h3>
                </div>
                <div class="mt-3 text-center sm:mt-5">
                    <div class="mt-2">
                        <!--FORMULARIO-->
                        <form>
                            <div class="shadow sm:rounded-md sm:overflow-hidden ">
                                <div class=" sm:rounded-md sm:overflow-hidden shadow-lg shadow-indigo-500/40">
                                    <div class="bg-white px-4 sm:p-6 ">

                                        <div class="pt-2 pr-4">
                                            <h3 class="block text-sm font-medium text-gray-700 text-center">Fenofase</h3>
                                            <div class=" ">
                                                <input type="text" class="text-center mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Escribe tu fenologia" wire:model="phenophase">
                                            </div>
                                            @error('phenophase') <span class="text-red-500">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="pt-2 pr-4">
                                            <h3 class="block text-sm font-medium text-gray-700 text-center">Descripcción</h3>
                                            <div class=" ">
                                                <input type="text" class="text-center mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Escribe su descripcción" wire:model="description">
                                            </div>
                                            @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="rounded-lg col-span-6  ">
                                            <label class="text-center block text-sm font-medium text-gray-700"> Cargar Imagen </label>
                                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md ">
                                                <div class="space-y-1 text-center items-center">
                                                    @if ($image)
                                                        <img src="{{method_exists($image, 'TemporaryUrl')?$image->TemporaryUrl():asset("storage/". $image)}}" alt="no carga imagen" width="100px" height="100px">
                                                    @else
                                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    @endif

                                                    <div class="flex text-sm text-gray-600">
                                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                            <span>Cargar Imagen</span>
                                                            <input id="file-upload" name="file-upload" type="file" class="sr-only" class="sshadow appearance-none border rounded-full" placeholder="Path image" wire:model="image">
                                                        </label>
                                                        <p class="pl-1"> o arrastrar y soltar </p>
                                                    </div>
                                                    <p class="text-xs text-gray-500">PNG, JPG, GIF hasta 10MB</p>
                                                </div>
                                            </div>
                                            @error('image') <span class="text-red-500">{{ $message }}</span>@enderror
                                        </div>

                                    </div>
                                </div>


                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse flex justify-between">
                                <div class="mt-5 sm:mt-6">
                                    <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-800 text-base leading-6 font-bold text-white shadow-sm hover:border-gray-900 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Guardar
                                    </button>
                                </div>
                                <div class="mt-5 sm:mt-6">
                                    <button wire:click="closeModalPopover()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2  bg-red-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
