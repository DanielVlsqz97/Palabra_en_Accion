@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Horario</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'colegio/horarios','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<div class="row">

				<div >
					<div class="form-group">
						<label for="dia" >Dia</label>


							<select name="dia" class="form-control">
								<option value="Lunes">Lunes</option>
								<option value="Martes">Martes</option>
								<option value="Miercoles">Miercoles</option>
								<option value="Jueves">Jueves</option>
								<option value="Viernes">Viernes</option>
							</select>


					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="hora_incio">Hora de Inicio</label>
						<input type="time"  name="hora_inicio" required value="{{old('hora_inicio')}}">

					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="hora_fin">Hora de Fin   </label>
						<input type="time"  name="hora_fin" required value="{{old('hora_fin')}}">

					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="idCurso">Curso </label>
						<select data-live-search="true" name="idCurso" id="idCurso" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($cursos as $cur)
								<option value="{{$cur->idCurso}}">{{$cur->nombre_curso}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="idSubArea">Sub-Area </label>
						<select data-live-search="true" name="idSubArea" id="idSubArea" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($subareas as $sub)
								<option value="{{$sub->idsubArea}}">{{$sub->nombre_subarea}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="idDocente">Docente </label>
						<select data-live-search="true" name="idDocente" id="idDocente" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($docentes as $doc)
								<option value="{{$doc->idDocente}}">{{$doc->nombres.' '.$doc->apellidos}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="idGrado">Grado </label>
						<select data-live-search="true" name="idGrado" id="idGrado" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($grados as $gra)
								<option value="{{$gra->idGrado}}">{{$gra->nombre_grado}}</option>
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
