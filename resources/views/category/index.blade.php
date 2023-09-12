<x-app>
	<x-slot name="title">カテゴリ編集</x-slot>
	<x-message :message="session('message')"/>
	@include('common.error')
<!-- 	ここにカテゴリーの新規登録機能を追加 -->
	<div class="border rounded p-3 container">
		<div class="row">
			<div class="m-1">カテゴリの編集(カテゴリは1つずつ編集してください)</div>
		</div>
		@foreach($categoryList as $category)
			@foreach($category as $categoryId => $categories)
				@foreach($categories as $categoryName => $tagList)
				<div class="row">
					<div class="bg-secondary-subtle col-12" style="display: inline-flex">
						<form method="post" action="{{ route('category.update', $categoryId) }}" class="m-2">
						@csrf
						@method('put')
							<input type="hidden" name="categoryId" value="{{ $categoryId }}">
							<input type="text" name="categoryName" value="{{ $categoryName }}"
							 style="vertical-align : top;" maxlength="10">
							<input type="submit" value="編集" class="btn btn-info btn-sm"
							 style="vertical-align : top;">
						</form>
					</div>
				</div>
				<div class="row">
					@foreach($tagList as $tagId => $tag)
					<div class="m-2 col-xs-12 col-md-2">
						{{ $tag }}
					</div>
					@endforeach
				</div>
				@endforeach
			@endforeach
		@endforeach
	</div>
</x-app>