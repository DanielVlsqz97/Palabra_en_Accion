@extends('layouts.admin')
@section('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Encargados de Estudiantes<a href="encargado/create"><button class="btn btn-success">Nuevo</button></h3></a>
		@include('responsables.encargado.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Domicilio</th>
					<th>Fecha de Nacimiento</th>
					<th>Edad</th>
					<th>Trabajo</th>
					<th>Estado Civil</th>
					<th>Opciones</th>
				</thead>

				@foreach($encargados as $enc)
					<tr>
						<td>{{$enc->nombre_encargado.'  '.$enc->apellidos_encargado}}</td>
						<td>{{$enc->domicilio}}</td>
						<td>{{$enc->fecha_nac}}</td>
						<td>{{\Carbon\Carbon::parse($enc->fecha_nac)->age}}</td>
						<td>{{$enc->trabajo}}</td>
						<td>{{$enc->estado_civil}}</td>
						<td>
							<a href="{{URL::action('EncargadoController@edit',$enc->idEncargado)}}">
								<button class="btn btn-info">Editar</button>
							</a>

							<a href="" data-target="#modal-delete-{{$enc->idEncargado}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('responsables.encargado.modal')
				@endforeach
			</table>
		</div>
		{{$encargados->render()}}
	</div>
</div>
@endsection
