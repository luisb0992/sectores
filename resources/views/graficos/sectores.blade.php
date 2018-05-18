@extends('layouts.app')
@section('content')
  <div class="content">
    <div class="row">
  <h3 class="text-center">Simulacro Electoral</h3>
  <center><h3>Ultima Actualizacion - <strong>{{$municipio[1]->actualizacion}}</strong></h3></center>
    @for ($i = 0; $i < 18; $i++)
    <div class="col-md-6">
      <div class="box box-danger">
        <div class="box-body">
          <div class="box-footer box-danger">
            <div id='myChart{{$i}}' style="min-width: 310px; max-width: 400px;height: 300px;margin: 0 auto"></div>
            <center><h3>Meta Electoral: {{number_format($municipio[$i]->total,0,",",".")}}</h3>
        <h3>Padròn Electoral: {{number_format($municipio[$i]->total_electores,0,",",".")}} </h3></center>
          </div>
        </div>
      </div>         
    </div>
  @endfor
</div>
</div>
@endsection

@section('script')
<script type="text/javascript">

$(document).ready(function () {
grafico();
    setInterval(grafico, 60 * 1000);

   function grafico()
   {

    $.ajax({
      url: '{{route('cargajefe')}}',
      type: 'GET',
      dataType: 'json',
      
    })
    .done(function(data) {
      var div = "";
      var i = 0;
  //console.log(data.data)
      $.each(data.data, function(index, val) {
        console.log(val.total)
              var total = parseInt(val.total);
               var porcentaje_total = Math.round(parseInt(val.cantidad) * 100 / total);

   var myConfig7 = {
    "type":"gauge",
      "title":{ 
      "text": val.municipio+" -- "+porcentaje_total+"%"
    },
    "scale-r":{
      "aperture":200,
      "values":"0:100:20",
      "center":{
        "size":5,
          "background-color":"#66CCFF #FFCCFF",
          "border-color":"none"
      },
      "ring":{
        "size":20,
        "rules":[
          {
            "rule":"%v >= 0 && %v <= 30",
              "background-color":"red"
          },
          {
            "rule":"%v >= 50 && %v <= 90",
              "background-color":"green"
          },
          {
            "rule":"%v >= 91 && %v <= 100",
              "background-color":"green"
          }
        ]
      },
      "labels":["0","20","40"]  //Scale Labels
    },
    "plot":{
      "csize":"5%",
      "size":"100%",
      "background-color":"#000000"
    },
    "series":[
      {"values":[porcentaje_total]}
    ]
  };
   
  zingchart.render({ 
      id : 'myChart'+i, 
      data : myConfig7, 
      height : "100%", 
      width: "100%"
  });
   

        div+= "<input value='"+val.municipio+"' type='submit'>"
        i++;
      });//fin each


          
      //console.log(i)
      
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  }
  });
</script>
@endsection
