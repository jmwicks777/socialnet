{{-- resources/views/home.blade.php --}}
    <!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialNet | Головна</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .placeholder-card {
            height: 150px;
            background-color: #e9ecef;
            border-radius: 0.5rem;
        }
        .placeholder-avatar {
            width: 50px;
            height: 50px;
            background-color: #dee2e6;
            border-radius: 50%;
        }
        .placeholder-text {
            height: 12px;
            background-color: #dee2e6;
            border-radius: 0.25rem;
        }
        .placeholder-text.short { width: 50px; }
        .placeholder-text.medium { width: 100px; }
        .placeholder-text.long { width: 150px; }
    </style>
</head>
<body class="bg-light">

{{-- Хедер --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand text-primary fw-bold" href="#">SocialNet</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Головна</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Повідомлення</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Друзі</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Профіль</a></li>
                <li class="nav-item"><a class="nav-link" href="/register">Реєстрація</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Вхід</a></li>

            </ul>
        </div>
    </div>
</nav>

{{-- Основний контент --}}
<div class="container my-4">
    <div class="row">

        {{-- Ліва панель --}}
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <div class="placeholder-avatar mb-2 mx-auto"></div>
                    <div class="placeholder-text long mx-auto mb-1"></div>
                    <div class="placeholder-text medium mx-auto"></div>
                </div>
            </div>
            <div class="card shadow-sm mt-3">
                <div class="card-body">
                    <h6 class="text-muted">Друзі онлайн</h6>
                    <div class="d-flex flex-column gap-2 mt-2">
                        <div class="placeholder-avatar"></div>
                        <div class="placeholder-avatar"></div>
                        <div class="placeholder-avatar"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Головна стрічка --}}
        <div class="col-md-6">
            @for($i = 0; $i < 3; $i++)
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="placeholder-avatar me-3"></div>
                            <div class="flex-grow-1">
                                <div class="placeholder-text medium mb-1"></div>
                                <div class="placeholder-text short"></div>
                            </div>
                        </div>
                        <div class="placeholder-card mb-3"></div>
                        <div class="d-flex gap-3">
                            <div class="placeholder-text short"></div>
                            <div class="placeholder-text short"></div>
                            <div class="placeholder-text short"></div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>

        {{-- Права панель --}}
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Тренди</h6>
                    <div class="d-flex flex-column gap-2 mt-2">
                        <div class="placeholder-text long"></div>
                        <div class="placeholder-text medium"></div>
                        <div class="placeholder-text long"></div>
                        <div class="placeholder-text short"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- Футер --}}
<footer class="bg-white shadow-sm text-center py-3 mt-4">
    <small class="text-muted">© 2025 SocialNet. Всі права захищені.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
