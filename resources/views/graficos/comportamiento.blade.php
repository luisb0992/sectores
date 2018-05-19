@extends('layouts.app')
@section('content')

<div class="content">
   <div class="row">
        <div class="col-sm-12">
            <div id="container" style="height: 700px"></div>
        </div>
   </div>
</div>

@endsection

@section('script')

<script>
Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Reporte Sectores Sociales'
    },
    subtitle: {
        text: 'Actualizado por hora'
    },
    xAxis: {
        categories: ['8:00', '9:00', '10:00', '11:00', '12:00', '1:00', '2:00', '3:00', '4:00', '5:00', '6:00', '7:00', '8:00']
    },
    yAxis: {
        title: {
            text: 'Sectores Sociales'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Educadores',
        data: [400, 600, 1200, 900, 970, 1600, 1450, 2200, 1800, 1360, 790, 1050, 1600]
    }, {
        name: 'Salud',
        data: [400, 700, 1500, 900, 970, 1600, 1850, 2800, 1900, 1360, 790, 600, 1800]
    },{
        name: 'Abogados',
        data: [300, 500, 400, 900, 850, 1200, 1250, 1200, 1800, 1360, 790, 1050, 900]
    },{
        name: 'Adultos',
        data: [100, 300, 600, 700, 900, 1100, 1200, 600, 1500, 1000, 790, 1050, 1200]
    },{
        name: 'Campesino',
        data: [400, 800, 900, 750, 970, 800, 350, 800, 1800, 1200, 600, 1050, 1100]
    },{
        name: 'Carnet P',
        data: [50, 100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 900]
    },{
        name: 'Chamba',
        data: [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 1050, 1300]
    },{
        name: 'Comunales',
        data: [300, 600, 900, 1200, 1500, 1800, 2100, 1800, 1500, 1200, 900, 800, 1200]
    },{
        name: 'Consejales',
        data: [200, 400, 600, 800, 1000, 1200, 1450, 1600, 1800, 2000, 2200, 2400, 2600]
    }]

});
</script>

@endsection
