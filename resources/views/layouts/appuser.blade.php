<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>AvoApp</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/tailwind.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/diseno.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/all.min.css')}}">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
</head>

<body>

<div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors('teal-dark');" :class="{ 'dark': false}">
    <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
        <!-- Loading screen -->
        <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker">
            Cargando.....
        </div>

        <!-- Sidebar -->
        <aside class="flex-shrink-0 hidden w-64  border-r dark:border-primary-darker dark:bg-darker md:block">
            <div class="flex flex-col h-full">
                <!-- Sidebar links -->
                <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
                    <!-- Dashboards links -->
                    <div x-data="{ isActive: true, open: false}">
                        <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                        <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{'bg-primary-100 dark:bg-primary': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                                <span aria-hidden="true">
                                    <i class="fa-solid fa-registered"></i>

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />

                                    </svg>
                                </span>
                            <span class="ml-2 text-sm"> Geo-Referencia </span>
                            <span class="ml-auto" aria-hidden="true">
                                    <!-- active class 'rotate-180' -->
                                    <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                        </a>
                        <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
                            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->


                            <!-- BOTONES MENU -->
                            <a href="{{url('supplies_orchards')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                <i class="fa-solid fa-angles-right"></i>
                                Suplementos
                            </a>

                            <a href="{{asset('active_elements')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                <i class="fa-solid fa-angles-right"></i>
                                Elemento activo
                            </a>

                            <a href="{{asset('orchard')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                <i class="fa-solid fa-angles-right"></i>
                                Huertas
                            </a>

                        </div>
                    </div>




                    <div x-data="{ isActive: true, open: false}">
                        <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                        <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{'bg-primary-100 dark:bg-primary': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                                <span aria-hidden="true">
                                    <i class="fa-solid fa-registered"></i>

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />

                                    </svg>
                                </span>
                            <span class="ml-2 text-sm"> Fenologia </span>
                            <span class="ml-auto" aria-hidden="true">
                                    <!-- active class 'rotate-180' -->
                                    <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                        </a>
                        <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">

                            <a href="{{asset('phenophase')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700">
                                <i class="fa-solid fa-angles-right"></i>
                                Fenofase
                            </a>

                            <a href="{{asset('photographs')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                <i class="fa-solid fa-angles-right"></i>
                                Fotografía
                            </a>

                            <a href="{{asset('nutrient_analysis')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                <i class="fa-solid fa-angles-right"></i>
                                Analicis Nutricional
                            </a>



                            <a href="{{asset('sample_nutrients')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                <i class="fa-solid fa-angles-right"></i>
                                Muestra de Nutrientes
                            </a>


                            <a href="{{asset('workday')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                <i class="fa-solid fa-angles-right"></i>
                                Dias de Trabajo
                            </a>

                            <a href="{{asset('activities')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                <i class="fa-solid fa-angles-right"></i>
                                Actividades
                            </a>

                            <a href="{{asset('application')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                <i class="fa-solid fa-angles-right"></i>
                                Aplicaciones
                            </a>

                            <a href="{{asset('doses')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                <i class="fa-solid fa-angles-right"></i>
                                Dosis
                            </a>

                        </div>
                    </div>

                    <h1>------------------------</h1>
                    <a href="{{asset('anual_production')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700">
                        <i class="fa-solid fa-angles-right"></i>
                        PRODUCCIÓN ANUAL
                    </a>


                    <!-- Components links -->


                    <!-- Pages links -->


                    <!-- Authentication links -->


                    <!-- Layouts links -->

                </nav>

                <!-- Sidebar footer -->
                <!--Para button -openSettingsPanel-->
                <div class="flex-shrink-0 px-2 py-4 space-y-2">
                    <button @click="#" type="button" class="flex items-center justify-center w-full px-4 py-2 text-sm text-white rounded-md bg-primary  focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                            <span aria-hidden="true">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                </svg>
                            </span>
                        <span>Configuracion</span>
                    </button>
                </div>
            </div>
        </aside>

        <div class="flex-1 flex flex-col h-screen w-full overflow-x-hidden overflow-y-auto">
            <!-- Navbar -->
            <header class="relative bg-white dark:bg-darker">
                <div class="flex items-center justify-between p-2 border-b dark:border-primary-darker">
                    <!-- Mobile menu button -->
                    <button @click="isMobileMainMenuOpen = !isMobileMainMenuOpen" class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
                        <span class="sr-only">Open main manu</span>
                        <span aria-hidden="true">
                                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </span>
                    </button>

                    <!-- Brand -->
                    <a href="{{url('dashboard')}}" class="inline-block text-2xl font-bold tracking-wider uppercase text-primary-dark dark:text-light">
                        Avoapp
                    </a>

                    <!-- Mobile sub menu button -->
                    <button @click="isMobileSubMenuOpen = !isMobileSubMenuOpen" class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
                        <span class="sr-only">Open sub manu</span>
                        <span aria-hidden="true">
                                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>
                            </span>
                    </button>

                    <!-- Desktop Right buttons -->
                    <nav aria-label="Secondary" class="hidden space-x-2 md:flex md:items-center">
                        <!-- Toggle dark theme button BOTON DE LA ESTRELLITA -->


                        <!-- Notification button -->
                        <button @click="openNotificationsPanel" class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                            <span class="sr-only">Open Notification panel</span>
                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>

                        <!-- Search button -->


                        <!-- Settings button openSettingsPanel()-->


                        <!-- User avatar button -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })" type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'" class="transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
                                <span class="sr-only">User menu</span>
                                <img class="w-10 h-10 rounded-full" src="{{asset('/images/avatar.jpg')}}" alt="Ahmed Kamel" />
                            </button>

                            <!-- User dropdown menu -->
                            <div x-show="open" x-ref="userMenu" x-transition:enter="transition-all transform ease-out" x-transition:enter-start="translate-y-1/2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-all transform ease-in" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false" @keydown.escape="open = false" class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none" tabindex="-1" role="menu" aria-orientation="vertical" aria-label="User menu">
                                <a href="{{ ('profile') }}" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                    Perfil
                                </a>
                                <a href="#" role="menuitem" class=" block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                    Configuracion
                                </a>
                                <a>
                                    <form class=" ring-4 ring-green-500 ring-opacity-50" method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                            {{ __('Cerrar Sesion') }}
                                        </x-jet-responsive-nav-link>
                                    </form>
                                </a>
                            </div>
                        </div>
                    </nav>

                    <!-- Mobile sub menu -->
                    <nav x-transition:enter="transition duration-200 ease-in-out transform sm:duration-500" x-transition:enter-start="-translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="-translate-y-full opacity-0" x-show="isMobileSubMenuOpen" @click.away="isMobileSubMenuOpen = false" class="absolute flex items-center p-4 bg-white rounded-md shadow-lg dark:bg-darker top-16 inset-x-4 md:hidden" aria-label="Secondary">
                        <div class="space-x-2">
                            <!-- Toggle dark theme button -->


                            <!-- Notification button -->
                            <button @click="openNotificationsPanel(); $nextTick(() => { isMobileSubMenuOpen = false })" class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                                <span class="sr-only">Open notifications panel</span>
                                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>

                            <!-- Search button openSearchPanel(); $nextTick(() => { $refs.searchInput.focus(); setTimeout(() => {isMobileSubMenuOpen= false}, 100) })-->


                            <!-- Settings button -->

                        </div>

                        <!-- User avatar button -->
                        <div class="relative ml-auto" x-data="{ open: false }">
                            <button @click="open = !open" type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'" class="block transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
                                <span class="sr-only">User menu</span>
                                <img class="w-10 h-10 rounded-full" src="{{asset('/images/avatar.jpg')}}" alt="Ahmed Kamel" />
                            </button>

                            <!-- User dropdown menu -->
                            <div x-show="open" x-transition:enter="transition-all transform ease-out" x-transition:enter-start="translate-y-1/2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-all transform ease-in" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false" class="absolute right-0 w-48 py-1 origin-top-right bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark" role="menu" aria-orientation="vertical" aria-label="User menu">
                                <a href="#" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                    Perfil
                                </a>
                                <a href="#" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                    Configuracion
                                </a>
                                <a>
                                    <form method="POST" action="{{ route('logout') }}" class="ring-4 ring-green-500 ring-opacity-50">
                                        @csrf

                                        <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                            {{ __('Cerrar Sesion') }}
                                        </x-jet-responsive-nav-link>
                                    </form>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
                <!-- Mobile main manu -->
                <div class="border-b md:hidden dark:border-primary-darker" x-show="isMobileMainMenuOpen" @click.away="isMobileMainMenuOpen = false">
                    <nav aria-label="Main" class="px-2 py-4 space-y-2">
                        <!-- Dashboards links -->
                        <div x-data="{ isActive: true, open: false}">
                            <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                            <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{'bg-primary-100 dark:bg-primary': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                                    <span aria-hidden="true">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                    </span>
                                <span class="ml-2 text-sm"> Fenologia <br>Geo-Referencia </span>
                                <span class="ml-auto" aria-hidden="true">
                                        <!-- active class 'rotate-180' -->
                                        <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="6" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </span>
                            </a>
                            <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
                                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                <!-- BOTONES MENU -->
                                <a href="{{asset('application_modes')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Modos de Aplicación
                                </a>

                                <a href="{{asset('units')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Unidades
                                </a>

                                <a href="{{asset('chemical_elements')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Elementos Quimicos
                                </a>

                                <a href="{{asset('type_photograps')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Tipos de Fotografía
                                </a>

                                <a href="{{asset('type_topograps')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Tipos de Topografia
                                </a>

                                <a href="{{asset('type_soil')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Tipo de Suelo
                                </a>

                                <a href="{{asset('climate_type')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Tipo de Climas
                                </a>

                                <a href="{{asset('phenophase')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Fenofase
                                </a>

                                <a href="{{asset('type_avocado')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Tipos de Aguacate
                                </a>

                                <a href="{{asset('type_jobs')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Tipos de Trabajo
                                </a>

                                <a href="{{asset('product_categories')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Categoria de Productos
                                </a>


                                <div class="rounded-full  px-4 py-2  text-sm text-dark ring-4 ring-green-500">
                                    <h6>Tablas Debiles</h6>
                                </div>
                                <!--  TABLAS DEBILES           ---------------------   -->


                                <a href="{{asset('application')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Aplicación
                                </a>

                                <a href="{{asset('doses')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Dosis
                                </a>

                                <a href="{{asset('supplies_orchards')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Suplementos
                                </a>

                                <a href="{{asset('nutrient_analysis')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Analicis Nutricional
                                </a>

                                <a href="{{asset('sample_nutrients')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Muestra Nutricional
                                </a>

                                <a href="{{asset('active_elements')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Elemento activo
                                </a>

                                <a href="{{asset('registro_phenophases')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Registro de phenophases
                                </a>

                                <a href="{{asset('orchard')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Huertas
                                </a>

                                <a href="{{asset('annual_production')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Producción Anual
                                </a>

                                <a href="{{asset('workday')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Dias de Trabajo
                                </a>

                                <a href="{{asset('activities')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                    <i class="fa-solid fa-angles-right"></i>
                                    Actividad
                                </a>

                            </div>
                        </div>

                        <!-- Components links -->


                        <!-- Pages links -->


                        <!-- Authentication links -->


                        <!-- Layouts links -->

                    </nav>
                </div>
            </header>

            <!-- Main content -->
            <main class=" flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
                <!-- Content header -->
                <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
                    @if(isset($header))
                        <h1 class="text-2xl font-semibold">{{$header}}</h1>
                    @endif
                    <a>

                    </a>
                </div>

                <!-- Content -->
                <div class="mt-2">
                    @if(isset($slot))
                        {{$slot}}
                    @endif
                </div>
            </main>

            <!-- Main footer -->
            <footer class="flex  items-start justify-between p-4 bg-white border-t dark:bg-darker dark:border-primary-darker termination">
                <div>AVOAPP &copy; 2023</div>
                <div>
                    Made by
                    <a href="https://github.com/Kamona-WD" target="_blank" class="text-blue-500 hover:underline">Bit Br</a>
                </div>
            </footer>

        </div>

        <!-- Panels -->

        <!-- Settings Panel -->
        <!-- Backdrop -->

    </div>
</div>
@stack('modals')

<!-- All javascript code in this project for now is just for demo DON'T RELY ON IT  -->
@livewireScripts
<script type="text/javascript">
    const setup = () => {
        const setTheme = (value) => {
            window.localStorage.setItem('dark', value)
        }
        const setColors = (color) => {
            const root = document.documentElement
            root.style.setProperty('--color-primary', `var(--color-${color})`)
            root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
            root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
            root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
            root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
            root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
            root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
            this.selectedColor = color
            window.localStorage.setItem('color', color)
            //
        }


        return {
            loading: true,
            isDark: false,

            color: "green",
            //selectedColor: 'cyan',
            setColors,
            toggleSidbarMenu() {
                this.isSidebarOpen = !this.isSidebarOpen
            },
            isSettingsPanelOpen: false,
            openSettingsPanel() {
                this.isSettingsPanelOpen = true
                this.$nextTick(() => {
                    this.$refs.settingsPanel.focus()
                })
            },
            isNotificationsPanelOpen: false,
            openNotificationsPanel() {
                this.isNotificationsPanelOpen = true
                this.$nextTick(() => {
                    this.$refs.notificationsPanel.focus()
                })
            },
            isSearchPanelOpen: false,
            openSearchPanel() {
                this.isSearchPanelOpen = true
                this.$nextTick(() => {
                    this.$refs.searchInput.focus()
                })
            },
            isMobileSubMenuOpen: false,
            openMobileSubMenu() {
                this.isMobileSubMenuOpen = true
                this.$nextTick(() => {
                    this.$refs.mobileSubMenu.focus()
                })
            },
            isMobileMainMenuOpen: false,
            openMobileMainMenu() {
                this.isMobileMainMenuOpen = true
                this.$nextTick(() => {
                    this.$refs.mobileMainMenu.focus()
                })
            },
        }


    }
</script>
@yield('js')
</body>

</html>
