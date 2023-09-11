<x-app>
	<x-slot name="title">記事新規作成</x-slot>
	@include('common.error')
	<form method="post" action="{{ route('post.store') }}"
		class="container border rounded mt-5">
		@csrf
		<div class="row my-3">
			<label class="col-sm-2 col-form-label">タイトル</label>
			<div class="col-sm-10">
				<input type="text" id="title" name="title" placeholder="50字以内" class="form-control" maxlength="50">
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-form-label">タグ</label><!-- col-form-labelでlabelを垂直にきれいに並べることができる -->
			<div class="col-sm-10">
				<div class="row">
					@foreach ($tagList as $tag)
					<div class="form-check col-2">
						<input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="radios{{ $tag->id }}">
						<label class="form-check-label" for="radios{{ $tag->id }}">{{ $tag->name }}</label>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col">
				<textarea class="form-control" id="content" name="content" placeholder="内容(200字以内)" maxlength="200" style="height: 100px"></textarea>
			</div>
		</div>
		<div class="col d-md-flex justify-content-md-end mb-3">
			<button type="submit" class="btn btn-primary">POST</button>
		</div>
	</form>
</x-app>