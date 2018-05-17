@extends('layouts.app')
@section('title','Usuarios - '.config('app.name'))
@section('header','Usuarios')
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{route('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
	  <li><a href="{{route('users.index')}}" title="Usuarios"> Usuarios </a></li>
	  <li class="active">Editar</li>
	</ol>
@endsection
@section('content')
		<!-- Formulario -->
		<div class="box box-danger">
	      <div class="box-header with-border">
	        <h3 class="box-title"><i class="fa fa-users"></i> Usuarios</h3>
	        <span class="pull-right">
					
					</span>
	      </div>
      	<div class="box-body">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<form class="" action="{{ route('users.update',[$user->id])}}" method="POST" enctype="multipart/form-data">
					{{ method_field('PATCH') }}
					{{ csrf_field() }}
					<h4>Editar Usuario</h4>
						<div class="form-group {{ $errors->has('cedula')?'has-error':'' }}">
							<label class="control-label" for="cedula">Cedula: *</label>
							<input id="cedula" class="form-control" type="text" name="cedula" value="{{ old('name')?old('name'):$user->cedula }}" placeholder="Cedula" required>
						</div>

						<div class="form-group {{ $errors->has('name')?'has-error':'' }}">
							<label class="control-label" for="name">Nombres: *</label>
							<input id="name" class="form-control" type="text" name="nombres" value="{{ old('nombres')?old('nombres'):$user->nombres }}" placeholder="Nombre" required>
						</div>

						<div class="form-group {{ $errors->has('apellido')?'has-error':'' }}">
							<label class="control-label" for="apellido">Apellidos: *</label>
							<input id="apellido" class="form-control" type="text" name="apellidos" value="{{ old('apellidos')?old('apellidos'):$user->apellidos }}" placeholder="Apellido" required>
						</div>
						
						<div class="form-group {{ $errors->has('usuario')?'has-error':'' }}">
							<label class="control-label" for="usuario">Usuario: *</label>
							<input id="email" class="form-control" type="text" name="usuario" value="{{ old('usuario')?old('usuario'):$user->usuario }}" placeholder="Usuario" required>
						</div>

						<div class="form-group {{ $errors->has('email')?'has-error':'' }}">
							<label class="control-label" for="email">Parroquias: *</label>
							<select class="form-control" name="parroquia">
								<option value="">Seleccione...</option>
								@foreach($parroquias as $p)
									<option value="{{$p->PARROQUIA}}">{{$p->PARROQUIA}}</option>
								@endforeach
							</select>
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


