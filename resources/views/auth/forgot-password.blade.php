<x-app>
<x-slot name="title">{{__('Reset Password')}}</x-slot>
<x-slot name="header">{{__('Reset Password')}}</x-slot>
@include('common.error')
<form method="post" action="{{ route('password.email') }}" class="p-4">
	@csrf
	<div class="row m-3 d-flex justify-content-center">
		<p>{!! nl2br(e(__('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.'))) !!}</p>
	</div>
	<div class="row mb-3 d-flex justify-content-center">
		<label for="email" class="col-sm-3 col-form-label">{{__('Email Address')}}</label>
		<div class="col-sm-6">
			<input type="email" class="form-control" id="email" name="email"
				value="{{ old('email') }}">
		</div>
	</div>
	<!-- row -->
	@include('common.status')
	<div class="row d-flex justify-content-center">
		<button type="submit" class="btn btn-outline-primary col-auto">{{__('Send Password Reset Link')}}</button>
	</div>
</form>
</x-app>