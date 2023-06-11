<!--FORMULARIO-->
<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-black opacity-50 transition-opacity " wire:click="close_modal_supplies()" aria-hidden="true"></div>
        <span class="hidden  "></span>
        <div class=" content-center relative inline-block bg-white rounded-lg px-4 ">

            <form class="">
                <div class="flex ">
                    <div class="bg-white sm:p-6 ">


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
                                    <button wire:click="deleteApp({{ $dose->id }}, {{ $dose->application_id }})" class="bg-red-700 text-white font-bold py-2 px-4"><i class="fa-solid fa-trash-can"></i></button>
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

            </form>

        </div>
    </div>
</div>