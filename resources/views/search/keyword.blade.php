<x-app>
	<x-slot name="title">『{{ $inputKeyword }}』の検索結果</x-slot>
	<h4>『{{ $inputKeyword }}』の検索結果</h4>
	@include('common.post')
	@section('sidebar')
		@include('common.sidebar')
	@endsection
</x-app>