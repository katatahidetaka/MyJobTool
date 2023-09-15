<x-app>
	<x-slot name="title">カテゴリ編集</x-slot>
	<x-message :message="session('message')"/>
	@include('common.error')
	<div class="border rounded p-3 mb-3 container">
		<div class="row">
			<div class="m-1">カテゴリの新規登録</div>
		</div>
		<div class="row">
			<form method="post" action="{{ route('category.store') }}">
			@csrf
				<input type="text" name="categoryName" id="categoryName" placeholder="カテゴリ名を記入(10字以内)"
				maxlength="10" style="vertical-align : middle;"/>
				<button type="submit" class="btn btn-primary btn-sm" style="vertical-align : middle;">登録</button>
			</form>
		</div>
	</div>
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
						<form method="post" action="{{ route('category.destroy', $categoryId) }}" class="my-2"
						onclick="return confirm('カテゴリに分類されているタグも消えてしまいます。削除してもよろしいですか？');">
						@csrf
						@method('delete')
							<input type="submit" class="btn btn-danger btn-sm" value="削除">
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