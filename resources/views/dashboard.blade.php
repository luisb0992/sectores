@extends('layouts.app')
@section('title','Inicio - '.config('app.name'))

@section('content')
	<div class="row">
		<div class="col-md-12 box box-solid" style="padding: 1em">
			@if(\Auth::user()->rol == 'U')
			<h4 class="text-center list-group-item label-danger">
				{{ $sector->SECTORES_SOCIALES }}
				<br><br>
				<span>META <span style="background-color: #fff; color:#000; padding: 4px">{{ $sector->META_ELECTORAL }} votos</span></span>
			</h4>
			@endif
			<img src="{{ asset('img/LOGO_MEGA-01.png') }}" class="img-responsive text-center" width="100%">			
		</div>   
  	</div>
@endsection