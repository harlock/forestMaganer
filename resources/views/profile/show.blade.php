
    <x-app-layout  >
        <x-slot name="header" >
            {{--<h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{__('Bienvenido ')}} {{Auth::user()->name}}
            </h2>--}}
            <div class="bg-green-100 rounded-lg">
                -->parte foto
                <img src="{{Auth::user()->profile_photo_path}}" alt="" width="100px" height="100px">
            </div>
        </x-slot>

        <div >
            <div class="pb-8 max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-6">
                <div class="bg-green-100 rounded-lg" >
                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form')


                    @endif
                </div>

                <div class="bg-green-100 rounded-lg">
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class=" mt-10 sm:mt-0 ">
                            @livewire('profile.update-password-form')
                        </div>


                    @endif

                </div>

                <div class="bg-green-100 rounded-lg">
                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <div class=" mt-10 sm:mt-0">
                            @livewire('profile.two-factor-authentication-form')
                        </div>


                    @endif
                </div>







                <div class=" mt-10 sm:mt-0 bg-green-100 rounded-lg">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>

                <div class="bg-green-100 ">
                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())


                        <div class=" mt-10 sm:mt-0">
                            @livewire('profile.delete-user-form')
                        </div>
                    @endif

                </div>


            </div>
        </div>
    </x-app-layout>

