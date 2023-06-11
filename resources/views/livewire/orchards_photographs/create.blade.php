<div class="fixed z-10 inset-0 overflow-y-auto content-start" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0 content-start">

        <div class="fixed inset-0 bg-black opacity-50 transition-opacity content-start" wire:click="closeModalPopover()" aria-hidden="true"></div>


        <div class="relative inline-blockrelative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all w-2/3 content-start">
            <div class="content-start">
                <div class="rounded-full bg-green-100 px-4 pl-6 py-2 border w-full text-center content-start">
                    <!-- Heroicon name: outline/check -->
                    {{--<svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>--}}
                    <h3 class="items-center">NUEVA FOTOGRAFÍA</h3>
                </div>

                <div class="mt-3 text-center sm:mt-5">
                    <div class="mt-2">
                        <!--FORMULARIO-->
                        <form enctype="multipart/form-data">
                            <div class="shadow sm:rounded-md sm:overflow-hidden ">
                                <div class=" sm:rounded-md sm:overflow-hidden shadow-lg shadow-indigo-500/40">
                                    <div class="bg-white py-6 px-4 space-y-6 sm:p-6 ">
                                        <div class="grid gap-6 sm:grid-cols-1 lg:grid-cols-6">

                                            <div class="col-span-3 ">
                                                <div class=" pt-2 pr-4 ">
                                                    <h3 class="text-center block text-sm font-medium text-gray-700 pr-4">Tipo de Foto </h3>
                                                    <select wire:model="type_photograph_id" class="text-center mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        <option value="">Tipo de Foto</option>
                                                        @foreach($type_photographs as $type_photograph)
                                                        <option type="int" value="{{$type_photograph->id}}">{{$type_photograph->type_photograph}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('type_photograph_id') <span class="text-red-500">{{ $message }}</span>@enderror
                                            </div>

                                            <div class="col-span-3 ">
                                                <div class="pt-2 pr-4">
                                                    <h3 class="block text-sm font-medium text-gray-700 text-center">Fecha</h3>
                                                    <div class=" ">
                                                        <input type="date" class="text-center mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Fecha" wire:model="date">
                                                    </div>
                                                    @error('date') <span class="text-red-500">{{ $message }}</span>@enderror
                                                </div>
                                            </div>

                                            <div class="col-span-3">
                                                <div class="pt-2 pr-4">
                                                    <h3 class="text-center block text-sm font-medium text-gray-700">Nota</h3>
                                                    <div class="" >
                                                        <textarea name="note" cols="30" rows="" class="text-center mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Nota" wire:model="note"></textarea>
                                                    </div>
                                                    @error('note') <span class="text-red-500">{{ $message }}</span>@enderror
                                                </div>
                                            </div>

                                            <div class="rounded-lg col-span-3  ">
                                                <label class="text-center block text-sm font-medium text-gray-700"> Cargar Imagen </label>
                                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md ">
                                                    <div class="space-y-1 text-center items-center ">
                                                        @if ($path)
                                                        <div class="pb-2">
                                                            <img src="{{method_exists($path, 'TemporaryUrl')?$path->TemporaryUrl():asset("storage/". $path)}}" alt="no carga imagen" width="200px" height="200px">
                                                        </div>
                                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                            <span>Cambiar Imagen</span>
                                                            <input id="file-upload" name="file-upload" type="file" class="sr-only" class="sshadow appearance-none border rounded-full" placeholder="Path " wire:model="path">
                                                        </label>
                                                        @else
                                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>

                                                        <div class="flex text-sm text-gray-600">
                                                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                                <span>Cargar Imagen</span>
                                                                <input id="file-upload" name="file-upload" type="file" class="sr-only" class="sshadow appearance-none border rounded-full" placeholder="Path " wire:model="path">
                                                            </label>
                                                            <p class="pl-1"> o arrastrar y soltar </p>
                                                        </div>
                                                        <p class="text-xs text-gray-500">PNG, JPG, GIF hasta 10MB</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                @error('path') <span class="text-red-500">{{ $message }}</span>@enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-100 sm:px-6 flex justify-center">
                                    <span class=" bg-red-700 mt-3 flex rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                        <button wire:click="closeModalPopover()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-600 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                            Cerrar
                                        </button>
                                    </span>
                                    <span class="px-7"></span>
                                    <span class="bg-green-700 mt-3 text-white font-bold flex rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                        <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 text-base leading-6 font-bold text-white shadow-sm  hover:bg-green-800 focus:outline-none focus:border-green-900 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
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
</div>