@extends('layouts.app')
@section('title','Data - '.config('app.name'))
@section('content')
	@include('partials.flash')
	<div class="box box-danger box-solid">
	    <div class="box-header with-border">
	        <h3 class="box-title"><i class="fa fa-box"></i> Mis reportes cargados </h3>
	        <span class="pull-right">
	        	Total <span class="badge">{{ $data->count() }}</span>
	        </span>
	    </div>
      	<div class="box-body">
      		<table class="table data-table table-bordered table-hover table-condensed">
				<thead>
					<tr>
						<th class="text-center">Municipio</th>
						<th class="text-center">Parroquia</th>
						<th class="text-center">Hora Reporte</th>
						<th class="text-center">Total</th>
					</tr>
				</thead>
				<tbody class="text-center">
					@foreach($data as $d)
						<tr>
							<td>{{ $d->municipio }}</td>
							<td>{{ $d->parroquia }}</td>
							<td>{{ $d->hora_reporte }}</td>
							<td>{{ $d->total }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
