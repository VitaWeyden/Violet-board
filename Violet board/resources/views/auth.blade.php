<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $mode === 'login' ? 'Sign In' : 'Register' }} – Violet Board</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/logo-mark.svg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tokens.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar-search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cards-cart-payment.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar-controls-modals.css') }}">
</head>
<body>
    <div class="container" style="min-height:100vh;display:flex;align-items:center;justify-content:center;padding:32px 16px;">
        <div class="col-md-5">
            <div class="bg-white rounded-xl shadow-lg p-5" style="border:1px solid var(--color-border);">
                <h2 class="text-center fw-semibold mb-4" style="color:var(--color-primary);font-size:1.75rem">
                    {{ $mode === 'login' ? 'Welcome back!' : 'Create your account' }}
                </h2>

                @if ($errors->any())
                    <div class="alert alert-danger rounded-lg mb-3">{{ $errors->first() }}</div>
                @endif
                @if ($mode === 'login' && session('success'))
                    <div class="alert alert-success rounded-lg mb-3">{{ session('success') }}</div>
                @endif

                @if ($mode === 'login')
                    {{-- Sign in --}}
                    <form method="POST" action="{{ route('login.submit') }}" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label fw-medium">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="your@email.com" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label fw-medium">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                    </form>
                @else
                    {{-- Register --}}
                    <form method="POST" action="{{ route('register') }}" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-medium">First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="John" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Doe" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="your@email.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium">Password <span class="text-muted small">(min. 6 characters)</span></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-medium">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm-password" name="password_confirmation" placeholder="••••••••" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Create Account</button>
                    </form>
                @endif

                @if ($mode === 'login')
                    <p class="text-center mt-3 text-muted small">
                        Don't have an account?
                        <a href="{{ route('register.form') }}" style="color:var(--color-primary)">Register</a>
                    </p>
                    <hr class="my-4">
                    <a href="{{ url('/') }}" class="btn w-100" style="background:var(--color-primary-light);color:var(--color-primary);border-radius:var(--radius-full);font-weight:500;">
                        Continue as Guest
                    </a>
                @else
                    <p class="text-center mt-3 text-muted small">
                        Already have an account?
                        <a href="{{ route('login') }}" style="color:var(--color-primary)">Sign In</a>
                    </p>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
