<x-app>
	<x-slot name="title">キーワード『{{ $inputKeyword }}』</x-slot>
	<x-slot name="breadcrumb">
		<nav aria-label="breadcrumb">
  			<ol class="breadcrumb">
    			<li class="breadcrumb-item"><a href="{{ route('post.index') }}">{{__('Article List')}}</a></li>
    			<li class="breadcrumb-item active" aria-current="page">{{ $inputKeyword }}</li>
  			</ol>
		</nav>
	</x-slot>
	<x-slot name="index">キーワード『{{ $inputKeyword }}』</x-slot>
	@include('common.post')
	@section('sidebar')
		@include('common.sidebar')
	@endsection
</x-app>