<!--FORMULARIO-->
<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-black opacity-50 transition-opacity " wire:click="close_create_application()" aria-hidden="true"></div>
        <span class="hidden  "></span>
        <div class=" content-center relative inline-block bg-white rounded-lg px-4 ">

            <form class="">
                <div class="flex ">
                    <div class="bg-white sm:p-6 ">
                        <div class="flex ">
                            <div class="pt-2 pr-4 w-1/2 ">
                                <div class="">
                                    <label class=" text-gray-500 font-bold pr-4">Aplicación*</label>
                                </div>
                                <select wire:model="application_mode_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                                    <option value="">Tipo de aplicación</option>
                                    @foreach($applicationMode as $appmode)
                                    <option type="int" value="{{$appmode->id}}">{{$appmode->description}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('application_mode_id') <span class="text-red-500">{{ $message }}</span>@enderror

                            </div>
                            <div class="pt-2 pr-4 w-1/2">
                                <div class="text-gray-500 font-bold pr-4">
                                    Suplemento a aplicar*
                                </div>
                                <select wire:model="supplie_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white ">
                                    <option value="">Suplemento</option>
                                    @foreach($supplie as $supp)
                                    <option type="int" value="{{$supp->id}}">{{$supp->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('supplie_id') <span class="text-red-500">{{ $message }}</span>@enderror

                            </div>
                        </div>
                        <div class="flex">
                            <div class="pt-2 pr-4">
                                <div class="text-gray-500 font-bold pr-4">
                                    Nota*
                                </div>
                                <div class=" ">
                                    <input type="text" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" placeholder="Nota" wire:model="note">
                                </div>
                                @error('note') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="pt-2 pr-4">
                                <div class="text-gray-500 font-bold pr-4">
                                    Dosis a aplicar*
                                </div>
                                <div class="mb-4">
                                    <input type="double" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white " placeholder="Dosis" wire:model="dose">
                                    @error('dose') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class=" flex justify-center">
                            <span class="bg-green-700 hover:bg-text-white font-bold flex   rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click.prevent="store_application()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2  text-base leading-6 font-bold text-white shadow-sm  hover:bg-green-800 focus:outline-none focus:border-green-900 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    <i class="mt-1 fa-solid fa-plus"></i>
                                    Agregar
                                </button>
                            </span>
                        </div>
                        <div class="p-4">
                            <div class="bg-gray-800 rounded-t-lg">
                                <div class="flex justify-between text-center font-semibold text-white">
                                    <div class="px-4">Aplicación</div>
                                    <div class="px-4">Suplemento a aplicar</div>
                                    <div class="px-4">Dosis</div>
                                    <div class="px-4"></div>
                                </div>
                            </div>

                            @if($table_doses)
                            @foreach($data_dose as $dose)
                            <div class="flex justify-between text-center bg-gray-200 border-gray-700">
                                <div class="px-4 ">
                                    {{$dose->application->applicationmodee->description}}
                                </div>
                                <div class="px-4 ">
                                    {{$dose->supplie->name}}
                                </div>
                                <div class="px-4 ">
                                    {{$dose->dose}}
                                    {{$dose->supplie->unit->description}}
                                </div>
                                <div>
                                    <button wire:click="deleteApp({{ $dose->id , $dose->application_id }})" class="bg-red-700 text-white font-bold py-2 px-4"><i class="fa-solid fa-trash-can"></i></button>
                                </div>
                            </div>
                            <div class="flex">
                                <div>
                                    nota:
                                </div>
                                <div class="px-4 ">
                                    {{$dose->application->note}}
                                </div>
                            </div>

                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-100 sm:px-6 flex justify-center">
                    <span class=" bg-red-700 mt-3 flex  rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="close_create_application()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-600 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Finalizar
                        </button>
                    </span>
                </div>
            </form>

        </div>
    </div>
</div>