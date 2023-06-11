<div class="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="py-4">
            <div class="rounded-full bg-green-100 px-4 pl-6 py-2 border w-full">
                <h3 class="text-center px-2 py-2 ">FENOFACE </h3>
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
                    class="bg-primary text-white font-bold py-2 px-4 rounded my-3"><i class="fa-solid fa-plus"></i> Agregar</button>
            @if($isDialogOpen)
                @include('livewire.phenophases.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                <tr class="bg-gray-300">
                    <th class="px-4 py-2 w-20">Numero</th>
                    <th class="px-4 py-2">Fenofase</th>
                    <th class="px-4 py-2">Descripccion</th>
                    <th class="px-4 py-2">Imagen</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($phenophases as $phenophase)
                    <tr>
                        <td class="border px-4 py-2">{{ $phenophase->id }}</td>
                        <td class="border px-4 py-2">{{ $phenophase->phenophase }}</td>
                        <td class="border px-4 py-2">{{ $phenophase->description }}</td>
                        <td class="border px-4 py-4">
                            <img class="w-20 h-20 bg-gray-300 rounded-full flex-shrink-0" src="{{url("storage/".$phenophase->image)}}" alt="Image no vista">
                        </td>
                        <td class="border px-4 py-2">
                            <div class="flex justify-between">
                                <div>
                                    <button wire:click="edit({{ $phenophase->id }})"
                                            class="bg-green-700 text-white font-bold py-2 px-4"><i class="fa-solid fa-pen-to-square"></i></button>
                                </div>
                                <div>
                                    <button wire:click="ConfirmaDelete({{ $phenophase->id }})"
                                            class="bg-red-700 text-white font-bold py-2 px-4"><i class="fa-solid fa-trash-can"></i></button>
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

