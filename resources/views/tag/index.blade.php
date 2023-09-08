<x-app>
	<x-slot name="title">タグ編集</x-slot>
	@if(session('message'))
	<div class="alert alert-primary" role="alert">
		<p>{{ session('message') }}</p>
	</div>
	@endif
	@foreach($categoryList as $category)
		@foreach($category as $categoryId => $categories)
			@foreach($categories as $categoryName => $tagList)
				<div>{{ $categoryName }}</div>
				@foreach($tagList as $tagId => $tag)
				<form method="post" action="{{ route('tag.update', $tagId) }}">
				@csrf
				@method('put')
					<input type="text" name="tagName" id="{{ $tagId }}" value="{{ $tag }}"></input>
					<button type="submit">編集</button>
				</form>
				@endforeach
			@endforeach
		@endforeach
	@endforeach

</x-app>