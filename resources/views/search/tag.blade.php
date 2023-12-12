<x-app>
	<x-slot name="title">タグ『{{ $tagName }}』</x-slot>
	<x-slot name="index">タグ『{{ $tagName }}』</x-slot>
	@include('common.post')
	@section('sidebar')
		@include('common.sidebar')
	@endsection
</x-app>