<x-auth> <x-slot name="title">{{__('Login')}}</x-slot>
@include('common.error')
@include('common.status')
<form method="post" action="{{ route('login') }}" class="p-4">
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
	<div class="row mb-3">
		<div class="col-md-6 offset-md-4">
			<div class="form-check">
				<input class="form-check-input" type="checkbox" name="remember"
					id="remember" @if(old('remember')) checked @endif> <label
					class="form-check-label" for="remember"> {{ __('Remember Me') }} </label>
			</div>
		</div>
	</div>
	<div class="row d-flex justify-content-center">
		<a class="btn btn-link" href="{{ route('password.request') }}"> {{__('Forgot Your Password?')}} </a>
		<button type="submit" class="btn btn-outline-primary col-4 col-sm-2">{{__('Login')}}</button>		
	</div>
</form>
</x-auth>