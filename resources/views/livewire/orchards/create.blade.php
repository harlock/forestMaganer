<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-black opacity-50 transition-opacity " wire:click="closeModalPopover()" aria-hidden="true"></div>

        <span class="hidden  "></span>

        <div class=" content-center relative inline-block bg-white rounded-lg px-4   ">
            <div>
                <div class=" bg-white  px-4  ">
                    <div class="mt-6  py-4  flex items-center justify-center  w-full rounded-lg ring-4 ring-green-500 ring-opacity-50 ">
                        <h3 class="items-center text-black  ">CREACIÓN DE MI HUERTO</h3>
                    </div>
                    <p class="mt-1 text-sm text-blue-600 items-center text-center font-bold">Una vez creado, podras ver la información en el momento que lo desees</p>
                </div>

                <div class="">

                    <!--FORMULARIO-->
                    <form class=" multipart/form-data">
                        <div class="py-6 px-4 space-y-6  ">
                            <div class=" grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 ">

                                <div class=" items-center mb-6 mx-8">
                                    <div class="">
                                        <label class=" text-gray-500 font-bold pr-4">Nombre del huerto*</label>
                                    </div>
                                    <div class="">
                                        <input type="text" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white " placeholder="Nombre de huerto" wire:model="name_orchard">
                                    </div>
                                    @error('name_orchard') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <div class=" items-center mb-6 mx-8">
                                    <div class="">
                                        <label class=" text-gray-500 font-bold pr-4">Tipo de Aguacate*</label>
                                    </div>
                                    <div class="">
                                        <select wire:model="type_avocado_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white ">
                                            <option value="">Selecciona una opción</option>
                                            @foreach($type_avocados as $type_avocado)
                                            <option type="int" value="{{$type_avocado->id}}">{{$type_avocado->type_avocado}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('type_avocado_id') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <div class=" items-center mb-6 mx-8">
                                    <div class="">
                                        <label class=" text-gray-500 font-bold pr-4">Tipo de Topografía*</label>
                                    </div>
                                    <div class="">
                                        <select wire:model="type_topography_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                                            <option value="">Selecciona una opción</option>
                                            @foreach($type_topographies as $type_topopraphy)
                                            <option type="int" value="{{$type_topopraphy->id}}">{{$type_topopraphy->type_topography}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('type_topography_id') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <div class=" items-center mb-6 mx-8">
                                    <div class="">
                                        <label class=" text-gray-500 font-bold pr-4">Tipo de Suelo*</label>
                                    </div>
                                    <div class="">
                                        <select wire:model="type_soil_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                                            <option value="">Selecciona una opción</option>
                                            @foreach($type_soils as $type_soil)
                                            <option type="int" value="{{$type_soil->id}}">{{$type_soil->type_soil}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('type_soil_id') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <div class=" items-center mb-6 mx-8">
                                    <div class="">
                                        <label class=" text-gray-500 font-bold pr-4">Tipo de Clima*</label>
                                    </div>
                                    <div class="">
                                        <select wire:model="climate_type_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                                            <option value="">Selecciona una opción</option>
                                            @foreach($climate_types as $climate_type)
                                            <option type="int" value="{{$climate_type->id}}">{{$climate_type->climate_type}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('climate_type_id') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <div class=" items-center mb-6 mx-8">
                                    <div class="">
                                        <label class=" text-gray-500 font-bold pr-4">Ubicación*</label>
                                    </div>
                                    <div class="">
                                        <input type="text" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white " placeholder="Localización del huerto" wire:model="location_orchard">
                                    </div>
                                    @error('location_orchard') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <!--
                                            <div>
                                                {{--<input type="hidden" wire:model="user_id" value="{{$user->id}}">--}}
                                            </div>
                                -->

                                {{--*********************************IMAGE**********************************--}}

                                <div class="sm:col-span-2 md:col-span-2 lg:col-span-3 xl:col-span-3 ">
                                    <label class="text-center block text-sm font-medium text-gray-700"> Cargar imagen* </label>
                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md ">
                                        <div class="space-y-1 text-center items-center">
                                            @if ($path_image)
                                            <div class="pb-2">
                                                <img src="{{method_exists($path_image, 'TemporaryUrl')?$path_image->TemporaryUrl():asset("storage/". $path_image)}}" alt="no carga imagen" width="200px" height="200px">
                                            </div>
                                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Cambiar imagen</span>
                                                <input id="file-upload" name="file-upload" type="file" class="sr-only" class="sshadow appearance-none border rounded-full" placeholder="Path image" wire:model="path_image">
                                            </label>
                                            @else
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Cargar imagen</span>
                                                    <input id="file-upload" name="file-upload" type="file" class="sr-only" class="sshadow appearance-none border rounded-full" placeholder="Path image" wire:model="path_image">
                                                </label>
                                                <p class="pl-1"> o arrastrar y soltar </p>
                                            </div>
                                            <p class="text-xs text-gray-500">PNG, JPG, GIF hasta 10MB</p>
                                            @endif
                                        </div>
                                    </div>
                                    @error('path_image') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <div class=" items-center mb-6 mx-8">
                                    <div class="">
                                        <label class=" text-gray-500 font-bold pr-4">Punto*</label>
                                    </div>
                                    <div class="">
                                        <input type="text" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" placeholder="Punto" wire:model="point">
                                    </div>
                                    @error('point') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <div class=" items-center mb-6 mx-8">
                                    <div class="">
                                        <label class=" text-gray-500 font-bold pr-4">Área*</label>
                                    </div>
                                    <div class="">
                                        <input type="text" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" placeholder="Área" wire:model="area">
                                    </div>
                                    @error('area') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <div class=" items-center mb-6 mx-8">
                                    <div class="">
                                        <label class=" text-gray-500 font-bold pr-4">Altitud*</label>
                                    </div>
                                    <div class="">
                                        <input type="text" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" placeholder="Altitud" wire:model="altitude">
                                    </div>
                                    @error('altitude') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <div class=" items-center mb-6 mx-8">
                                    <div class="">
                                        <label class=" text-gray-500 font-bold pr-4">Superficie*</label>
                                    </div>
                                    <div class="">
                                        <input type="text" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" placeholder="Superficie" wire:model="surface">
                                        <!--
                                        <select name="tipo" class="climate_type_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                                            <option value="">area</option>
                                            <option value="metro">mts²</option>
                                            <option value="hectarea">hect²</option>
                                        </select>
                                        -->
                                    </div>
                                    @error('surface') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <div class=" items-center mb-6 mx-8">
                                    <div class="">
                                        <label class=" text-gray-500 font-bold pr-4">Distancia de plantado*</label>
                                    </div>
                                    <div class="">
                                        <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" placeholder="Distancia" wire:model="planting_density">
                                            <option value="">Selecciona una opción</option>
                                            <option value="3.5">a 2.5 mtrs</option>
                                            <option value="4">a 3 mtrs</option>
                                            <option value="4.5">a 3.5 mtrs</option>
                                            <option value="5">a 4 mtrs</option>
                                            <option value="6">a 4.5 mtrs</option>
                                            <option value="7">a 5 mtrs</option>
                                            <option value="8">a 5.5 mtrs</option>
                                            <option value="9">a 6 mtrs</option>
                                            <option value="10">a 7 mtrs</option>
                                            <option value="10">a 7.5 mtrs</option>
                                            <option value="10">a 8 mtrs</option>
                                            <option value="10">a 8.5 mtrs</option>
                                            <option value="10">a 9 mtrs</option>
                                        </select>
                                    </div>
                                    @error('plant_distance') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <div class=" items-center mb-6 mx-8">
                                    <div class="">
                                        <label class=" text-gray-500 font-bold pr-4">Estado*</label>
                                    </div>
                                    <div class="">
                                        <select wire:model="state" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                                            <option value="">Selecciona una opción</option>
                                            <option type="int" value="1">Activo</option>
                                            <option type="int" value="0">Sin Seguimiento</option>
                                        </select>
                                    </div>
                                    @error('state') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <div class=" items-center mb-6 mx-8">
                                    <div class="">
                                        <label class=" text-gray-500 font-bold pr-4">Año de Creación*</label>
                                    </div>
                                    <div class="">
                                        <select wire:model="creation_year" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                                            <option value="">Selecciona una opción</option>
                                            @for($var=1980; $var<=2022;$var=$var+1) <option type="int" value="{{$var}}"> {{$var}}</option>
                                                @endfor
                                        </select>
                                    </div>
                                    @error('creation_year') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <div class=" items-center mb-6 mx-8">
                                    <div class="">
                                        <label class=" text-gray-500 font-bold pr-4">Densidad de plantado*</label>
                                    </div>
                                    <div class="">
                                        <input type="text" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" placeholder="Densidad" wire:model="planting_density">
                                    </div>
                                    @error('planting_density') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <div class=" items-center mb-6 mx-8">
                                    <div class="">
                                        <label class=" text-gray-500 font-bold pr-4">¿Se riega?*</label>
                                    </div>
                                    <div class="">
                                        <select type="text" wire:model="irrigation" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                                            <option value="">Selecciona una opción</option>
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    @error('irrigation') <span class="text-red-500">{{ $message }}</span>@enderror
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
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>