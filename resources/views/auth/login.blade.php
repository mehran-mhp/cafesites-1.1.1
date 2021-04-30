@extends('layouts.master')

@section('content')
    <div class="row justify-content-md-center" dir="rtl">
        <div class="col-md-6 mt-5">
            <div class="toast p-4" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="./photos/login.jpg" width="200" class="rounded-circle m-auto shadow-sm" alt="login">
                </div>
                <div class="toast-body mt-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input id="email" type="email" name="email" class="form-control text-center @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="ایمیل">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" name="password" class="form-control text-center @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="رمز ورود">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-dark w-100" value="ورود">
                    </form>
                    <hr>
                    <div class="text-center">
                        <a href="#">آیا رمز ورود خود را فراموش کرده اید ؟</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
