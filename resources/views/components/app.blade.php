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
			<button type="button" class="navbar-toggler"
				data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false"
				aria-label="ナビゲーションの切替">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<h1><a class="navbar-brand" href="{{ route('home') }}">MyJobTool</a></h1>
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link" href="{{ route('post.create') }}">記事新規作成</a></li>
					<li class="nav-item"><a class="nav-link" href="{{ route('post.index') }}">記事一覧</a></li>
					<li class="nav-item"><a class="nav-link" href="{{ route('tag.index') }}">タグ編集</a></li>
					<li class="nav-item"><a class="nav-link" href="{{ route('category.index') }}">カテゴリ編集</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
			<div class="d-flex">
				@guest
				<button type="button" id="registerBtn" class="btn btn-outline-secondary m-1" onclick="registerBtnClick()">{{__('Register')}}</button>
				<button type="button" id="loginBtn" class="btn btn-outline-secondary m-1" onclick="loginBtnClick()">{{__('Login')}}</button>
				@else
				<button type="button" id="loginBtn" class="btn btn-outline-secondary m-1" onclick="logoutBtnClick()">{{__('Logout')}}</button>
				@endguest
			</div>
			<form action="{{ route('register') }}" method="GET" id="registerForm" class="d-none">
			@csrf
			</form>
			<form action="{{ route('login') }}" method="GET" id="loginForm" class="d-none">
			@csrf
			</form>
			<form action="{{ route('logout') }}" method="POST" id="logoutForm" class="d-none">
			@csrf
			</form>
		</div><!-- /.container-fluid -->
	</nav>
</header>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="container my-3">
				<h3>{{ $title }}</h3>
					{{ $slot }}
			</div>
		</div>
		@yield('sidebar')
	</div>
</div>
<script>
	//新規登録ボタン押下時処理
	function registerBtnClick(){
		document.getElementById('registerForm').submit();
	}
	//ログインボタン押下時処理
	function loginBtnClick(){
		document.getElementById('loginForm').submit();
	}
	//ログアウトボタン押下時処理
	function logoutBtnClick(){
		document.getElementById('logoutForm').submit();
	}
</script>
</body>
<footer class="fixed-bottom">
	<div class="conteiner-fluid bg-secondary-subtle">
		<div class="text-center">
			<div>フッターです。ここに著作権表示でも追加</div>	
		</div>
	</div>
</footer>
</html>