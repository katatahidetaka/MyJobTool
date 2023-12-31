<x-app>
	<x-slot name="title">{{__('Edit Articles')}}</x-slot>
	<x-slot name="breadcrumb">
		<nav aria-label="breadcrumb">
  			<ol class="breadcrumb">
    			<li class="breadcrumb-item"><a href="{{ route('post.index') }}">{{__('Article List')}}</a></li>
    			<li class="breadcrumb-item"><a href="{{ route('post.show',$post) }}">{{ $post->title }}</a></li>
    			<li class="breadcrumb-item active" aria-current="page">{{__('Edit Articles')}}</li>
  			</ol>
		</nav>
	</x-slot>
	<form method="post" action="{{ route('post.update',$post) }}"
		class="container border rounded mt-5">
		@csrf
		@method('put')
		@include('common.error')
		<div class="row my-3">
			<label class="col-sm-2 col-form-label">タイトル</label>
			<div class="col-sm-10">
				<input type="text" id="title" name="title" placeholder="50字以内" class="form-control" maxlength="50" value="{{ old('title',$post->title) }}">
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-form-label">タグ</label><!-- col-form-labelでlabelを垂直にきれいに並べることができる -->
			<div class="col-sm-10">
				<div class="row">
					@foreach ($tagList as $tagId => $tagName)
					<div class="form-check col-2">
					@if(in_array($tagId, $tagArray))
						<input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tagId }}" id="radios{{ $tagId }}" checked>
					@else
						<input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tagId }}" id="radios{{ $tagId }}">
					@endif
						<label class="form-check-label" for="radios{{ $tagId }}">{{ $tagName }}</label>
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