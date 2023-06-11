<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-black opacity-50 transition-opacity " wire:click="closeModaldelete()" aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>


        <div class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">

            <div>
                <div class="justify-center   rounded-full bg-gray-100">
                    <h3 class="text-center font-bold text-black px-2 py-2 bg-green-100 rounded-full">SEGURO QUE QUIERES ELIMINAR EL REGISTRO</h3>
                </div>
                <div class="mt-3 text-center sm:mt-5">
                    <div class="mt-2">
                        <form>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row flex justify-between">
                                <div class="mt-5 sm:mt-6">
                                    <button wire:click="closeModaldelete()" type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2  bg-red-600 text-base font-medium text-white hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                                        Cancelar
                                    </button>
                                </div>
                                <div class="mt-5 sm:mt-6">
                                    <button wire:click.prevent="delete()" type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-700 text-base leading-6 font-bold text-white shadow-sm hover:bg-green-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Borrar
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


