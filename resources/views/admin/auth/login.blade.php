@extends('layouts.admin')

@section('admin_content')

    <div class="auth-main v1">
        <div class="bg-overlay bg-white"></div>
        <div class="auth-wrapper">
            <div class="auth-form"><a href="{{url('/')}}" class="d-block mt-5"><img
                        src="{{asset('/')}}admin/assets/images/logo-white.svg" alt="img"></a>
                <div class="card mb-5 mt-3">
                    <div class="card-header bg-dark">
                        <h4 class="text-center text-white f-w-500 mb-0">Admin Login Panel</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="floatingInput" placeholder="Email Address" autofocus>
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password" placeholder="Password">
                                    <span class="input-group-text" onclick="togglePasswordVisibility('#password')"><i class="fas fa-eye"></i></span>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                            </div>
                        
                            <div class="d-flex mt-1 justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input input-primary" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-muted" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>

                        <div class="card-footer border-top">
                            <div class="d-flex justify-content-between align-items-end">
                                <div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="link-primary">{{ __('I forgot my password?') }}</a>
                                    @endif
                                </div>
                                <a href="#"><img
                                        src="{{asset('/')}}admin/assets/images/logo-dark-sm.svg"
                                        alt="img"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- Script to toggle password visibility --}}
<script>
    function togglePasswordVisibility(fieldId) {
        const field = document.querySelector(fieldId);
        if (field.type === "password") {
            field.type = "text";
        } else {
            field.type = "password";
        }
    }
</script>
@endsection
