<x-app>
	<x-slot name="title">MyJobTool|記事の編集</x-slot>
	<form method="post" action="{{ route('post.update',$post) }}"
		class="container border rounded mt-5">
		@csrf
		@method('put')
		<div class="row m-2">
			@if(!empty($errors->all()))
			<div class="alert alert-danger" role="alert">
			@foreach($errors->all() as $message)
				<p>{{ $message }}</p>
			@endforeach
			</div>
			@endif
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-form-label">タイトル</label>
			<div class="col-sm-10">
				<input type="text" id="title" name="title" placeholder="50字以内" class="form-control" maxlength="50" value="{{ old('title',$post->title) }}">
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
				<textarea class="form-control" id="content" name="content" placeholder="内容(200字以内)" maxlength="200" style="height: 300px">{{ old( 'content',$post->content ) }}</textarea>
			</div>
		</div>
		<div class="col d-md-flex justify-content-md-end mb-3">
			<button type="submit" class="btn btn-primary">編集</button>
		</div>
	</form>
</x-app>