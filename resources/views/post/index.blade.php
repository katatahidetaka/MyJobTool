<x-app>
	<x-slot name="title">{{__('Article List')}}</x-slot>
	@include('common.post')
	@section('sidebar')
		@include('common.sidebar')
	@endsection
</x-app>