@extends('layouts.auth')

@section('title', 'Reset Password')
@section('page-title', '-Buat Password Baru-')

@section('content')
    <form class="form" action="{{ route('password.update') }}" method="POST">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <input type="hidden" name="email" value="{{ $request->email }}">

        <div class="mb-3 f-password">
            <input type="password" name="password"
                class="form-control form-password @error('password') is-invalid @enderror" id="InputPassword" required>
            <label for="InputPassword" class="form-label form-label-password">Password Baru</label>
            <i class="fa fa-eye-slash toggle-password" id="togglePassword"></i>
        </div>
        <div class="mb-3 f-password">
            <input type="password" name="password_confirmation" class="form-control form-password"
                id="InputPasswordConfirmation" required>
            <label for="InputPassword" class="form-label form-label-password">Konfirmasi Password Baru</label>
            <i class="fa fa-eye-slash toggle-password" id="togglePassword"></i>
        </div>
        <button type="submit" class="btn btn-primary btn-sign-in">Reset Password</button>
    </form>
@endsection

@section('scripts')
    <script>
    const toggleIcons = document.querySelectorAll('.toggle-password');

    toggleIcons.forEach(icon => {
        icon.addEventListener('click', function() {
            const wrapper = this.closest('.f-password');
            const input = wrapper.querySelector('input');
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    });
    </script>   
@endsection