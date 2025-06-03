<style>
.login-form {
    max-width: 400px;
    margin: 60px auto;
    padding: 30px;
    background: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    font-family: Arial, sans-serif;
}

.login-form h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
    font-weight: 600;
}

.login-form label {
    display: block;
    margin-bottom: 8px;
    color: #555;
    font-weight: 500;
}

.login-form input[type="email"],
.login-form input[type="password"] {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 18px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 15px;
    transition: border-color 0.3s ease;
}

.login-form input[type="email"]:focus,
.login-form input[type="password"]:focus {
    border-color: #4f46e5; /* nice purple */
    outline: none;
    box-shadow: 0 0 6px rgba(79, 70, 229, 0.4);
}

.login-form .remember-me {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.login-form .remember-me input[type="checkbox"] {
    margin-right: 8px;
    width: 16px;
    height: 16px;
    cursor: pointer;
}

.login-form button {
    width: 100%;
    padding: 12px 0;
    background-color: #4f46e5;
    border: none;
    border-radius: 6px;
    color: white;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.login-form button:hover {
    background-color: #3730a3;
}

.error {
    color: #e53e3e;
    font-size: 13px;
    margin-top: -14px;
    margin-bottom: 12px;
}
</style>

<form method="POST" action="{{ route('login') }}" class="login-form">
    @csrf

    <h2>Log in</h2>

    <label for="email">Email</label>
    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
    @error('email')
        <p class="error">{{ $message }}</p>
    @enderror

    <label for="password">Password</label>
    <input id="password" name="password" type="password" required autocomplete="current-password">
    @error('password')
        <p class="error">{{ $message }}</p>
    @enderror

    <div class="remember-me">
        <input id="remember_me" name="remember" type="checkbox">
        <label for="remember_me">Remember me</label>
    </div>

    <button type="submit">Log in</button>
</form>
