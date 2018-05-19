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
        
          categories: ['7:00AM','8:00AM']  /*<?php    echo "'" . implode(",", $hora) . "'"; ?>,*/
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
        <?php foreach($data as $s) { ?>
        {
            name: "<?php echo $s->sector ?>",
            data: [<?php echo $s->total ?>]
        }, 
        <?php } ?>
    ]


});
</script>

@endsection
