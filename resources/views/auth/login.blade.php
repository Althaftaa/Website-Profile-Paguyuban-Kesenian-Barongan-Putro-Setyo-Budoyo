<x-auth-layout-custom>

    @if (session('status'))
        <div class="alert-auth">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div class="mb-0">
            <label for="email" class="form-label">Email</label>
            <div class="input-group-auth">
                <i class="fa-solid fa-envelope"></i>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="admin@barongan.com"
                    required
                    autofocus
                    autocomplete="username"
                >
            </div>
            @error('email')
                <span class="invalid-feedback-auth">{{ $message }}</span>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-0">
            <label for="password" class="form-label">Password</label>
            <div class="input-group-auth">
                <i class="fa-solid fa-lock"></i>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                    autocomplete="current-password"
                >
                <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
            </div>
            @error('password')
                <span class="invalid-feedback-auth">{{ $message }}</span>
            @enderror
        </div>

        {{-- Remember + forgot password --}}
        <div class="form-check-auth">
            <label for="remember_me">
                <input type="checkbox" name="remember" id="remember_me">
                Ingat saya
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Lupa password?</a>
            @endif
        </div>

        <button type="submit" class="btn-auth">
            <i class="fa-solid fa-right-to-bracket me-1"></i> Masuk
        </button>
    </form>

</x-auth-layout-custom>

@push('scripts')
<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>
@endpush