{{-- resources/views/auth/login.blade.php --}}
    <!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialNet | Вхід</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        body.light-mode { background-color: #f8f9fa; color: #212529; }
        body.dark-mode { background-color: #212529; color: #f8f9fa; }
        .login-card {
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }
        .placeholder-avatar {
            width: 80px;
            height: 80px;
            background-color: #dee2e6;
            border-radius: 50%;
        }
        body.dark-mode .login-card { background-color: #343a40; color: #f8f9fa; }
        body.dark-mode .form-control { background-color: #495057; color: #f8f9fa; border-color: #6c757d; }
        body.dark-mode .form-control::placeholder { color: #ced4da; opacity: 1; }
        body.dark-mode a { color: #0d6efd; }
        body.dark-mode .btn-primary { background-color: #0d6efd; border-color: #0d6efd; }

        .theme-toggle {
            position: fixed; top: 20px; right: 20px;
            background: none; border: none; font-size: 1.5rem; cursor: pointer; z-index: 1000; color: inherit;
        }
    </style>
</head>
<body class="light-mode">

<button class="theme-toggle" id="themeToggle">
    <i class="fa-solid fa-moon"></i>
</button>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card login-card p-4 w-100" style="max-width: 400px;">
        <div class="text-center mb-4">
            <div class="placeholder-avatar mx-auto mb-3"></div>
            <h2 class="fw-bold text-primary">Вхід</h2>
            <p class="text-muted">Увійдіть у свій акаунт SocialNet</p>
        </div>

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            {{-- Повідомлення про помилку --}}
            @if(session('error'))
                <div class="alert alert-danger text-center" id="login-error">
                    {{ session('error') }}
                </div>
            @endif

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com"
                       value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Введіть пароль" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Запам'ятати мене</label>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Увійти</button>
            </div>

            <div class="text-center text-muted">
                <a href="/forgot-password" class="text-decoration-none">Забули пароль?</a>
                <br>
                Ще немає акаунту? <a href="{{route('register.form')}}" class="text-primary text-decoration-none">Зареєструватися</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Перемикання теми
    const toggleBtn = document.getElementById('themeToggle');
    const themeIcon = toggleBtn.querySelector('i');

    toggleBtn.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        document.body.classList.toggle('light-mode');

        if(document.body.classList.contains('dark-mode')) {
            themeIcon.classList.remove('fa-moon');
            themeIcon.classList.add('fa-sun');
        } else {
            themeIcon.classList.remove('fa-sun');
            themeIcon.classList.add('fa-moon');
        }
    });

    // Автоматичне ховання повідомлення про помилку через 5 секунд
    const loginError = document.getElementById('login-error');
    if(loginError){
        setTimeout(() => {
            loginError.style.display = 'none';
        }, 5000);
    }
</script>
</body>
</html>
