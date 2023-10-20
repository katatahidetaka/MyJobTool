<x-app>
	<x-slot name="title">記事詳細</x-slot>
	<div class="container border rounded my-3 shadow">
	@if(session('message'))
		<div class="row my-2">
			<div class="alert alert-primary" role="alert">
				<p>{{ session('message') }}</p>
			</div>
		</div>
	@endif
		<div class="row">
			<h2 class="col m-3">{{ $post->title }}</h2>
			<span class="text-end">投稿者： {{$post->user->name}}</span>
		</div>
		<div class="row text-end border-top border-3">
			<span class="col">投稿日：{{ $post->created_at->format('Y/m/d') }}　最終更新日：{{ $post->updated_at->format('Y/m/d') }}</span>
		</div>
		<div class="row">
			<div class="col">
				@foreach($post->tags as $tag)
					<a href="{{ route('searchByTags', $tag->id) }}"><span>{{ $tag->name }}</span></a>
				@endforeach
				@if(!isset($tag))
					<span class="text-danger">この記事には、タグが設定されていません。</span>
				@endif
			</div>
		</div>
		<div class="container border mb-3">
			<div class="col m-3">
				{!! nl2br(e($post->content)) !!}
			</div>
		</div>
		<div class="row">
			<div class="col my-2">
					<a href="{{ route('post.edit',$post) }}"><button class="btn btn-primary">編集する</button></a>
					<button class="btn btn-danger" onclick="destroyBtn()">削除する</button>	
			</div>
		</div>
	</div>
	<form method="post" action="{{ route('post.destroy',$post) }}" id="destroyForm">
	@csrf
	@method('delete')
	</form>
	<script>
		function destroyBtn(){
			let result = window.confirm('本当に削除してもよろしいですか？');
			if(result){
				document.getElementById('destroyForm').submit();
			}
		}
	</script>
</x-app>