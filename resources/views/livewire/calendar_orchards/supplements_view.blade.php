<div class="">
    <div class="=mx-auto sm:px-6 lg:px-8">

        <div class="py-4">
            <div class="rounded-full bg-green-100 px-4 pl-6 py-2 border w-full">
                <h3 class="text-center px-2 py-2 ">SUPLEMENTOS</h3>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            <table class=" w-full">
                <thead class="bg-gray-800 rounded-t-lg">
                    <tr class=" text-center font-semibold text-white">
                        <th class="px-4 py-2 w-20">Nombre</th>
                        <th class="px-4 py-2 w-20">No.Registro</th>
                        <th class="px-4 py-2 w-20">Hoja de datos</th>
                        <th class="px-4 py-2 w-20">Hoja de seguridad</th>
                        <th class="px-4 py-2 w-20">Terminos</th>
                        <th class="px-4 py-2 w-20">Categoria</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($general_supplies as $supply)
                    <tr class="bg-gray-100">
                        <td class="border px-4 py-2 text-center"> {{ $supply->name }}</td>
                        <td class="border px-4 py-2 text-center"> {{ $supply->registry_number }}</td>
                        <td class="border px-4 py-2 text-center"> 
                            <button wire:click="openmodalview_supplies_data('{{$supply->id}}')" class=" rounded-lg bg-indigo-300 border py-1 px-2 hover:bg-indigo-600 font-medium hover:text-white">Visualizar</button>
                        </td>
                        <td class="border px-4 py-2 text-center"> 
                            <button wire:click="openmodalview_supplies_safety('{{$supply->id}}')" class=" rounded-lg bg-indigo-300 border py-1 px-2 hover:bg-indigo-600 font-medium hover:text-white">Visualizar</button>
                        </td>
                        <td class="border px-4 py-2 text-center"> {{ $supply->product_categori->description}} </td>
                        <td class="border px-4 py-2 text-center"> {{ $supply->mark_supplie->description}} </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($modalview_supplies)
            @include('livewire.supplies_orchards.view_supplies_data')
            @endif
            @if($modalview_supplies_safety)
            @include('livewire.supplies_orchards.view_supplies_safety')
            @endif
        </div>
    </div>
</div>