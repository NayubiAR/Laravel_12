@extends('layouts.auth')

@section('title', 'Forgot Password')
@section('page-title', 'Reset Password')

@section('content')
    <form class="form" action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="mb-3 f-email">
            <input type="email" name="email" class="form-control form-email @error('email') is-invalid @enderror"
                id="InputEmail" value="{{ old('email') }}" required>
            <label for="InputEmail" class="form-label form-label-email">Email</label>
        </div>
        <button type="submit" class="btn btn-primary btn-sign-in">Kirim Link Reset</button>
        <div class="mt-3 text-center">
            <span class="register">Sudah ingat password kamu? <a href="{{ route('login') }}">Masuk</a></span>
        </div>
    </form>
@endsection