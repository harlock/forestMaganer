<div class="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="py-4">
            <div class="rounded-full bg-green-100 px-4 pl-6 py-2 border w-full">
                <h3 class="text-center px-2 py-2 ">SUPLEMENTOS</h3>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <!-- ALgo de seccion-->
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="flex justify-end">
                <button wire:click="create()" class="bg-primary text-white font-bold py-2 px-4 rounded my-3"><i class="fa-solid fa-plus"></i> Agregar</button>
            </div>
            @if($isDialogOpen)
                @include('livewire.supplies_orchards.create')
            @endif
            {{--****FERTILIZANTES, INZECTICIDASA, AGUA, ABONO************************************************************************************************--}}
            <div class="container grid grid-cols-3">
                @foreach($supply as $supplies)
                    <div class="border rounded-lg ring-4 ring-green-500 ring-opacity-50 shadow-lg shadow-cyan-500/50 mx-2 my-4">
                        <div class="py-10 px-7 flex justify-center">
                            <img class="rounded-lg" src="{{url('images/avatar.jpg')}}" alt="" width="150px" height="150px">
                        </div>
                        <div class="text-center px-2 grid ">
                            <div class="flex justify-between"><h4 class="text-blue-600">Nombre: </h4> <h4 class="w-full"> {{ $supplies->name }}</h4></div>
                            <div class="flex justify-between"><h4 class="text-blue-600">No.Registro:</h4> <h4 class="w-full"> {{ $supplies->registry_number }}</h4></div>
                            {{--<div class="flex justify-between"><h4 class="text-blue-600">Hoja_Datos:</h4> <h4 class="w-full"> {{ $supplies->data_sheet }}</h4></div>--}}
                            <div class="flex justify-between"><h4 class="text-blue-600">Termino:</h4> <h4 class="w-full"> {{ $supplies->security_term }}</h4></div>
                            <div class="flex justify-between"><h4 class="text-blue-600">Categoria:</h4> <h4 class="w-full"> {{ $supplies->product_categori->description}}</h4></div>
                            <div class="flex justify-between my-3 px-2">
                                <div></div>
                                <div>
                                    <button wire:click="edit({{ $supplies->id }})" class="bg-green-700 text-white font-bold py-2 px-4 rounded-full"><i class="fa-solid fa-pen-to-square"></i></button>
                                </div>
                                <div></div>
                                <div>
                                    <button wire:click="ConfirmaDelete({{ $supplies->id }})"
                                            class="bg-red-700 text-white font-bold py-2 px-4 rounded-full"><i class="fa-solid fa-trash-can"></i></button>
                                    {{--<button wire:click="$emit('openModal', 'confirm-delete')">Open Modal</button>--}}
                                    @if($isconfirm)
                                        @include('livewire.confirm-delete')
                                    @endif
                                </div>
                                <div></div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
