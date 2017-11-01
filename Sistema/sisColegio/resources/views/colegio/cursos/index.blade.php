@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Cursos<a href="cursos/create"><button class="btn btn-success">Nuevo</button></h3></a>
		@include('colegio.cursos.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Curso</th>
					<th>Opciones</th>
				</thead>

				@foreach($cursos as $cur)
					<tr>
						<td>{{$cur->nombre_curso}}</td>
						<td>
							<a href="{{URL::action('CursoController@edit', $cur->idCurso)}}">
								<button class="btn btn-info">Editar</button>
							</a>

							<a href="" data-target="#modal-delete-{{$cur->idCurso}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('colegio.cursos.modal')
				@endforeach
			</table>
		</div>
		{{$cursos->render()}}
	</div>
</div>
@endsection
