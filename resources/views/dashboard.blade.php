@extends('layouts.app')
@section('title','Inicio - '.config('app.name'))

@section('content')
	<div class="row">
		<div class="col-md-12 box box-solid" style="padding: 1em">
			<h1 class="text-center">Bienvenido al sistema de carga de votos</h1>
			<h4 class="text-center text-danger"><em>Presidenciales 2018</em></h4>
			<h4 class="text-center list-group-item label-danger">
				{{ $sector->SECTORES_SOCIALES }}
				<br><br>
				<span>META <span style="background-color: #fff; color:#000; padding: 4px">{{ $sector->META_ELECTORAL }} votos</span></span>
			</h4>
			<img src="{{ asset('img/dashboard.jpg') }}" class="img-responsive text-center" width="100%">			
		</div>   
  	</div>
@endsection