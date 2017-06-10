@extends('AdminLTE.layout')
@section('page-title')
	@lang('tasks.list')
@stop
@section('optional-description')
	@lang('tasks.list-description')
@stop

@section('content')
	<table class="table">
		<tr>
			<th>@lang('Titre')</th>
			<th>@lang('Description')</th>
			<th>@lang('Date')</th>
			<th>modifier</th>
			<th>supprimer</th>
		</tr>
		@foreach($tasks as $task)
		<tr>
			<td>{{ $task->title }}</td>
			<td>{{ $task->description }}</td>
			<td>{{ $task->date}}</td>
			<td> <a href =/Todolist/todolist/modifier/{{ $task->id}}/> modifier </td>
			<td> <a href =/Todolist/todolist/supprimer/{{ $task->id}}/>supprimer</td>
		</tr>
		@endforeach
		<tr>
			{{ Form::open() }} 
			<td>{{ Form::text("title") }}</td>
			<td>{{ Form::text("description") }}</td>
			<td>{{ Form::text("date") }}</td>
			<td>{{ Form::submit('Ajouter') }}</td>
			<td>{{ Form::close() }}
		</tr>
	</table>
@stop