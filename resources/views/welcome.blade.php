    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HANUC</title>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="keywords" content="">

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">
        <link rel="stylesheet" href="{{asset('/css/tailwind.css')}}" />
        <link rel="stylesheet" href="{{asset('/css/diseno.css')}}" />
        <link rel="stylesheet" href="{{asset('/css/all.min.css')}}">



        <!-- Styles -->

    </head>

    <body class="antialiased leading-normal tracking-normal text-gray-900" style="font-family: 'Source Sans Pro', sans-serif;">
        <div class="">
            <div>
                <div class="flex bg-green-600 px-4 py-4 grid justify-items-center">

                    <div class="   font-semibold ">
                        <div class="text-white text-xl">
                            HANUC - Una versión mejorada
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="mx-auto flex justify-end">
                            <div class="">
                                @if (Route::has('login'))
                                <div class=" right-0 px-6">
                                    @auth
                                    <a href="{{route('orchard')}}" class="text-lg text-white dark:text-green-600 underline font-bold">HOME</a>

                                    <!--<a href="{{ route('password.update') }}" class="text-sm text-green-600 dark:text-green-600 underline font-bold">Restaurar Contraseña</a>-->

                                    @else
                                    <a href="{{ route('login') }}" class="text-lg text-white dark:text-green-600 underline font-bold">Iniciar Sesion</a>

                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-lg text-white dark:text-green-600 underline font-bold">Registrarse</a>
                                    @endif
                                    {{--<a href="{{ route('password.email') }}" class="text-lg text-white dark:text-green-600 underline font-bold">Olvide Contraseña</a>--}}
                                    @endauth
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container  py-10 px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                    <a class="flex items-center text-green-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl " href="#">
                        <img src="{{asset('images/logo.png')}}" alt="" width="100" height="100" class="rounded-lg">
                        <div class="px-4">
                            HANUC

                        </div>
                    </a>
                </div>



                <!--Main-->
                <div class="container   px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center">

                    <!--Left Col-->
                    <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
                        <h1 class="my-4 text-3xl md:text-5xl text-purple-800 font-bold leading-tight text-center md:text-left slide-in-bottom-h1">Geo-referenciación y registro fenológico de cultivos de aguacate Hass</h1>
                        <p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left slide-in-bottom-subtitle">Registrate y conoce nuestro sistema.</p>



                    </div>

                    <!--Right Col-->
                    <div class="w-full xl:w-3/5 py-6 overflow-y-hidden">
                        <img class="w-5/6 mx-auto lg:mr-0 slide-in-bottom" src="{{asset('images/devices.svg')}}">
                    </div>

                    <!--SOBRE NOSOTROS-->
                    <div class="bg-gray-200 rounded-lg">
                        <figure class="md:flex bg-slate-100 py-4 px-6 p-8 md:p-0 ">
                            <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                                <blockquote>
                                    <p class="text-lg font-medium">
                                        “HANUC es una plataforma que le da seguimineto de la producción de aguacate y monitororeo de los huertos
                                        , asi mismo con la implementación del software se mejorara el seguimiento y monitoreo fenológicos de dichos cultivos de aguacate Hass
                                        incrementando un 15% la producción y reducir sus perdidas de aguacate.
                                    </p>
                                </blockquote>
                                <figcaption class="font-medium">
                                    <div class="text-sky-500 dark:text-sky-400">
                                        Desarrolladores
                                    </div>
                                    <div class="text-slate-700 dark:text-slate-500">
                                        M.ISC. Cesar Primero Huerta,
                                        Juan Diego Estrada Marcelino y Miguel Axel Cejudo Hernandez
                                    </div>
                                </figcaption>
                            </div>
                        </figure>
                    </div>
                    <!--Plataforma web-->
                    <div class="w-full flex items-center justify-between my-4">
                        <div>
                            <a class="flex items-center text-green-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
                                <i class="fa-brands fa-weebly"></i>
                            </a>
                            <p class="px-10 text-green-600 font-semibold">HANUC</p>
                        </div>
                    </div>
                    <div class="footer-links w-full">
                        <div class="footer-container">
                            <!--
                            <ul>
                                <li>
                                    <a href="#" id="Ind">
                                        <h3 class="font-semibold">APP</h3>
                                    </a>
                                </li>
                                <LI>
                                </LI>
                                <li>
                                    <a href="#">Para Dueños</a>
                                </li>
                                <li>
                                    <a href="#">Socios</a>
                                </li>
                                <li>
                                    <a href="#">Guia de Usuario</a>
                                </li>
                                <li>
                                    <a href="#">Ayuda</a>
                                </li>
                            </ul>

                            <ul>
                                <li>
                                    <a href="#" id="Ind">
                                        <h3 class="font-semibold">DISPOSITIVOS</h3>
                                    </a>
                                </li>
                                <LI>
                                    <a href="#">____________</a>
                                </LI>
                                <li>
                                    <a href="#">Empresa</a>
                                </li>
                                <li>
                                    <a href="#">Mobil</a>
                                </li>
                                <li>
                                    <a href="#">Computadora</a>
                                </li>
                                <li>
                                    <a href="#">Tablet</a>
                                </li>
                            </ul>

                            <ul>
                                <li>
                                    <a href="#" id="Ind">
                                        <h3 class="font-semibold">IDIOMA</h3>
                                    </a>
                                </li>
                                <LI>
                                    <a href="#">____________</a>
                                </LI>
                                <li>
                                    <a href="#">Español</a>
                                </li>
                                <li>
                                    <a href="#">Ingles</a>
                                </li>
                                <li>
                                    <a href="#"></a>
                                </li>
                                <li>
                                    <a href="#"></a>
                                </li>
                            </ul>
        -->
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="w-full pt-16 pb-6 text-sm text-center md:text-left fade-in">
                        <a class="text-gray-900 no-underline hover:no-underline font-semibold" href="#"> &copy; HANUC 2023</a>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>