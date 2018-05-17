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
        
          categories: []
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
            data: [<?php echo $s->total ?>]
        }, 
        <?php } ?>
    ]


});
</script>

@endsection
