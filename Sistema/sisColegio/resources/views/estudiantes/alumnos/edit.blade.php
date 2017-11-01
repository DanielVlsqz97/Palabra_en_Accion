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
			<h3>Editar Estudiante: {{$estudiante->nombre.' '.$estudiante->apellido}}</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($estudiante,['method'=>'PATCH','route'=>['alumnos.update',$estudiante->idEstudiante], 'files'=>'true'])!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nombre">Nombre(es)</label>
						<input type="text" name="nombre" required value="{{$estudiante->nombre}}" class="form-control" placeholder="Nombre...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="apellido">Apellido(os)</label>
						<input type="text" name="apellido" required value="{{$estudiante->apellido}}" class="form-control" placeholder="Apellido...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="fecha_nac">Fecha de Nacimiento</label>
						<input type="date" name="fecha_nac" value="{{$estudiante->fecha_nac}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="certificado_nac">Certificado de Nacimiento</label>
						<input type="file" name="certificado_nac" class="form-control">
						@if (($estudiante->certificado_nac)!="")
							<img src="{{asset('imagenes/certificados_nac/'.$estudiante->certificado_nac)}}" height="150px" width="150px" class="img-thumbnail">
						@endif
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="anterior_establecimiento">Anterior Establecimiento</label>
						<input type="text" name="anterior_establecimiento" value="{{$estudiante->anterior_establecimiento}}" class="form-control" placeholder="Anterior Establecimiento...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="tipo_sangre">Tipo de Sangre</label>
						<input type="text" name="tipo_sangre" value="{{$estudiante->tipo_sangre}}" class="form-control" placeholder="Tipo de Sangre...">
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
										<input type="text" name="descripcion_enfermedades" required value="{{$estudiante->descripcion_enfermedades}}" class="form-control" placeholder="Descripcion de Enfermedades..">
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label for="medicamentos">Medicamentos</label>
										<input type="text" name="medicamentos" required value="{{$estudiante->medicamentos}}" class="form-control" placeholder="Medicamentos..">
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
										<input type="text" name="descripcion_alergia" required value="{{$estudiante->descripcion_alergia}}" class="form-control" placeholder="Descripcion de Alergias..">
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
