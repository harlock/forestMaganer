<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{asset('images/logo.png')}}" alt=""  class="rounded-lg w-24 h-24">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <x-jet-label for="email" value="{{ __('Correo electrónico') }}" />
            <div>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm font-bold text-blue-600">{{ __('Recordar') }}</span>
                </label>
            </div>


            <div class="flex items-center justify-end mt-4">
                <!--
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Olvido su contraseña?') }}
                    </a>
                @endif
-->
                <a class="underline text-sm text-green-600 hover:text-indigo-500" href="{{ route('register') }}">
                    {{ __('¿No tienes cuenta?') }}
                </a>
                <x-jet-button class="ml-4">
                    {{ __('Entrar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
