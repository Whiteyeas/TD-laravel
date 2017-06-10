	<table class="table">
		<tr>
			<th>@lang('Titre')</th>
			<th>@lang('Description')</th>
			<th>@lang('Date')</th>
		</tr>
		<tr>
			{{ Form::open() }} 
			<td>{{ Form::text("title") }}</td>
			<td>{{ Form::text("description") }}</td>
			<td>{{ Form::text("date") }}</td>
			<td>{{ Form::submit('Modifier') }}</td>
			<td>{{ Form::close() }}
		</tr>
	</table>



	