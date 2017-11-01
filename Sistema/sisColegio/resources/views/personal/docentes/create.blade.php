@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Docente</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'personal/docentes','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nombres">Nombres</label>
						<input type="text" name="nombres" required value="{{old('nombres')}}" class="form-control" placeholder="Nombres...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="apellidos">Apellidos</label>
						<input type="text" name="apellidos" required value="{{old('apellidos')}}" class="form-control" placeholder="Apellidos...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="dpi">DPI</label>
						<input type="text" name="dpi" required value="{{old('dpi')}}" class="form-control" placeholder="DPI...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="direccion">Direccion</label>
						<input type="text" name="direccion" required value="{{old('direccion')}}" class="form-control" placeholder="Direccion...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="ceduladocente">Cedula Docente</label>
						<input type="text" name="ceduladocente" required value="{{old('ceduladocente')}}" class="form-control" placeholder="Cedula Docente...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="email">Correo Electronico</label>
						<input type="email" name="email" required value="{{old('email')}}" class="form-control" placeholder="Correo Electronico...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="grado_academico">Grado Academico</label>
						<input type="text" name="grado_academico" required value="{{old('grado_academico')}}" class="form-control" placeholder="Apellidos...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="experiencia_laboral">Experiencia Laboral</label>
						<input type="text" name="experiencia_laboral" required value="{{old('experiencia_laboral')}}" class="form-control" placeholder="Experiencia Laboral...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="inicio_labores">Inicio de Labores</label>
						<input type="date" name="inicio_labores" value="{{old('inicio_labores')}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="idRegistroEscalafonario">Registro Escalafonario </label>
						<select data-live-search="true" name="idRegistroEscalafonario" id="idRegistroEscalafonario" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($registros as $reg)
								<option value="{{$reg->idRegistroEscalafonario}}">{{$reg->clase}}</option>
							@endforeach
						</select>
					</div>
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
