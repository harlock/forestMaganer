<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-black opacity-50 transition-opacity " wire:click="closeModalPopover()" aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>


        <div class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
            <div>
                <div class="mx-auto flex items-center justify-center h-12 w-full rounded-full bg-gray-50">
                    <div class="justify-center  w-full rounded-full bg-gray-100">
                        <h3 class="text-center px-2 py-2 bg-green-100 rounded-full">NUEVA ACTIVIDAD</h3>
                    </div>
                </div>
                <div class="mt-3 text-center sm:mt-5">
                    <div class="mt-2">
                        <form>
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="pb-4 ">
                                    <select wire:model="workday_id" class="form-control w-full rounded-full">
                                        <option value="">--Dia de Trabajo--</option>
                                        @foreach($workdays as $wday)
                                            <option type="int" value="{{$wday->id}}">{{$wday->date_work}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="pb-4">
                                    <select wire:model="type_job_id" class="form-control w-full rounded-full">
                                        <option value="">--Tipo Trabajo--</option>
                                        @foreach($type_jobs as $tjob)
                                            <option type="int" value="{{$tjob->id}}">{{$tjob->type_job}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="">
                                    <div class="mb-4">
                                        <input type="text" class="sshadow appearance-none border w-full rounded-full" placeholder="costo" wire:model="cost">
                                        @error('cost') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>


                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button wire:click.prevent="store()" type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-primary text-base leading-6 font-bold text-white shadow-sm hover:bg-primary focus:outline-none focus:border-blue-300 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Guardar
                                    </button>
                                </span>
                                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                    <button wire:click="closeModalPopover()" type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:text-gray-700 focus:outline-none  focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
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
