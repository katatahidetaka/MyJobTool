<x-auth> <x-slot name="title">{{ __('Reset Password') }}</x-slot>
@include('common.error')
<form method="post" action="{{ route('password.update') }}" class="p-4">
	@csrf
	<div class="row mb-3 d-flex justify-content-center">
		<label for="email" class="col-md-3 col-form-label">{{__('Email Address')}}</label>
		<div class="col-md-6">
			<input type="email" class="form-control" id="email" name="email"
				value="{{ old('email') }}">
		</div>
	</div>
	<!-- row -->
	<div class="row mb-3 d-flex justify-content-center">
		<label for="password" class="col-md-3 col-form-label">{{__('Password')}}</label>
		<div class="col-md-6">
			<input type="password" class="form-control" id="password"
				name="password">
		</div>
	</div>
	<!-- row -->
	<div class="row mb-3 d-flex justify-content-center">
		<label for="password_confirmation" class="col-md-3 col-form-label">{{__('Confirm Password')}}</label>
		<div class="col-md-6">
			<input type="password" class="form-control"
				id="password_confirmation" name="password_confirmation">
		</div>
	</div>
	<!-- row -->
	<!-- password reset Token -->
	<input type="hidden" name="token"
		value="{{ request()->route('token') }}">
	<div class="row d-flex justify-content-center">
		<button type="submit" class="btn btn-outline-primary col-auto">{{__('Reset Password')}}</button>
	</div>
</form>
</x-auth>