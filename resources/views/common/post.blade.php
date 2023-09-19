<div class="container">
<x-message :message="session('message')"/>
	@foreach($posts as $post)
	<div class="container border rounded my-1">
		<div class="row bg-info-subtle">
			<div class="col-7 d-flex align-items-center my-3">
					<h6><a href="{{ route('post.show',$post) }}">{{ $post->title }}</a></h6>
			</div>
			<div class="col-5 d-flex my-1">
				<div class="text-end d-flex align-items-end">
				<span>投稿日：{{ $post->created_at->format('Y/m/d') }}　最終更新日：{{ $post->updated_at->format('Y/m/d') }}</span>
				</div>
			</div>			
		</div>
		<div class="row">
			<div class="col">
				<div class="d-flex align-items-center my-2">
					<p class="text-truncate">{!! nl2br(e($post->content)) !!}</p>
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
					<a href="{{ route('searchByTags', $tag->id) }}"><span>{{ $tag->name }}</span></a>
				@endforeach
				</div>
			</div>
		</div>
		@endif
	</div>
	@endforeach
</div>