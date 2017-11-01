@extends('layouts.admin')
@section('contenido')

	<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("enfermedades");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }

		function showContent1() {
        element = document.getElementById("content1");
        check = document.getElementById("alergico");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
	</script>

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Estudiante</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'estudiantes/alumnos','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
			{{Form::token()}}

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="Padres_idPadres">Padres de Familia </label>
						<select data-live-search="true" name="Padres_idPadres" id="Padres_idPadres" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($padres as $pad)
								<option value="{{$pad->idPadres}}">{{$pad->nombre_padre.' '.$pad->apellido_padre.' - '.$pad->nombre_madre.' '.$pad->apellido_madre}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="idEncargado">Encargado</label>
						<select data-live-search="true" name="idEncargado" id="idEncargado" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($encargado as $enc)
								<option value="{{$enc->idEncargado}}">{{$enc->nombre_encargado.' '.$enc->apellidos_encargado}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="idGrado">Grado </label>
						<select data-live-search="true" name="idGrado" id="idGrado" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($grado as $gra)
								<option value="{{$gra->idGrado}}">{{$gra->nombre_grado}}</option>
							@endforeach
						</select>
					</div>
				</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<b>Repitiendo Grado</b>
							<input type="checkbox" name="repitiendo" id="repitiendo" value="1" />
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<b>Becado</b>
							<input type="checkbox" name="becado" id="becado" value="1" />
						</div>
					</div>




				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nombre">Nombre(es)</label>
						<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="apellido">Apellido(os)</label>
						<input type="text" name="apellido" required value="{{old('apellido')}}" class="form-control" placeholder="Apellido...">
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
						<label for="certificado_nac">Certificado</label>
						<input type="file" name="certificado_nac" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="anterior_establecimiento">Anterior Establecimiento</label>
						<input type="text" name="anterior_establecimiento" value="{{old('anterior_establecimiento')}}" class="form-control" placeholder="Anterior Establecimiento...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="tipo_sangre">Tipo de Sangre</label>
						<input type="text" name="tipo_sangre" value="{{old('tipo_sangre')}}" class="form-control" placeholder="Tipo de Sangre...">
					</div>
				</div>
			</div>

				<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<b>Enfermedades</b>
							<input type="checkbox" name="enfermedades" id="enfermedades" value="1" onchange="javascript:showContent()" />
						</div>
						</div>

						</div>
							<div id="content" style="display: none;">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label for="descripcion_enfermedades">Descripcion de Enfermedades</label>
										<input type="text" name="descripcion_enfermedades" required value="{{old('descripcion_enfermedades')}}" class="form-control" placeholder="Descripcion de Enfermedades..">
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label for="medicamentos">Medicamentos</label>
										<input type="text" name="medicamentos" required value="{{old('medicamentos')}}" class="form-control" placeholder="Medicamentos..">
									</div>
								</div>

							</div>
							</div>
						</div>
					</div>

				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<b>Alergias</b>
						<input type="checkbox" name="alergico" id="alergico" value="1" onchange="javascript:showContent1()" />
					</div>
				</div>
					</div>

							<div id="content1" style="display: none;">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label for="descripcion_alergia">Descripcion de Alergias</label>
										<input type="text" name="descripcion_alergia" required value="{{old('descripcion_alergia')}}" class="form-control" placeholder="Descripcion de Alergias..">
									</div>
								</div>
							</div>
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
