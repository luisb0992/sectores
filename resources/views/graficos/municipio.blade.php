@extends('layouts.app')
@section('content')
  <div class="content">
    <div class="row">
    <h3 class="text-center">Elecciones Presidenciales</h3>
    <h3 class="text-center"><em>Municipios Cargados</em></h3>
    @php $i = 0; @endphp
      @foreach($municipios as $s)
      <div class="col-md-4">
        <div class="box box-danger">
          <div class="box-body">
            <div class="box-footer box-danger">
              <div id='myChart{{$i}}' style="min-width: 310px; max-width: 400px;height: 300px;margin: 0 auto"></div>
              <center><h3>Meta Electoral: {{$s->meta}}</h3>
                <center><h3>Votos: {{$s->cantidad}}</h3>
            </div>
          </div>
        </div>         
      </div>
      @php $i++; @endphp
    @endforeach
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">

$(document).ready(function () {
    grafico();
    setInterval(grafico, 60 * 100);

   function grafico()
   {

    $.ajax({
      url: '{{ route("data.municipios") }}',
      type: 'GET',
      dataType: 'json',
      
    })
    .done(function(data) {
      var div = "";
      var i = 0;
      $.each(data.data, function(index, val) {
        var total = parseInt(val.meta);
        var porcentaje_total = Math.round(parseInt(val.cantidad) * 100 / total);

   var myConfig7 = {
    "type":"gauge",
      "title":{ 
      "text": val.municipio
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


     

  var total = {
    "type":"gauge",
      "title":{ 
      "text": 'Total'
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
      {"values":[41]}
    ]
  };
   
  zingchart.render({ 
      id : 'total', 
      data : total, 
      height : "100%", 
      width: "100%"
  });
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
