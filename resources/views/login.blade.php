<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
<section class="section">
    <form action="" method="POST">
        @csrf
        <h1>Login</h1>
        <div class="inputbox">
            <ion-icon name="person-outline"></ion-icon>
            <input type="text" value="{{ old('username') }}" name="username">
            <label for="">Username</label>
        </div>
        @error('username')
                <div class="error">* {{ $message }}</div>
        @enderror
        <div class="inputbox">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input type="password" value="{{ old('password') }}" name="password">
            <label for="">Password</label>
        </div>
        @error('password')
            <div class="error">* {{ $message }}</div>
        @enderror
        @error('0')
            <div class="error">* {{ $message }}</div>
        @enderror
        
        <button class="btn" type="submit">Log in</button>
    </form>
</section>
</body>
</html>
