<div class="fixed z-10 inset-0 overflow-y-auto " aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0 ">

        <div class="fixed inset-0 bg-black opacity-50 transition-opacity " onclick="Previous()" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen "></span>

        <div class="relative inline-block bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all w-2/3 content-start">
            <div class="">


                <div class="py-12">

                    <!-- 
                    @include('livewire.orchards.acciones_huerto')
                
                    <script>
                        show_nav(), produ()
                    </script>
-->
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="py-4">
                            <div class="rounded-full bg-green-100 px-4 pl-6 py-2 border w-full">
                                <h3 class="text-center px-2 py-2 ">Producción Anual</h3>
                            </div>
                        </div>
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 pt-6">
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
                            <!-- Poner el espaciado -->
                            <div class="flex justify-between py-2">
                                <div>
                                    <button class="bg-primary text-white font-bold py-2 px-4 rounded my-3 " onclick="Previous()">Regresar</button>
                                    <script>
                                        function Previous() {
                                            window.history.back()
                                        }
                                    </script>
                                </div>
                                <div class="">
                                    <div class="grid justify-items-center">

                                        <div class="rounded-full flex bg-gray-100 px-8 py-2">
                                            <div class="flex px-4">
                                                <i class="fas fa-angle-left nav rounded-full p-4 bg-gray-100 hover:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-300" wire:click="decrementar('m')"></i>
                                                <div class="px-2 text-2xl mt-2">{{ $meses[$countMes] }}</div>
                                                <i class="fas fa-angle-right nav rounded-full p-4 bg-gray-100 hover:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-300" wire:click="incrementar('m')"></i>
                                            </div>

                                            <div class="flex px-4">
                                                <i class="fas fa-angle-left nav rounded-full p-4 bg-gray-100 hover:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-300" wire:click="decrementar('a')"></i>
                                                <div class=" px-2 text-2xl mt-2"><span class="year">{{ $anio }}</span></div>
                                                <i class="fas fa-angle-right nav rounded-full p-4 bg-gray-100 hover:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-300" wire:click="incrementar('a')"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button wire:click="create()" class="bg-primary text-white font-bold py-2 px-4 rounded my-3"><i class="fa-solid fa-plus"></i> Agregar</button>
                                    @if($isModalOpen)
                                    @include('livewire.orchards_production_manager.create')
                                    @endif
                                </div>
                            </div>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <div class=" grid gap-2 sm:grid-cols-1 lg:grid-cols-2">
                                <div class="w1/2 col-span-1">
                                    <div class=" rounded-lg  bg-green-100 px-4 pl-6 py-2 border w-full p-4">
                                        <div class=" text-center">
                                            <h1>Toneladas y costo de venta</h1>
                                        </div>
                                    </div>

                                    <canvas id="myChart" width="800" height="450"></canvas>=
                                    <script>
                                        const data_harve = <?php echo json_encode($data_harvest) ?>

                                        const ctx = document.getElementById('myChart').getContext('2d');
                                        const myChart = new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                                datasets: [{
                                                    label: 'toneladas',
                                                    data: data_harve,
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(54, 162, 235, 0.2)',
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)',
                                                        'rgba(153, 102, 255, 0.2)',
                                                        'rgba(255, 159, 64, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(255, 99, 132, 1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(75, 192, 192, 1)',
                                                        'rgba(153, 102, 255, 1)',
                                                        'rgba(255, 159, 64, 1)'
                                                    ],
                                                    borderWidth: 2,
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                },
                                                plugins: {
                                                    subtitle: {
                                                        display: true,
                                                        text: 'Año 2023'
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                                <div class=" col-span-1">
                                    <div class=" rounded-lg  bg-green-100 px-4 pl-6 py-2 border w-full p-4">
                                        <div class=" text-center ">
                                            <h1>Toneladas y costo de venta</h1>
                                        </div>
                                    </div>
                                    <canvas id="line-chart" width="800" height="450"></canvas>
                                    <script>
                                        var data_sales = <?php echo json_encode($data_sales) ?>
                                    </script>
                                    <script>
                                        new Chart(document.getElementById("line-chart"), {
                                            type: 'line',
                                            data: {
                                                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                                datasets: [{
                                                    data: data_sales,
                                                    label: "Costo de venta",
                                                    borderColor: "#3e95cd",
                                                    fill: true
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                },
                                                plugins: {
                                                    subtitle: {
                                                        display: true,
                                                        text: 'Año 2023'
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>