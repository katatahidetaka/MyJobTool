<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name=”viewport” content=”width=device-width,initial-scale=1”>

<title>MyJobTool|{{ $title }}</title>
<!-- Bootstrap -->
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<header>
	<nav class="navbar navbar-expand-sm bg-primary-subtle">
		<div class="container-fluid">
			<h1><a class="navbar-brand" href="{{ route('home') }}">MyJobTool</a></h1>
			<button type="button" class="navbar-toggler"
				data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false"
				aria-label="ナビゲーションの切替">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link" href="{{ route('post.create') }}">記事新規作成</a></li>
					<li class="nav-item"><a class="nav-link" href="{{ route('post.index') }}">記事一覧</a></li>
					<li class="nav-item"><a class="nav-link" href="{{ route('tag.index') }}">タグ編集</a></li>
					<li class="nav-item"><a class="nav-link" href="{{ route('category.index') }}">カテゴリ編集</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
</header>
<body>
<div class="container my-3">
	<h1>{{ $title }}</h1>
	{{ $slot }}
</div>
</body>
<footer class="fixed-bottom">
	<div class="conteiner-fluid bg-secondary-subtle">
		<div class="text-center">
			<div>フッターです。ここに著作権表示でも追加</div>	
		</div>
	</div>
</footer>
</html>