<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialNet | Новий пароль</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        body.light-mode { background-color: #f8f9fa; color: #212529; }
        body.dark-mode { background-color: #212529; color: #f8f9fa; }
        .card { border-radius: 1rem; box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15); }
        .theme-toggle {
            position: fixed; top: 20px; right: 20px;
            background: none; border: none; font-size: 1.5rem; cursor: pointer; z-index: 1000; color: inherit;
        }
    </style>
</head>
<body class="light-mode">

<button class="theme-toggle" id="themeToggle"><i class="fa-solid fa-moon"></i></button>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 w-100" style="max-width: 400px;">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Новий пароль</h2>
            <p class="text-muted">Введіть новий пароль для свого акаунту</p>
        </div>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Новий пароль</label>
                <input type="password" name="password" class="form-control" required>
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Підтвердіть пароль</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Відновити пароль</button>
            </div>

            <div class="text-center text-muted">
                <a href="{{ route('login.form') }}" class="text-decoration-none">Назад до входу</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const toggleBtn = document.getElementById('themeToggle');
    const themeIcon = toggleBtn.querySelector('i');
    toggleBtn.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        document.body.classList.toggle('light-mode');
        themeIcon.classList.toggle('fa-moon');
        themeIcon.classList.toggle('fa-sun');
    });
</script>
</body>
</html>
