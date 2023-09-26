<div class="col-3">
<h6 class="mt-3">タグで検索</h6>
	<div class="container bg-white px-3 mb-3">
		@foreach($categoryList as $category)
			@foreach($category as $categoryId => $categories)
				@foreach($categories as $categoryName => $tagList)
				<div class="row">
					<div class="bg-secondary-subtle col-12">{{ $categoryName }}</div>
				</div>
				<div class="row-md-4">
					@foreach($tagList as $tagId => $tag)
						<a href="{{ route('searchByTags', $tagId) }}"><span>{{ $tag }}</span></a>
					@endforeach
				</div>
				@endforeach
			@endforeach
		@endforeach
	</div>
</div>