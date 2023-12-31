<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>MyJobTool|{{ $title }}</title>
<!-- Bootstrap -->
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<header>
	<nav class="navbar navbar-expand-md bg-primary-subtle">
		<div class="container-fluid">
			<h1 class="mx-3">
				<a class="navbar-brand" href="{{ route('post.index') }}">MyJobTool</a>
			</h1>
			<button type="button" class="navbar-toggler"
				data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false"
				aria-label="ナビゲーションの切替">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">

				<ul class="navbar-nav me-auto my-2 my-xl-0  navbar-nav-scroll"
					style="--bs-scroll-height: 100px;">
					@can('create', App\Models\Post::class)
					<li class="nav-item"><a class="nav-link"
						href="{{ route('post.create') }}">{{__('Create Article')}}</a></li>
					@endcan
					@can('viewAny', App\Models\Tag::class)
					<li class="nav-item"><a class="nav-link"
						href="{{ route('tag.index') }}">タグ編集</a></li>
					@endcan
					@can('viewAny', App\Models\Category::class)
					<li class="nav-item"><a class="nav-link"
						href="{{ route('category.index') }}">カテゴリ編集</a></li>
					@endcan
				</ul>
				<div class="d-flex">
					@guest 
					<a href="{{ route('register') }}">
						<button	class="btn btn-outline-secondary m-1">{{__('Register')}}</button>
					</a>
					<a href="{{ route('login') }}">
						<button	class="btn btn-outline-secondary m-1">{{__('Login')}}</button>
					</a>
					@else
					<span class="d-flex align-items-center"> </span>
						<button type="button" id="loginBtn"
							class="btn btn-outline-secondary my-1 mx-3"
							onclick="logoutBtnClick()">{{__('Logout')}}</button>
					@endguest
				</div>
			</div>
			<!-- /.navbar-collapse -->
			<form action="{{ route('logout') }}" method="POST" id="logoutForm"
				class="d-none">@csrf</form>
		</div>
		<!-- /.container-fluid -->
	</nav>
</header>
<body>
	<div class="container-fluid">
		@if (isset($header))
		<div class="container-fluid">
			<div class="row">
				<div class="col mt-4">
					<div class="container my-3">
						<div class="d-flex justify-content-center">
							<div class="col col-lg-8">
								<div class="container border p-0">
									<div class="border-bottom">
										<h5 class="m-3">{{ $header }}</h5>
									</div>
									{{ $slot }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@else
		<div class="row">
			<div class="col">
				<div class="container my-3">
					<div class="container">
						<div class="row">
							@isset ($breadcrumb) {{ $breadcrumb }} @endif
							<div class="col-auto d-flex align-items-center">
								@if (isset($index))
								<h5 class="my-1">{{ $index }}</h5>
								@else
								<h5 class="my-1">こんにちは、{{ Auth::user()->name ?? 'ゲスト' }}さん</h5>
								@endif
							</div>
							<div class="col text-end ms-auto d-block d-md-none">
								<button type="button" class="btn btn-outline-secondary my-1"
									data-bs-toggle="offcanvas" data-bs-target="#searchOffcanvas"
									aria-expanded="false">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
										fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
									<path
											d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
									</svg>
								</button>
							</div>
						</div>
					</div>
					{{ $slot }}
				</div>
			</div>
			<div class="col-3 d-none d-md-block">@yield('sidebar')</div>
		</div>
	</div>
	@endif
	<div class="offcanvas offcanvas-start" tabindex="-1"
		id="searchOffcanvas">
		<div class="offcanvas-header">
			<h5 class="offcanvas-title" id="searchOffcanvasLabel">検索</h5>
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas"
				aria-label="閉じる"></button>
		</div>
		<div class="offcanvas-body">@yield('sidebar')</div>
	</div>
	<script>
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