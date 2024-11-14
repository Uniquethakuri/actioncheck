<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .reset-password-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            transition: transform 0.2s;
        }
        .reset-password-card:hover {
            transform: scale(1.02);
        }
        .reset-password-title {
            font-size: 1.75rem;
            font-weight: bold;
            color: #2d3748;
            margin-bottom: 1.5rem;
        }
        .reset-password-button {
            background: #3182ce;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .reset-password-button:hover {
            background: #2b6cb0;
        }
        .reset-password-button:focus {
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
    <div class="w-full max-w-md reset-password-card">
        <h2 class="reset-password-title text-center">Reset Password</h2>
        
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full input-field" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full input-field" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full input-field" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Reset Password Button -->
            <div class="mb-4">
                <button type="submit" class="reset-password-button w-full">
                    {{ __('Reset Password') }}
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
