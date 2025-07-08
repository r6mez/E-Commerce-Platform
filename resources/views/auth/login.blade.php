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
