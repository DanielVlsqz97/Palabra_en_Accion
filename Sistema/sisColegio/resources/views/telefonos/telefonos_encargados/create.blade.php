@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Telefono</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'telefonos/telefonos_encargados','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="encargado">Encargado </label>
					<select data-live-search="true" name="encargado" id="encargado" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
						@foreach($encargados as $enc)
							<option value="{{$enc->idEncargado}}">{{$enc->nombre_encargado.' '.$enc->apellidos_encargado}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="numero">Numero</label>
						<input type="text" name="numero" required value="{{old('numero')}}" class="form-control" placeholder="Numero...">
					</div>
				</div>


				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="tipo_telefono">Tipo de Telefono </label>
						<select data-live-search="true" name="tipo_telefono" id="tipo_telefono" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($tipo_telefonos as $tip)
								<option value="{{$tip->idTipoTelefono}}">{{$tip->Telefono}}</option>
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
