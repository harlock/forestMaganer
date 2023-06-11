<x-app-layout>
    <x-slot name="header">
        {{--<h2 class="font-semibold text-xl  leading-tight rounded-full bg-green-100 px-4  py-4 border  text-center">
            {{__('Bienvenido ')}} {{Auth::user()->name}}
        </h2>--}}
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome/>

            </div>
        </div>
    </div>
</x-app-layout>
