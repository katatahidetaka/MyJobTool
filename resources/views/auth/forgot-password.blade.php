<x-app>
	<x-slot name="title">パスワードリセット</x-slot>
	<div class="d-flex justify-content-center">
		<div class="col-md-8">
			<div class="container border p-3">
			@include('common.error')
				<form method="post" action="{{ route('password.email') }}">
				@csrf
					<div class="row m-3 d-flex justify-content-center">
						<p>{!! nl2br(e(__('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.'))) !!}</p>
					</div>
					<div class="row mb-3 d-flex justify-content-center">
						<label for="email" class="col-sm-3 col-form-label">{{__('Email Address')}}</label>
						<div class="col-sm-6">
							<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
						</div>
					</div> <!-- row -->
					@include('common.status')
					<div class="row d-flex justify-content-center">
							<button type="submit" class="btn btn-outline-primary col-auto">{{__('Send Password Reset Link')}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-app>