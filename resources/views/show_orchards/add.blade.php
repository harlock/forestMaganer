<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspecciona Huerto</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />

</head>

<body>
    <div class="pb-8 max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <form>
                <div class="md:col-span-1">
                    <select wire:model="type_avocado_id" class="form-control">
                        <option value="">--Tipo de Aguacate--</option>
                        @foreach($type_avocados as $type_avocado)

                        <option type="int" value="{{$type_avocado->id}}">{{$type_avocado->type_avocado}}
                        </option>
                        @endforeach
                    </select>

                    <select wire:model="type_topography_id" class="form-control">
                        <option value="">--Tipo de Topografia--</option>
                        @foreach($type_topographies as $type_topopraphy)

                        <option type="int" value="{{$type_topopraphy->id}}">{{$type_topopraphy->type_topography}}
                        </option>
                        @endforeach
                    </select>

                    <select wire:model="type_soil_id" class="form-control">
                        <option value="">--Tipo de Suelo--</option>
                        @foreach($type_soils as $type_soil)

                        <option type="int" value="{{$type_soil->id}}">{{$type_soil->type_soil}}
                        </option>
                        @endforeach
                    </select>

                    <select wire:model="climate_type_id" class="form-control">
                        <option value="">--Tipo de Clima--</option>
                        @foreach($climate_types as $climate_type)

                        <option type="int" value="{{$climate_type->id}}">{{$climate_type->climate_type}}
                        </option>
                        @endforeach
                    </select>

                    <select wire:model="user_id" class="form-control">
                        <option value="">--Usuario--</option>
                        @foreach($users as $users)

                        <option type="int" value="{{$users->id}}">{{$users->name}}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="">
                        <div class="mb-4">
                            <input type="text" class="sshadow appearance-none border w-full" placeholder="Nombre de Huerto" wire:model="name_orchard">
                            @error('name_orchard') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <input type="text" class="sshadow appearance-none border w-full" placeholder="Path image" wire:model="path_image">
                            @error('path_image') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <input type="text" class="sshadow appearance-none border w-full" placeholder="Localizacion de Huerto" wire:model="location_orchard">
                            @error('location_orchard') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <input type="text" class="sshadow appearance-none border w-full" placeholder="Point" wire:model="point">
                            @error('point') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <input type="text" class="sshadow appearance-none border w-full" placeholder="Area" wire:model="area">
                            @error('area') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="">
                        <div class="mb-4">
                            <input type="text" class="sshadow appearance-none border w-full" placeholder="Altitud" wire:model="altitude">
                            @error('altitude') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <input type="text" class="sshadow appearance-none border w-full" placeholder="Superficie" wire:model="surface">
                            @error('surface') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <input type="text" class="sshadow appearance-none border w-full" placeholder="Estado" wire:model="state">
                            @error('state') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <input type="text" class="sshadow appearance-none border w-full" placeholder="Año de Creacion" wire:model="creation_year">
                            @error('creation_year') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <input type="text" class="sshadow appearance-none border w-full" placeholder="Densidad de Plantado" wire:model="planting_density">
                            @error('planting_density') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <input type="text" class="sshadow appearance-none border w-full" placeholder="Irrigacion" wire:model="irrigation">
                            @error('irrigation') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Guardar
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModalPopover()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cerrar
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    <div class="pb-8 max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                    <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="#" method="POST">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="company-website" class="block text-sm font-medium text-gray-700"> Website </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"> http:// </span>
                                        <input type="text" name="company-website" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="www.example.com">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="about" class="block text-sm font-medium text-gray-700"> About </label>
                                <div class="mt-1">
                                    <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="you@example.com"></textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700"> Photo </label>
                                <div class="mt-1 flex items-center">
                                    <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </span>
                                    <button type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Change</button>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700"> Cover photo </label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="hidden sm:block " aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <div class="pb-8 max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                    <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="#" method="POST">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                    <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                                    <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                    <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option>United States</option>
                                        <option>Canada</option>
                                        <option>Mexico</option>
                                    </select>
                                </div>

                                <div class="col-span-6">
                                    <label for="street-address" class="block text-sm font-medium text-gray-700">Street address</label>
                                    <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                    <input type="text" name="city" id="city" autocomplete="address-level2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <label for="region" class="block text-sm font-medium text-gray-700">State / Province</label>
                                    <input type="text" name="region" id="region" autocomplete="address-level1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                                    <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <div class="pb-8 max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Notifications</h3>
                    <p class="mt-1 text-sm text-gray-600">Decide which communications you'd like to receive and how.</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="#" method="POST">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <fieldset>
                                <legend class="text-base font-medium text-gray-900">By Email</legend>
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="comments" class="font-medium text-gray-700">Comments</label>
                                            <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="candidates" name="candidates" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="candidates" class="font-medium text-gray-700">Candidates</label>
                                            <p class="text-gray-500">Get notified when a candidate applies for a job.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="offers" name="offers" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="offers" class="font-medium text-gray-700">Offers</label>
                                            <p class="text-gray-500">Get notified when a candidate accepts or rejects an offer.</p>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div>
                                    <legend class="text-base font-medium text-gray-900">Push Notifications</legend>
                                    <p class="text-sm text-gray-500">These are delivered via SMS to your mobile phone.</p>
                                </div>
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-center">
                                        <input id="push-everything" name="push-notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="push-everything" class="ml-3 block text-sm font-medium text-gray-700"> Everything </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="push-email" name="push-notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="push-email" class="ml-3 block text-sm font-medium text-gray-700"> Same as email </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="push-nothing" name="push-notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="push-nothing" class="ml-3 block text-sm font-medium text-gray-700"> No push notifications </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>