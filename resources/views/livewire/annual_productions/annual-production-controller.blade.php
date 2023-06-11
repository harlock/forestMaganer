<div class="py-12">
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
            <button wire:click="create()" class="bg-primary text-white font-bold py-2 px-4 rounded my-3"><i class="fa-solid fa-plus"></i> Agregar</button>
            @if($isDialogOp)
            @include('livewire.annual_productions.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-300">
                        <th class="px-4 py-2 w-20">Numero</th>
                        <th class="px-4 py-2">Huerto</th>
                        <th class="px-4 py-2">toneladas de cosecha</th>
                        <th class="px-4 py-2">fecha de producción</th>
                        <th class="px-4 py-2">Venta</th>
                        <th class="px-4 py-2">Porcentaje de daño</th>

                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($annual_productions as $annual_production)
                    <tr>
                        <td class="border px-4 py-2">{{ $annual_production->id }}</td>
                        <td class="border px-4 py-2">{{ $annual_production->orchard->name_orchard}}</td>
                        <td class="border px-4 py-2">{{ $annual_production->ton_harvest }} Toneladas</td>
                        <td class="border px-4 py-2">{{ $annual_production->date_production }}</td>
                        <td class="border px-4 py-2">{{ $annual_production->sale }}</td>
                        <td class="border px-4 py-2">{{ $annual_production->damage_percentage }} %</td>

                        <td class="border px-4 py-2">
                            <div class="flex justify-between">
                                <div>
                                    <button wire:click="edit({{ $annual_production->id }})" class="bg-green-700 text-white font-bold py-2 px-4"><i class="fa-solid fa-pen-to-square"></i></button>
                                </div>
                                <div>
                                    <button wire:click="ConfirmaDelete({{ $annual_production->id }})" class="bg-red-700 text-white font-bold py-2 px-4"><i class="fa-solid fa-trash-can"></i></button>
                                    {{--<button wire:click="$emit('openModal', 'confirm-delete')">Open Modal</button>--}}
                                    @if($isconfirm)
                                    @include('livewire.confirm-delete')
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h1>Toneladas cosechadas</h1>
            <div id="chart-container"></div>
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script>
                var datas = [1,3,4,2,5,7,1,2,3,1,7,2]

                Highcharts.chart('chart-container', {
                    title: {
                        text: 'Grafico del 2022'
                    },
                    subtitle: {
                        text: 'toneladas y costos de venta'
                    },
                    xAxis: {
                        categories: ['inicio año', 'Ene', 'Feb', 'Mar', 'Abril', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
                    },
                    yAxis: {
                        title: {
                            text: 'Numero de toneladas vendidas'
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },
                    plotOptions: {
                        series: {
                            allowPointSelect: true
                        }
                    },
                    series: [{
                        name: 'Toneladas',
                        data: datas
                    }],

                    responsive: {
                        rules: [{
                            condition: {
                                maxwidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizonal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }
                });
            </script>



            <h1>Costo de venta por tonelada</h1>
            <div id="chart-containers"></div>
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script>
                var datass = <?php echo json_encode($datass) ?>

                Highcharts.chart('chart-containers', {
                    title: {
                        text: 'Grafico del 2022'
                    },
                    subtitle: {
                        text: 'toneladas y costos de venta'
                    },
                    xAxis: {
                        categories: ['inicio año', 'Ene', 'Feb', 'Mar', 'Abril', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
                    },
                    yAxis: {
                        title: {
                            text: 'Costo de venta de toneladas'
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },
                    plotOptions: {
                        series: {
                            allowPointSelect: true
                        }
                    },
                    series: [{
                        name: 'costo',
                        data: datass
                    }],

                    responsive: {
                        rules: [{
                            condition: {
                                maxwidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizonal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }
                });
            </script>
        </div>
    </div>
</div>
