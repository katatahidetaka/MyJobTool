<x-app>
	<x-slot name="title">記事一覧</x-slot>
	@include('common.post')
	@section('sidebar')
		@include('common.sidebar')
	@endsection
</x-app>