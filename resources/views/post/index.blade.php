<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name=”viewport” content=”width=device-width,initial-scale=1”>

<title>MyJobTool|記事一覧</title>
<!-- Bootstrap -->
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	@if(session('message'))
		<div>{{ session('message') }}</div>
	@endif
	@foreach($posts as $post)
	<div class="container border rounded my-1">
		<div class="row">
			<div class="col bg-info-subtle">
				<div class="d-flex align-items-center my-2">
					<h6>{{ $post->title }}</h6>
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
		@if(isset($post->tags))
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
</body>
</html>