<x-app>
	<x-slot name="title">ログイン</x-slot>
	<div class="d-flex justify-content-center">
		<div class="col-md-8">
			<div class="container border p-3">
			@include('common.error')
				<form method="post" action="{{ route('login') }}">
				@csrf
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
					<div class="row mb-3">
                    	<div class="col-md-6 offset-md-4">
                          	<div class="form-check">
                              	<input class="form-check-input" type="checkbox" name="remember" id="remember" {{  old('remember') ? 'checked' : ''  }}>
                             	<label class="form-check-label" for="remember">
                                	{{ __('Remember Me') }}
                               	</label>
                           	</div>
                       	</div>
                    </div>
					<div class="row d-flex justify-content-center">
							<button type="submit" class="btn btn-outline-primary col-sm-2">{{__('login')}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-app>
