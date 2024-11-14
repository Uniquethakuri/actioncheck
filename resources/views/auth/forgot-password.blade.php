<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .forgot-password-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            transition: transform 0.2s;
        }
        .forgot-password-card:hover {
            transform: scale(1.02);
        }
        .forgot-password-title {
            font-size: 1.75rem;
            font-weight: bold;
            color: #2d3748;
            margin-bottom: 1.5rem;
        }
        .forgot-password-button {
            background: #3182ce;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .forgot-password-button:hover {
            background: #2b6cb0;
        }
        .forgot-password-button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.4);
        }
        .input-field {
            border-radius: 8px;
            padding: 0.75rem;
            border: 1px solid #cbd5e0;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .input-field:focus {
            border-color: #3182ce;
            box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.2);
            outline: none;
        }
        .login-link {
            color: #3182ce;
            text-decoration: none;
            transition: color 0.3s;
        }
        .login-link:hover {
            color: #2b6cb0;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md forgot-password-card">
        <h2 class="forgot-password-title text-center">Forgot Password</h2>
        
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full input-field" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Send Password Reset Link Button -->
            <div class="mb-4">
                <button type="submit" class="forgot-password-button w-full">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>

        <!-- Back to Login Link -->
        <div class="text-center mt-4">
            <p class="text-sm text-gray-600">
                {{ __("Remember your password?") }}
                <a href="{{ route('login') }}" class="login-link">
                    {{ __('Log in') }}
                </a>
            </p>
        </div>
    </div>
</body>
</html>
