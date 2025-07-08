<<<<<<< HEAD
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
=======
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body {
            background: linear-gradient(to bottom, #b8a96c, #46412c);
            font-family: 'Impact', 'Arial Black', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 135vh;
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

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
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

        .login-link {
            margin-top: 15px;
            text-align: center;
        }

        .login-link a {
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
        <h2>Register</h2>
        <form action="{{ route('registerStore') }}" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required placeholder="Enter Your Name">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="Your Soviet Email">

            <label for="type">Type</label>
            <!-- <input type="text" id="type" name="type" required placeholder="Enter Your Type"> -->
            <select name="type" id="book">
                <option value="user">user</option>
                <option value="admin">admin</option>
                <option value="seller">seller</option>

            </select>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required placeholder="Enter Your Password">

            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Confirm Your Password">

            <label for="country">Country</label>
            <select name="country_id" id="country">
                @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>


            <button type="submit">SIGN UP</button>
        </form>
        <div class="login-link">
            Already have an account? <a href="login">Login here</a>
        </div>
    </div>
</body>

</html>
>>>>>>> 7094211 (create login and sign up pages)
