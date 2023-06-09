<div class="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="py-4">
            <div class="rounded-full bg-green-100 px-4 pl-6 py-2 border w-full">
                <h3 class="text-center px-2 py-2 ">MODOS DE APLICACIÓN </h3>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <!-- ALgo de seccion-->
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                     role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <button wire:click="create()"
                    class="bg-primary text-white font-bold py-2 px-4 rounded my-3"><i class="fa-solid fa-plus"></i> Modos de Aplicación</button>
            @if($isDialogOpen)
                @include('livewire.application_modes.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                <tr class="bg-gray-300">
                    <th class="px-4 py-2 w-20">Numero</th>
                    <th class="px-4 py-2">Descripcion</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($aplications as $aplicacion)
                    <tr>
                        <td class="border px-4 py-2">{{ $aplicacion->id }}</td>
                        <td class="border px-4 py-2">{{ $aplicacion->description }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex justify-between">
                                <div class="">
                                    <button wire:click="edit({{ $aplicacion->id }})"
                                            class="bg-green-700 text-white font-bold py-2 px-4"><i class="fa-solid fa-pen-to-square"></i></button>
                                </div>
                                <div>
                                    <button wire:click="ConfirmaDelete({{ $aplicacion->id }})"
                                            class="bg-red-700 text-white font-bold py-2 px-4"><i class="fa-solid fa-trash-can"></i></button>
                                            {{--<button wire:click="$emit('openModal', 'confirm-delete')">Open Modal</button>--}}
                                    @if($isconfirm)
                                        @include('livewire.confirm-delete')
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

