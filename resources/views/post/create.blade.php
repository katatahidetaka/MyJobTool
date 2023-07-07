<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name=”viewport” content=”width=device-width,initial-scale=1”>

<title>MyJobTool|記事の作成</title>
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<form method="post" action="{{ route('post.store') }}">
		@csrf
		<label>タイトル</label>
		<input type="text" id="title" name="title">
		<label>タグ</label>
		<input type="checkbox" name="tags[]" value="1">タグ1
		<input type="checkbox" name="tags[]" value="2">タグ2
		<label>内容</label>
		<textarea id="content" name="content"></textarea>
		<input type="submit" value="OK">
	</form>
</body>
</html>