<<<<<<< HEAD
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
=======
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            background: linear-gradient(to bottom, #b8a96c, #46412c);
            font-family: 'Impact', 'Arial Black', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .logo {
            margin-bottom: 10px;
            text-align: center;

        }

        .logo img {
            width: 250px;
            height: auto;
        }

        .container {
            background-color: #3a4c3c;
            padding: 30px;
            border-radius: 25px;
            width: 350px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            color: #f0f0e0;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 10px;
            color: #d4c17a;
        }

        input[type="email"],
        input[type="password"] {
            width: 94%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            background-color: #f0f0e0;
            color: #333;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #7a5c3b;
            border: none;
            color: #fff;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #5e442a;
        }

        .register-link {
            margin-top: 15px;
            text-align: center;
        }

        .register-link a {
            color: #d4c17a;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="logo">
        <img src="/storage/logo.png" alt="Logo">
    </div>

    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="{{ route('loginStore') }}">
            @csrf
            <label name="email">Email</label>
            <input type="email" name="email" placeholder="Email" required>
            <label name="password">Password</label>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="register-link">
            Don't have an account? <a href="register">Register here</a>
        </div>
    </div>

</body>

</html>
>>>>>>> 7094211 (create login and sign up pages)
