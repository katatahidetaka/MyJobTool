@if(session('message'))
	<div class="alert alert-primary" role="alert">
		<p>{{ session('message') }}</p>
	</div>

@endif