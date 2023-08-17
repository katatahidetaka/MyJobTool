<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name=”viewport” content=”width=device-width,initial-scale=1”>

<title>MyJobTool|記事詳細</title>
<!-- Bootstrap -->
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
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
		</div>
		<div class="row text-end border-top border-3">
			<span class="col">投稿日：{{ $post->created_at }}　最終更新日：{{ $post->updated_at }}</span>
		</div>
		<div class="row">
			<div class="col">
				@foreach($post->tags as $tag)
					<a href="{{ $tag->id }}"><span>{{ $tag->name }}</span></a>
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
					<button class="btn btn-danger" onclick="deleteBtn()">削除する</button>	
			</div>
		</div>
	</div>
	<form method="post" action="{{ route('post.delete',$post) }}" id="deleteForm">
	@csrf
	@method('delete')
	</form>
	<script>
		function deleteBtn(){
			let result = window.confirm('本当に削除してもよろしいですか？');
			if(result){
				document.getElementById('deleteForm').submit();
			}
		}
	</script>
</body>
</html>