@if(session('message'))
	<div class="alert alert-primary" role="alert">
		<p>{{ session('message') }}</p>
	</div>

@endif
@if(session('errormessage'))
	<div class="alert alert-danger" role="alert">
		<p>{{ session('errormessage') }}</p>
	</div>

@endif