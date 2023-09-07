<x-app>
	<x-slot name="title">MyJobTool|記事一覧</x-slot>
	<div class="container">
	@if(session('message'))
		<div class="row my-2">
			<div class="alert alert-primary" role="alert">
				<p>{{ session('message') }}</p>
			</div>
		</div>
	@endif
	@foreach($posts as $post)
	<div class="container border rounded my-1">
		<div class="row bg-info-subtle">
			<div class="col">
				<div class="d-flex align-items-center my-3">
					<h6><a href="{{ route('post.show',$post) }}">{{ $post->title }}</a></h6>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="d-flex align-items-center my-2">
					{!! nl2br(e($post->content)) !!}
				</div>
			</div>
		</div>
		<!-- タグ指定していないときの$post->tagsもis_null,emptyに引っかからないので
		何かしら値が入っているらしいので、tagsの配列の先頭を持ってきて有無を判定する -->
		@if(!empty($post->tags[0]))
		<div class="row">
			<div class="col border-top">
				<div class= "col mt-2 text-end">
				@foreach($post->tags as $tag)
					<a href=""><span>{{ $tag->name }}</span></a>
				@endforeach
				</div>
			</div>
		</div>
		@endif
	</div>
	@endforeach
	</div>
</x-app>