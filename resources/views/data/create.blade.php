@extends('layouts.app')
@section('title','Carga Data - '.config('app.name'))
@section('content')
	@include('partials.flash')
		<div class="box box-danger box-solid">
	      <div class="box-header with-border">
	        <h3 class="box-title"><i class="fa fa-box"></i> Carga Sectores</h3>
	        <span class="pull-right"></span>
	      </div>
      	<div class="box-body">
			<div class="row">
				<div class="col-md-8 col-md-offset-2" style="border: solid 1px #eee">
					<form class="" action="{{ route('cargaData') }}" method="POST">
						{{ method_field( 'POST' ) }}
						{{ csrf_field() }}

						<div class="form-group">
							<label class="control-label" for="horar">Hora del Reporte: *</label>
							<select class="form-control" name="hora_reporte" id="horar" required="">
								<option value="7:00 A:M">7:00 A:M</option>
								<option value="8:00 A:M">8:00 A:M</option>
								<option value="9:00 A:M">9:00 A:M</option>
								<option value="10:00 A:M">10:00 A:M</option>
								<option value="11:00 A:M">11:00 A:M</option>
								<option value="12:00 P:M">12:00 P:M</option>
								<option value="1:00 P:M">1:00 P:M</option>
								<option value="2:00 P:M">2:00 P:M</option>
								<option value="3:00 P:M">3:00 P:M</option>
								<option value="4:00 P:M">4:00 P:M</option>
								<option value="5:00 P:M">5:00 P:M</option>
								<option value="6:00 P:M">6:00 P:M</option>
								<option value="7:00 P:M">7:00 P:M</option>
								<option value="8:00 P:M">8:00 P:M</option>
								<option value="9:00 P:M">9:00 P:M</option>
								<option value="10:00 P:M">10:00 P:M</option>
							</select>
						</div>

						<div class="form-group">
							<label class="control-label" for="muni">Municipio: *</label>
							<select class="form-control" name="municipio" id="muni" required="">
								<option value="">Seleccione...</option>
								@foreach($centro as $muni)
								<option value="{{ $muni->municipio }}">{{ $muni->municipio }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label class="control-label" for="parro">Parroquia: *</label>
							<select class="form-control" name="parroquia" id="parro" required="">
							</select>
						</div>

						<div class="form-group">
							<label class="control-label" for="sector">Sector Social: </label>
							<input type="hidden" name="sector_id" value="{{ $sector->Id }}" readonly="" class="form-control">
							<input type="text" value="{{ $sector->SECTORES_SOCIALES }}" readonly="" class="form-control">
						</div>

						<div class="form-group">
							<label class="control-label" for="total">Total votos: *</label>
							<input type="text" name="total" placeholder="Total..." required="" class="form-control">
						</div>

						<div class="form-group text-right">
							<button class="btn btn-flat btn-primary" type="submit">
								<i class="fa fa-send"></i> Guardar
							</button>
						</div>
					</form>
				</div>
		</div>
	</div>
@endsection
@section('script')
<script>
	   	$('#muni').change(function(event) {
	   		// alert(event.target.value);
		  	$.get("parro/"+event.target.value+"",function(response, muni){
		    		$("#parro").empty();
				    for (i = 0; i<response.length; i++) {
				        $("#parro").append("<option value='"+response[i].parroquia+"'> "+response[i].parroquia+"</option>"); 
				    }
		  	});
		});

		$(".select2").select2({
		    width: 'resolve' // need to override the changed default
		});
</script>
@endsection
