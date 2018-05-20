@extends('layouts.app')
@section('title','Data - '.config('app.name'))
@section('content')
	@include('partials.flash')
	<div class="box box-danger">
	    <div class="box-header with-border">
	        <h3 class="box-title"><i class="fa fa-box"></i> DATA pendiente para ser cargada </h3>
	        <span class="pull-right">
	        	<button type="button" class="btn btn-success" id="btn_data_all">
	        		<i class="fa fa-arrows"></i> Subir todo
	        	</button>
	        </span>
	    </div>
      	<div class="box-body">
      		<table class="table data-table table-bordered table-hover table-condensed">
				<thead>
					<tr>
						<th class="text-center">Sector</th>
						<th class="text-center">Municipio</th>
						<th class="text-center">Parroquia</th>
						<th class="text-center">Hora Reporte</th>
						<th class="text-center">Total</th>
						<th class="text-center">Subir</th>
					</tr>
				</thead>
				<tbody class="text-center">
					@foreach($data as $d)
						<tr id="tr_{{ $d->id }}">
							<td>{{ $d->sector->SECTORES_SOCIALES }}</td>
							<td>{{ $d->municipio }}</td>
							<td>{{ $d->parroquia }}</td>
							<td>{{ $d->hora_reporte }}</td>
							<td>{{ $d->total }}</td>
							<td>
								<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
								<button type="button" class="btn btn-success" id="btn_data" value="{{ $d->id }}"  onclick="data(this)">
									<i class="fa fa-arrow-up"></i>
								</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="modal fade" tabindex="-1" role="dialog" id="modal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      </div>
	      <div class="modal-body text-center">
	        <h3><i class="fa fa-check-circle text-success fa-2x"></i> 
	        	Subida con Exito!
	        	<i class="fa fa-refresh fa-spin text-primary fa-fw"></i> 
	        </h3>
	      </div>
	      <div class="modal-footer">
	      </div>
	    </div>
	  </div>
	</div>
@endsection
@section('script')
<script type="text/javascript">

	function data(btn){
		var valor = btn.value;
		var btn = $('#btn_data').val();
		var token = $("#token").val();

		$.ajax({
			headers: {'X-CSRF-TOKEN': token},
			url: '{{ route("cambioStatus") }}',
			type: 'POST',
			dataType: 'JSON',
			data: {valor: valor},
		})
		.done(function() {
			$("#tr_"+valor).remove();
			alert("Data subida con exito");
		})
		.fail(function() {
			alert("Ocurrio un error! intente de nuevo");
		})
		.always(function() {
			console.log("complete");
		});
	}

	$("#btn_data_all").click(function(event) {
		$('#btn_data_all').text('Subiendo...');
		var token = $("#token").val();

		$.ajax({
			headers: {'X-CSRF-TOKEN': token},
			url: '{{ route("allData") }}',
			type: 'POST',
			dataType: 'JSON',
			data: {data: 1},
		})
		.done(function() {
			$("#modal").modal('show');
			$('#btn_data_all').text('Cargado!');
			location.reload(4000);
		})
		.fail(function() {
			alert("Ocurrio un error! intente de nuevo");
		})
		.always(function() {
			console.log("complete");
		});	
	});

</script>
@endsection
