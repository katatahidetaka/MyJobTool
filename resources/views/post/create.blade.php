<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name=”viewport” content=”width=device-width,initial-scale=1”>

<title>MyJobTool|記事の作成</title>
<!-- Bootstrap -->
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

	<form method="post" action="{{ route('post.store') }}"
		class="container border rounded mt-5">
		@csrf
		<div class="row my-3">
			<label class="col-sm-2 col-form-label">タイトル</label>
			<div class="col-sm-10">
				<input type="text" id="title" name="title" class="form-control">
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-form-label">タグ</label><!-- col-form-labelでlabelを垂直にきれいに並べることができる -->
			<div class="col-sm-10">
				<div class="row">
					<div class="form-check col-2">
						<input class="form-check-input" type="checkbox" name="tags[]" value="1" id="radios1">
						<label class="form-check-label" for="radios1">タグ1</label>
					</div>
					<div class="form-check col-2">
						<input class="form-check-input" type="checkbox" name="tags[]" value="2" id="radios2">
						<label class="form-check-label" for="radios2">タグ2</label>
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-3">
		<div class="col">
			<textarea class="form-control" id="content" name="content" placeholder="内容" style="height: 100px"></textarea>
		</div>
		</div>
		<input type="submit" value="OK">
	</form>

</body>
</html>