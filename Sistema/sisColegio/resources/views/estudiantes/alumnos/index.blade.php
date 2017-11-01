@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Encargados de Estudiantes<a href="alumnos/create"><button class="btn btn-success">Nuevo</button></h3></a>
		@include('estudiantes.alumnos.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Fecha de Nacimiento</th>
					<th>Edad</th>
					<th>Grado</th>
					<th>Padres de Familia</th>
					<th>Encargado</th>
					<th>Opciones</th>
				</thead>

				@foreach($estudiantes as $est)
					<tr>
						<td>{{$est->nombre.'  '.$est->apellido}}</td>
						<td>{{$est->fecha_nac}}</td>
						<td>{{\Carbon\Carbon::parse($est->fecha_nac)->age}}</td>
						<td>{{$est->nombre_grado}}</td>
						<td>{{$est->nombre_padre.' '.$est->apellido_padre.' - '.$est->nombre_madre.' '.$est->apellido_madre}}</td>
						<td>{{$est->nombre_encargado.' '.$est->apellidos_encargado}}</td>
						<td>
							<a href="{{URL::action('EstudianteController@edit',$est->idEstudiante)}}">
								<button class="btn btn-info">Editar</button>
							</a>

							<a href="" data-target="#modal-delete-{{$est->idEstudiante}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('estudiantes.alumnos.modal')
				@endforeach
			</table>
		</div>
		{{$estudiantes->render()}}
	</div>
</div>
@endsection
