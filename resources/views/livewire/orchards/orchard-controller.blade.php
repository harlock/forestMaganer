<div class="py-6">
    <div class=" mx-auto sm:px-6 lg:px-8 ">
        <div class="padd bg-white overflow-hidden shadow-xl sm:rounded-lg px- py-4">
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
            <!--<button wire:click="create()"
                    class="bg-primary text-white font-bold py-2 px-4 rounded my-3"><i class="fa-solid fa-plus"></i> Agregar</button>-->
            <div class="flex items-center justify-between  dark:border-primary-darker px- py-4 sm:rounded-lg pad" style="background-image:url({{asset('images/fondoaguacate.jpg')}});">
                <h1 class="text-2xl font-semibold text-gray-200 mx-auto">MIS HUERTOS</h1>
                <button wire:click="create()" data-tooltip-target="tooltip-add-orchard" class="hover:bg-green-800 bg-primary text-white font-bold py-2 px-4 rounded mr-4 my-3 "><i class="fa-solid fa-plus"></i></button>
                <div id="tooltip-add-orchard" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                    Registrar Huerto
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>

            @if($isDialogOpen)
            @include('livewire.orchards.create')
            @endif
            <div class="padd grid gap-4 grid-cols-3 ">
                @foreach($orchards as $orchard)
                <div class="rounded-lg ring-4 ring-green-500 ring-opacity-50 shadow-lg shadow-cyan-500/50">

                    <ul role="list" class="lg:grid grid grid-cols-1 gap-6 ">
                        <li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200 ">
                            <div class=" bg-white rounded-xl overflow-hidden ">
                                <div class="xl:flex">
                                    <a href="{{route('calendario',$orchard->id)}}" class=" ">
                                        <div class="xl:shrink-0 m-2 transition ease-in-out delay-150 bg-white hover:-translate-y-1 hover:scale-110 duration-300">
                                            <img class="h-48 rounded-l-lg object-cover lg:h-full lg:w-48" src="{{url("storage/".$orchard->path_image)}}" alt="Image no vista">
                                        </div>
                                    </a>
                                    <div class=" ">
                                        <div class=" items-center divide-x">
                                            <div class="ml-4  ">{{ $orchard->name_orchard }}</div>
                                            <!--   <span class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium bg-green-100 rounded-full">{{Auth::user()->name}}</span>   -->
                                        </div>
                                        <div class="mt-4">
                                            <div class="ml-4 text-sm">
                                                Ubicacion:
                                            </div>
                                            <div class=" ml-4 text-gray-500 text-sm ">{{ $orchard->location_orchard }}</div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="overflow-hidden lg:max-w-2xl flex justify-between">
                                <div class="lg:-mt-px  lg:divide-x lg:flex divide-gray-200 ">
                                    <div class="lg:shrink-0 p-2 flex items-center">
                                        <a href="{{route('calendario',$orchard->id)}}" class="  items-center justify-center  text-2x1 text-green-600 hover:text-green-800 font-medium border border-transparent rounded-bl-lg ">
                                            <i class="fa fa-list-alt " aria-hidden="true"></i>
                                            Administrar
                                        </a>
                                    </div>
                                    <div class="flex py-2">
                                        <div class=" font-medium  w-1/2 items-center align-middle">
                                            <button wire:click="edit({{ $orchard->id }})" class="bg-green-700 hover:bg-green-800 text-white mx-2 py-2 px-4 rounded-full ml-3"><i class="fa-solid fa-pen-to-square"></i></button>
                                        </div>
                                        <div class="w-1/2 items-center align-middle">
                                            <button wire:click="ConfirmaDelete({{ $orchard->id }})" class="bg-red-700 text-white font-bold mx-2 py-2 px-4 rounded-full hover:bg-red-600"><i class="fa-solid fa-trash-can"></i></button>
                                            {{--<button wire:click="$emit('openModal', 'confirm-delete')">Open Modal</button>--}}
                                            @if($isconfirm)
                                            @include('livewire.confirm-delete')
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>