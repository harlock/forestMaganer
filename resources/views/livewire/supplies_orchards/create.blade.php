<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-16 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-black opacity-50 transition-opacity " wire:click="closeModalPopover()" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
            <form>
                <div class="justify-center   rounded-full bg-gray-100">
                    <h3 class="text-center px-2 py-2 bg-green-100 rounded-full font-semibold">NUEVO TIPO DE SUPLEMENTO</h3>
                </div>

                <div class="bg-white space-y-6  px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                    <div class="px-2">
                        <h3 class="items-center pt-2 pr-4 w-full text-center">Nombre</h3>
                        <div class="mb-4 w-full">
                            <input type="text" class=" rounded-full  px-4 pl-6 py-2 border w-full" placeholder="Nombre" wire:model="name">
                            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="px-2">
                        <h3 class="items-center pt-2 pr-4 w-full text-center">Numero de Registro</h3>
                        <div class="mb-4 w-full">
                            <input type="text" class=" rounded-full  px-4 pl-6 py-2 border w-full" placeholder="Numero De Registro" wire:model="registry_number">
                            @error('registry_number') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="px-2">
                        <h3 class="items-center pt-2 pr-4 w-full text-center">Hoja de Datos</h3>
                        <div class="mb-4 w-full">
                            <input type="file" wire:model="data_sheet" class="form-control shadow rounded-lg appearance-none border w-full" placeholder="Inserte el archivo word o pdf">
                            @error('data_sheet') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="px-2">
                        <h3 class="items-center pt-2 pr-4 w-full text-center">Termino de Seguridad</h3>
                        <div class="mb-4 w-full">
                            <input type="text" class=" rounded-full  px-4 pl-6 py-2 border w-full" placeholder="Termino De Seguridad" wire:model="security_term">
                            @error('security_term') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="px-2">
                        <h3 class="items-center pt-2 pr-4 w-full text-center">Categoria de Producto</h3>
                        <select wire:model="product_category_id" class=" rounded-full  px-4 pl-6 py-2 border w-full">
                            <option value="">Seleccione la categoria</option>
                            @foreach($product_categories as $product_category)
                                <option type="int" value="{{$product_category->id}}">{{$product_category->description}}</option>
                            @endforeach
                        </select>
                        @error('product_category_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="px-2">
                        <h3 class="items-center pt-2 pr-4 w-full text-center">Marca del Suplemento</h3>
                        <select wire:model="mark_supplie_id" class=" rounded-full  px-4 pl-6 py-2 border w-full">
                            <option value="">Seleccione una marca</option>
                            @foreach($mark_supplies as $mark)
                                <option type="int" value="{{$mark->id}}">{{$mark->description}}</option>
                            @endforeach
                        </select>
                        @error('mark_supplie_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 grid grid-cols-3">
                    <div class="">
                        <button wire:click.prevent="store()" type="button"  class="bg-green-800 py-2 px-3 rounded-lg font-bold text-white hover:bg-green-700">
                            Guardar
                        </button>
                    </div>
                    <div></div>
                    <div class="">
                        <button wire:click="closeModalPopover()" type="button" class="bg-red-600 py-2 px-3 rounded-lg font-bold text-white hover:bg-indigo-600">
                            Cerrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
