@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevos Padres de Familia</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'responsables/padres','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<div class="row">
				<h4>Datos del Padre</h4>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

					<div class="form-group">
						<label for="nombre_padre">Nombre(es)</label>
						<input type="text" name="nombre_padre" required value="{{old('nombre_padre')}}" class="form-control" placeholder="Nombre...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="apellido_padre">Apellido(os)</label>
						<input type="text" name="apellido_padre" required value="{{old('apellido_padre')}}" class="form-control" placeholder="Apellido...">
					</div>
				</div>


				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="telefono_padre">Telefono</label>
						<input type="text" name="telefono_padre" value="{{old('telefono_padre')}}" class="form-control" placeholder="Telefono...">
					</div>
				</div>

			</div>

			<div class="row">
				<h4>Datos de la Madre</h4>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nombre_madre">Nombre(es)</label>
						<input type="text" name="nombre_madre" required value="{{old('nombre_madre')}}" class="form-control" placeholder="Nombre...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="apellido_madre">Apellido(os)</label>
						<input type="text" name="apellido_madre" required value="{{old('apellido_madre')}}" class="form-control" placeholder="Apellido...">
					</div>
				</div>


				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="telefono_madre">Telefono</label>
						<input type="text" name="telefono_madre" value="{{old('telefono_madre')}}" class="form-control" placeholder="Telefono...">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="no_hijos">Número de Hijos</label>
						<input type="number" name="no_hijos" value="{{old('no_hijos')}}" class="form-control" placeholder="Número de Hijos...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="no_hijos_hombre">Número de Hijos Hombres</label>
						<input type="number" name="no_hijos_hombre" value="{{old('no_hijos_hombre')}}" class="form-control" placeholder="Número de Hijos Hombres...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="no_hijos_mujeres">Número de Hijos Mujeres</label>
						<input type="number" name="no_hijos_mujeres" value="{{old('no_hijos_mujeres')}}" class="form-control" placeholder="Número de Hijos Mujeres...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="estado_convivencia">Estado Convivencia</label>
						<input type="text" name="estado_convivencia" value="{{old('estado_convivencia')}}" class="form-control" placeholder="Estado Convivencia...">
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
