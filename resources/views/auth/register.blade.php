@extends('layouts.master')
@section('title-page')
    <title>صفحه عضویت</title>
@endsection
@section('content')
    <div class="row justify-content-md-center" dir="rtl">
        <div class="col-md-6 mt-5">
            <div class="toast p-4" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="/photos/register.jpg" width="200" class="shadow-sm rounded-circle m-auto" alt="...">
                </div>
                <div class="toast-body mt-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <input id="name" type="text" name="name" class="form-control text-center @error('name') is-invalid @enderror" placeholder="نام کاربری">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" name="email" class="form-control text-center @error('email') is-invalid @enderror" placeholder="ایمیل">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" name="password" class="form-control text-center @error('password') is-invalid @enderror" placeholder="رمز ورود">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control text-center" required autocomplete="new-password" placeholder="تکرار رمز ورود">
                        </div>
                        <input type="submit" class="btn btn-dark w-100" value="عضویت">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
