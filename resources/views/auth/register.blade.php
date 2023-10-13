<x-app>
	<x-slot name="title">新規登録</x-slot>
	<div class="d-flex justify-content-center">
		<div class="col-md-8">
			<div class="container border p-3">
			@include('common.error')
				<form method="post" action="{{ route('register') }}">
				@csrf
					<div class="row mb-3 d-flex justify-content-center">
						<label for="name" class="col-sm-3 col-form-label">{{__('Name')}}</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
						</div>
					</div> <!-- row -->
					<div class="row mb-3 d-flex justify-content-center">
						<label for="email" class="col-sm-3 col-form-label">{{__('Email Address')}}</label>
						<div class="col-sm-6">
							<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
						</div>
					</div> <!-- row -->
					<div class="row mb-3 d-flex justify-content-center">
						<label for="password" class="col-sm-3 col-form-label">{{__('Password')}}</label>
						<div class="col-sm-6">
							<input type="password" class="form-control" id="password" name="password">
						</div>
					</div> <!-- row -->
					<div class="row mb-3 d-flex justify-content-center">
						<label for="password_confirmation" class="col-sm-3 col-form-label">{{__('Confirm Password')}}</label>
						<div class="col-sm-6">
							<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
						</div>
					</div> <!-- row -->
					<div class="row d-flex justify-content-center">
							<button type="submit" class="btn btn-outline-primary col-sm-2">{{__('Register')}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-app>