@extends('layouts.app')
@section('title','Data - '.config('app.name'))
@section('content')
	@include('partials.flash')
	<div class="box box-danger box-solid">
	    <div class="box-header with-border">
	        <h3 class="box-title"><i class="fa fa-box"></i> Bitacora del sistema </h3>
	        <span class="pull-right"></span>
	    </div>
      	<div class="box-body">
      		<table class="table data-table table-bordered table-hover table-condensed">
				<thead>
					<tr>
						<th class="text-center">Usuario o Sector</th>
						<th class="text-center">Proceso Realizado</th>
						<th class="text-center">Total de votos</th>
					</tr>
				</thead>
				<tbody class="text-center">
					@foreach($bitacora as $d)
						<tr>
							<td>{{ $d->usuario }}</td>
							<td>{{ $d->proceso }}</td>
							<td>@if($d->total == '') sin detalles @else {{ $d->total }} @endif</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
