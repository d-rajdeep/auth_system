<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon from CDN -->
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/847/847969.png" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background: linear-gradient(to right, #001f3f, #003366);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        .navbar-brand, .nav-link, .btn-outline-danger {
            color: #fff !important;
        }
        .content-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 70px; /* space for navbar */
            padding-bottom: 70px; /* space for footer */
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
        }
        .form-label {
            font-weight: 600;
        }
        footer {
            background: #001f3f;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('login.page') }}">Laravel Auth</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon bg-white"></span>
        </button>
    </div>
</nav>

<!-- Page Content -->
<div class="content-wrapper">
    <div class="card p-4">
        <h3 class="text-center mb-4">Login to Your Account</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
    @csrf

    {{-- Show login failure error --}}
    @if ($errors->has('phone'))
        <div class="alert alert-danger">
            {{ $errors->first('phone') }}
        </div>
    @endif

    <!-- Phone Input -->
    <div class="mb-3">
        <label for="phone" class="form-label">Mobile Number</label>
        <input
            type="text"
            id="phone"
            name="phone"
            value="{{ old('phone') }}"
            class="form-control @error('phone') is-invalid @enderror"
            placeholder="Enter your mobile number"
            required
        >
        @error('phone')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Password Input -->
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input
            type="password"
            id="password"
            name="password"
            class="form-control @error('password') is-invalid @enderror"
            placeholder="Enter your password"
            required
        >
        @error('password')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Submit Button -->
    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Login</button>
    </div>

    <!-- Register Redirect -->
    <p class="mt-3 text-center">
        Don't have an account?
        <a href="{{ route('register.page') }}" class="text-decoration-none">Register</a>
    </p>

    <!-- Back to Home Button -->
    {{-- <div class="text-center mt-4">
        <a href="{{ route('blog.home') }}" class="btn btn-outline-primary">← Back to Home</a>
    </div> --}}
</form>

    </div>
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <p class="mb-0">&copy; {{ date('Y') }} All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>