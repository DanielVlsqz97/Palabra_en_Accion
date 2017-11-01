@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Grado</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'colegio/grados','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nombre_grado">Nombre</label>
						<input type="text" name="nombre_grado" required value="{{old('nombre_grado')}}" class="form-control" placeholder="Nombre...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="seccion">Seccion</label>
						<input type="text" name="seccion" required value="{{old('seccion')}}" class="form-control" placeholder="Seccion...">
					</div>
				</div>


				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nivel academico">Nivel Academico </label>
						<select data-live-search="true" name="idNivelAcademico" id="idNivelAcademico" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($niveles as $niv)
								<option value="{{$niv->idNivelAcademico}}">{{$niv->nombre_nivel}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="jornada">Jornada </label>
						<select data-live-search="true" name="idJornada" id="idJornada" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($jornadas as $jor)
								<option value="{{$jor->idJornada}}">{{$jor->nombre_jornada}}</option>
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
