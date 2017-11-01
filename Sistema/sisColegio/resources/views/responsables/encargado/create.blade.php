@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Encargado</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'responsables/encargado','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nombre_encargado">Nombre(es)</label>
						<input type="text" name="nombre_encargado" required value="{{old('nombre_encargado')}}" class="form-control" placeholder="Nombre...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="apellidos_encargado">Apellido(os)</label>
						<input type="text" name="apellidos_encargado" required value="{{old('apellidos_encargado')}}" class="form-control" placeholder="Apellido...">
					</div>
				</div>


				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="dpi">DPI</label>
						<input type="text" name="dpi" value="{{old('dpi')}}" class="form-control" placeholder="DPI...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="domicilio">Domicilio</label>
						<input type="text" name="domicilio" value="{{old('domicilio')}}" class="form-control" placeholder="Domicilio...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nacionalidad">Nacionalidad</label>
						<input type="text" name="nacionalidad" required value="{{old('nacionalidad')}}" class="form-control" placeholder="Nacionalidad..">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="fecha_nac">Fecha de Nacimiento</label>
						<input type="date" name="fecha_nac" value="{{old('fecha_nac')}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="estado_civil">Estado Civil</label>
						<input type="text" name="estado_civil" value="{{old('estado_civil')}}" class="form-control" placeholder="Estado Civil...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="profesion">Profesion</label>
						<input type="text" name="profesion" value="{{old('profesion')}}" class="form-control" placeholder="Profesion...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="trabajo">Trabajo</label>
						<input type="text" name="trabajo" value="{{old('trabajo')}}" class="form-control" placeholder="Trabajo...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="observaciones">Observaciones</label>
						<input type="text" name="observaciones" value="{{old('observaciones')}}" class="form-control" placeholder="Observaciones...">
					</div>
				</div>


			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
