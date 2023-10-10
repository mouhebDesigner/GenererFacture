<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .right {
            flex: 1;
            background: #FF0000; /* Red background color for the left part */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: #eaeaea; /* White background color for the login box */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 400px;
        }

        .left {
            flex: 1;
            background: #000; /* Black background color for the right part */
            background-image: url('logo-facture.png'); /* Replace with your image URL */
            background-size: 50% 29%;
            background-position: center;
            background-repeat: no-repeat; 
        }

        .login-form input:not([type="checkbox"]) {
            width: 94%;
            padding: 14px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            outline: none;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background: black;
            color: #fff; /* Text color */
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-form button:hover {
            background: #0056b3; /* Button background color on hover */
        }

        .login-btn {
            background: black;
            color: #fff;
        }

        .login-form p {
            text-align: center;
        }

        .login-form a {
            text-decoration: none;
            color: #FF0000; /* Red color for the link */
            margin-left: 10px;
        }

        .checkbox {
            display: flex;
            align-items: center;
        }

        .checkbox label {
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            
        </div>
        <div class="right">
            <div class="login-box">
                <h2 style="text-align: center;">Bonjour</h2>
                <p style="text-align: center;">Connectez-vous à l'aide de votre adresse mail</p>
                <form class="login-form" action="{{ route('login') }}" method="post">
                    @csrf
                    <input type="text" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                    <div class="checkbox">
                        <input type="checkbox" id="remember-me">
                        <label for="remember-me">Se rappeler de moi</label>
                    </div>
                    <button type="submit" class="login-btn">Se connecter</button>
                </form>
                <p>
                    <a href="#" class="login-link">Mot de passe oublié</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
