<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Shazab’s Store</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      margin: 0; padding: 0; box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #0f62fe, #33b1ff);
      color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background: white;
      padding: 40px 30px;
      border-radius: 16px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    .login-container h2 {
      margin-bottom: 20px;
      font-size: 28px;
      color: #0f62fe;
      text-align: center;
    }

    form label {
      font-weight: 600;
      margin-bottom: 6px;
      display: block;
      color: #333;
    }

    form input[type="email"],
    form input[type="password"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 14px;
    }

    .error-msg {
      color: #e74c3c;
      font-size: 13px;
      margin-top: -10px;
      margin-bottom: 10px;
    }

    .remember-forgot {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 14px;
      margin-bottom: 20px;
    }

    .remember-forgot label {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .remember-forgot a {
      text-decoration: none;
      color: #0f62fe;
    }

    button {
      width: 100%;
      background: #0f62fe;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background: #004aad;
    }

    .session-status {
      background: #d1ecf1;
      color: #0c5460;
      padding: 10px 15px;
      margin-bottom: 20px;
      border-left: 5px solid #0f62fe;
      border-radius: 8px;
      font-size: 14px;
    }

    @media (max-width: 480px) {
      .login-container {
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>

<div class="login-container">
  <h2>Welcome Back</h2>

  <!-- Session Status -->
  @if (session('status'))
    <div class="session-status">
      {{ session('status') }}
    </div>
  @endif

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email -->
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
    @if ($errors->has('email'))
      <div class="error-msg">{{ $errors->first('email') }}</div>
    @endif

    <!-- Password -->
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>
    @if ($errors->has('password'))
      <div class="error-msg">{{ $errors->first('password') }}</div>
    @endif

    <!-- Remember + Forgot -->
    <div class="remember-forgot">
      <label for="remember_me">
        <input type="checkbox" name="remember" id="remember_me">
        Remember Me
      </label>
      @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">Forgot Password?</a>
      @endif
    </div>

    <button type="submit">Log In</button>
  </form>
</div>

</body>
</html>
