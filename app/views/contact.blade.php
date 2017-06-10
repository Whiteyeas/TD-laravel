{{ Form::open() }}
{{ Form::text("firstname") }}
{{ Form::text("lastname") }}
{{ Form::text("subject") }}
{{ Form::textarea("message") }}
{{ Form::submit('Click Me!') }}

{{ Form::close() }}