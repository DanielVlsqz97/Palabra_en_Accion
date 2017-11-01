@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Telefonos Docentes <a href="telefonos_docentes/create"><button class="btn btn-success">Nuevo</button></h3></a>
		@include('telefonos.telefonos_docentes.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre del Docente</th>
					<th>Numero</th>
					<th>Tipo de Telefono</th>
					<th>Opciones</th>
				</thead>

				@foreach($telefonos as $tel)
					<tr>
						<td>{{$tel->nombres.' '.$tel->apellidos}}</td>
						<td>{{$tel->numero}}</td>
						<td>{{$tel->telefono}}</td>
						<td>
							<a href="{{URL::action('TelefonosDocentesController@edit', $tel->idTelefono)}}">
								<button class="btn btn-info">Editar</button>
							</a>

							<a href="" data-target="#modal-delete-{{$tel->idTelefono}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('telefonos.telefonos_docentes.modal')
				@endforeach
			</table>
		</div>
		{{$telefonos->render()}}
	</div>
</div>
@endsection
