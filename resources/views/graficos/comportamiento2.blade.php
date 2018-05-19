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
    series: [
        <?php foreach($sectores as $s) { ?>   
        {
            name: "<?php echo $s->SECTORES_SOCIALES ?>",
            data: [<?php echo join($s->datos(),",") ?>]
        }, 
        <?php } ?>
    ]
});
</script>

@endsection