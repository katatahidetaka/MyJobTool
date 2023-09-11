<x-app>
	<x-slot name="title">タグ編集</x-slot>
	<x-message :message="session('message')"/>
	@include('common.error')
	<div class="border rounded p-3 mb-3 container">
		<div class="row">
			<div class="m-1">タグの新規登録</div>
		</div>
		<div class="row">
			<form method="post" action="{{ route('tag.store') }}">
			@csrf
				<select name="categoryId" style="vertical-align : middle;">
					@foreach ($categoriesArray as $ctgId => $ctgName)
					<option value="{{ $ctgId }}" label="{{ $ctgName }}"></option>
					@endforeach
				</select>
				<input type="text" name="tagName" id="tagName" placeholder="タグ名を記入(10字以内)" style="vertical-align : middle;"/>
				<button type="submit" class="btn btn-primary btn-sm" style="vertical-align : middle;">登録</button>
			</form>
		</div>
	</div>
	<div class="border rounded p-3 container">
		<div class="row">
			<div class="m-1">タグの編集(タグは1つずつ編集してください)</div>
		</div>
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
						<input type="hidden" name="categoryId" value="{{ $categoryId }}"></input>
						<input type="hidden" name="tagId" value="{{ $tagId }}"></input>
						<input type="text" name="tagName" value="{{ $tag }}" style="vertical-align : top;"></input>
						<button type="submit" class="btn btn-outline-info btn-sm" style="vertical-align : top;">編集</button>
					</form>
					<form method="post" action="{{ route('tag.destroy', $tagId) }}" onclick="return confirm('削除してもよろしいですか？');">
					@csrf
					@method('delete')
						<input type="hidden" name="tagName" value="{{ $tag }}"></input>
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