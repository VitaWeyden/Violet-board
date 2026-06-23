<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register – Violet Board</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
</head>
<body>
    <nav class="navbar navbar-light fixed-top py-2 header">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="/" class="navbar-home-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                </svg>
            </a>
            <span class="fw-semibold fs-5" style="color:#ffffff">Create Account</span>
            <div style="width:38px"></div>
        </div>
    </nav>

    <div class="container" style="min-height:calc(100vh - var(--navbar-height) - var(--footer-height));display:flex;align-items:center;justify-content:center;padding:32px 16px;">
        <div class="col-md-5">
            <div class="bg-white rounded-xl shadow-lg p-5" style="border:1px solid var(--color-border);">
                <h2 class="text-center fw-semibold mb-4" style="color:var(--color-primary);font-size:1.75rem">Create your account</h2>

                @if ($errors->any())
                    <div class="alert alert-danger rounded-lg mb-3">{{ $errors->first() }}</div>
                @endif

                <form method="POST" action="{{ route('register') }}">
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

                <p class="text-center mt-3 text-muted small">
                    Already have an account?
                    <a href="{{ route('login') }}" style="color:var(--color-primary)">Sign In</a>
                </p>
            </div>
        </div>
    </div>

    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
