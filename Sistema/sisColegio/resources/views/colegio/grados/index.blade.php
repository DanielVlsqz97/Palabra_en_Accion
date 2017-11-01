@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Grados<a href="grados/create"><button class="btn btn-success">Nuevo</button></h3></a>
		@include('colegio.grados.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Seccion</th>
					<th>Nivel Academico</th>
					<th>Jornada</th>
					<th>Opciones</th>
				</thead>

				@foreach($grados as $gra)
					<tr>
						<td>{{$gra->nombre_grado}}</td>
						<td>{{$gra->seccion}}</td>
						<td>{{$gra->nombre_nivel}}</td>
						<td>{{$gra->nombre_jornada}}</td>
						<td>
							<a href="{{URL::action('GradoController@edit', $gra->idGrado)}}">
								<button class="btn btn-info">Editar</button>
							</a>

							<a href="" data-target="#modal-delete-{{$gra->idGrado}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('colegio.grados.modal')
				@endforeach
			</table>
		</div>
		{{$grados->render()}}
	</div>
</div>
@endsection
