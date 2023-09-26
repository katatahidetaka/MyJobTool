<x-app>
	<x-slot name="title">記事一覧：『{{ $tagName }}』</x-slot>
	@include('common.post')
	@section('sidebar')
		@include('common.sidebar')
	@endsection
</x-app>