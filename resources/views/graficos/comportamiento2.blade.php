@extends('layouts.app')
@section('content')

<div class="content">
   <div class="row">
        <div class="col-sm-12">
            <div id="container" style="height: 800px"></div>
        </div>
   </div>
</div>
<div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-box"></i> Totales por municipios </h3>
            <span class="pull-right"></span>
        </div>
        <div class="box-body">
            <table class="table data-table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th class="text-center">Municipio</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($total as $d)
                        <tr>
                            <td>{{ $d->municipio }}</td>
                            <td>{{ $d->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
        text: 'Sectores Sociales'
    },
    subtitle: {
        text: 'Actualizado por hora'
    },
    xAxis: {
        categories: ['7:00','8:00', '9:00', '10:00', '11:00', '12:00', '1:00', '2:00', '3:00', '4:00', '5:00', '6:00', '7:00', '8:00', '9:00', '10:00']
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