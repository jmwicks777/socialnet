{{-- resources/views/auth/register.blade.php --}}
    <!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialNet | Реєстрація</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-card {
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }
        .placeholder-avatar {
            width: 80px;
            height: 80px;
            background-color: #dee2e6;
            border-radius: 50%;
        }
        .form-control::placeholder {
            color: #adb5bd;
            opacity: 1;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100" style="margin-top: 50px;">
    <div class="card register-card p-4 w-100" style="max-width: 500px;">
        <div class="text-center mb-4">
            <div class="placeholder-avatar mx-auto mb-3"></div>
            <h2 class="fw-bold text-primary">Реєстрація</h2>
            <p class="text-muted">Створіть свій акаунт SocialNet</p>
        </div>

        <form action="{{ route('register.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Ім'я</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Введіть ваше ім'я" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Прізвище</label>
                <input type="text" class="form-control" id="surname" name="surname" placeholder="Введіть ваше прізвище" value="{{ old('surname') }}" required>
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">Дата народження</label>
                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ old('birthday') }}" required>
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Аватар (опціонально)</label>
                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/jpeg,image/jpg">

            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Нікнейм</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Ваш нікнейм" value="{{ old('username') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Введіть пароль" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Підтвердження пароля</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Повторіть пароль" required>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Зареєструватися</button>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <p class="text-center text-muted">
                Вже маєте акаунт? <a href="{{route('login.form')}}" class="text-primary text-decoration-none">Увійти</a>
            </p>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
