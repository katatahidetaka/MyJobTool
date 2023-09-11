<x-app>
	<x-slot name="title">タグ編集</x-slot>
	@if(session('message'))
	<div class="alert alert-primary" role="alert">
		<p>{{ session('message') }}</p>
	</div>
	@endif
	<!-- ここに新規タグ登録機能を追加 -->
	<div class="border rounded p-3 container">
	@foreach($categoryList as $category)
		@foreach($category as $categoryId => $categories)
			@foreach($categories as $categoryName => $tagList)
			<div class="row">
				<div class="bg-secondary-subtle col-12">{{ $categoryName }}</div>
			</div>
			<div class="row-md-4">
				@foreach($tagList as $tagId => $tag)
				<div class="m-2 col-xs-12" style="display: inline-flex">
				<form method="post" action="{{ route('tag.update', $tagId) }}" class="mx-1">
				@csrf
				@method('put')
					<input type="text" name="tagName" id="edit{{ $tagId }}" value="{{ $tag }}" style="vertical-align : top;"></input>
					<button type="submit" class="btn btn-outline-info btn-sm" style="vertical-align : top;">編集</button>
				</form>
				<form method="post" action="{{ route('tag.destroy', $tagId) }}" onclick="return confirm('削除してもよろしいですか？');">
				@csrf
				@method('delete')
					<input type="hidden" name="tagName" id="delete{{ $tagId }}" value="{{ $tag }}"></input>
					<button type="submit" class="btn btn-outline-danger btn-sm">削除</button>
				</form>
				</div>
				@endforeach
			</div>
			@endforeach
		@endforeach
	@endforeach
	</div>
</x-app>