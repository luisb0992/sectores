@extends('layouts.app')
@section('title','Data - '.config('app.name'))
@section('content')
	@include('partials.flash')
	<div class="box box-danger">
	    <div class="box-header with-border">
	        <h3 class="box-title"><i class="fa fa-box"></i> DATA que puede ser eliminada </h3>
	        <span class="pull-right">
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
						<th class="text-center">eliminar</th>
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
								<button type="button" class="btn btn-danger" id="btn_data" value="{{ $d->id }}"  onclick="data(this)">
									<i class="fa fa-trash"></i>
								</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
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
			url: '{{ route("deleteData") }}',
			type: 'POST',
			dataType: 'JSON',
			data: {valor: valor},
		})
		.done(function() {
			$("#tr_"+valor).remove();
			alert("Data eliminada con exito");
		})
		.fail(function() {
			alert("Ocurrio un error! intente de nuevo");
		})
		.always(function() {
			console.log("complete");
		});
	}
</script>
@endsection
