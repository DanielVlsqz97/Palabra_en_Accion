@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Contrato</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'colegio/contratos','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="fecha">Fecha</label>
						<input type="date" name="fecha" value="{{old('fecha')}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="idEstudiante">Estudiante</label>
						<select data-live-search="true" name="idEstudiante" id="idEstudiante" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($estudiantes as $est)
								<option value="{{$est->idEstudiante}}">{{$est->nombre.' '.$est->apellido}}</option>
							@endforeach
						</select>
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
