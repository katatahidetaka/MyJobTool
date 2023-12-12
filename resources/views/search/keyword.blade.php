<x-app>
	<x-slot name="title">キーワード『{{ $inputKeyword }}』</x-slot>
	<x-slot name="index">キーワード『{{ $inputKeyword }}』</x-slot>
	@include('common.post')
	@section('sidebar')
		@include('common.sidebar')
	@endsection
</x-app>