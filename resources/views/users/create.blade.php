@extends('layouts.app')
@section('title','Usuarios - '.config('app.name'))
@section('header','Usuarios')
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{route('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
	  <li><a href="{{route('users.index')}}" title="Usuarios"> Usuarios </a></li>
	  <li class="active">Agregar</li>
	</ol>
@endsection
@section('content')
		<!-- Formulario -->
		

		<div class="box box-danger box-solid">
	      <div class="box-header with-border">
	        <h3 class="box-title"><i class="fa fa-users"></i> Nuevo Usuario</h3>
	        <span class="pull-right"></span>
	      </div>
      	<div class="box-body">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<form class="" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
						{{ method_field( 'POST' ) }}
						{{ csrf_field() }}
						<div class="form-group {{ $errors->has('cedula')?'has-error':'' }}">
							<label class="control-label" for="cedula">Cedula: *</label>
							<input id="cedula" class="form-control" type="text" name="cedula" value="{{ old('cedula')?old('cedula'):'' }}" placeholder="Cedula" required>
						</div>

						<div class="form-group {{ $errors->has('name')?'has-error':'' }}">
							<label class="control-label" for="name">Nombres: *</label>
							<input id="name" class="form-control" type="text" name="nombres" value="{{ old('nombres')?old('nombres'):'' }}" placeholder="Nombre" required>
						</div>

						<div class="form-group {{ $errors->has('apellido')?'has-error':'' }}">
							<label class="control-label" for="apellido">Apellidos: *</label>
							<input id="apellido" class="form-control" type="text" name="apellidos" value="{{ old('apellidos')?old('apellidos'):'' }}" placeholder="Apellido" required>
						</div>
						
						<div class="form-group {{ $errors->has('usuario')?'has-error':'' }}">
							<label class="control-label" for="usuario">Usuario: *</label>
							<input id="email" class="form-control" type="mail" name="usuario" value="{{ old('usuario')?old('usuario'):'' }}" placeholder="Usuario" required>
						</div>

						<div class="form-group {{ $errors->has('email')?'has-error':'' }}">
							<label class="control-label" for="email">Sector: *</label>
							<select class="form-control" name="sector_id">
								<option value="">Seleccione...</option>
								@foreach($sectores as $p)
									<option value="{{ $p->Id }}">{{ $p->SECTORES_SOCIALES }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group {{ $errors->has('password')?'has-error':'' }}">
							<label class="control-label" for="password">Contraseña: *</label>
							<input id="password" class="form-control" type="password" name="password" required>
						</div>

						<div class="form-group {{ $errors->has('password_confirmation')?'has-error':'' }}">
							<label class="control-label" for="password_confirmation">Verificar: *</label>
							<input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
						</div>

						@if (count($errors) > 0)
				          <div class="alert alert-danger alert-important">
					          <ul>
					            @foreach($errors->all() as $error)
					              <li>{{$error}}</li>
					            @endforeach
					          </ul>  
				          </div>
				        @endif

						<div class="form-group text-right">
							<a class="btn btn-flat btn-default" href="{{route('users.index')}}"><i class="fa fa-reply"></i> Atras</a>
							<button class="btn btn-flat btn-primary" type="submit"><i class="fa fa-send"></i> Guardar</button>
						</div>
						
					</form>
				</div>
		</div>
	</div>
@endsection
