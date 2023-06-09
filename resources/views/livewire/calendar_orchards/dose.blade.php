<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-black opacity-50 transition-opacity " wire:click="close_create_dose()" aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->


        <div class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
            <div>
                <div class="justify-center rounded-full bg-gray-100">
                    <h3 class="text-center px-2 py-2 bg-green-100 rounded-full ">DOSIS DEL SUPLEMENTO A APLICAR</h3>
                </div>
                <div class="mt-3 text-center sm:mt-5">
                    <div class="mt-2">
                        <!--FORMULARIO-->
                        <form>
                            <div class="shadow sm:rounded-md sm:overflow-hidden ">
                                <div class=" sm:rounded-md sm:overflow-hidden shadow-lg shadow-indigo-500/40">
                                    <div class="bg-gray-300 py-6 px-4 sm:p-6 ">
                                        <div class="pt-2 pr-4">
                                            <select wire:model="supplie_id" class="form-control">
                                                <option value="">Suplemento</option>
                                                @foreach($supplie as $supp)
                                                <option type="int" value="{{$supp->id}}">{{$supp->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="pt-2 pr-4">
                                            <select wire:model="unit_id" class="form-control">
                                                <option value="">Unidad</option>
                                                @foreach($units as $unidad)
                                                <option type="int" value="{{$unidad->id}}">{{$unidad->description}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="pt-2 pr-4">
                                            <div class="mb-4">
                                                <input type="double" class="sshadow appearance-none border w-full" placeholder="Dosis" wire:model="dose">
                                                @error('dose') <span class="text-red-500">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="px-4 py-3 bg-gray-100 sm:px-6 flex justify-center">
                                    <span class=" bg-red-700 mt-3 flex  rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                        <button wire:click="close_create_dose()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-600 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                            Cerrar
                                        </button>
                                    </span>
                                    <span class="bg-green-700 hover:bg- text-white font-bold flex   rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                        <button wire:click.prevent="storeDose()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2  text-base leading-6 font-bold text-white shadow-sm  hover:bg-green-800 focus:outline-none focus:border-green-900 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
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