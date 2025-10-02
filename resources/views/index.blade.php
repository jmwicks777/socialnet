{{-- resources/views/home.blade.php --}}
    <!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialNet | Головна</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .placeholder-card { height: 150px; background-color: #e9ecef; border-radius: 0.5rem; }
        .placeholder-avatar { width: 50px; height: 50px; background-color: #dee2e6; border-radius: 50%; }
        .placeholder-text { height: 12px; background-color: #dee2e6; border-radius: 0.25rem; }
        .placeholder-text.short { width: 50px; }
        .placeholder-text.medium { width: 100px; }
        .placeholder-text.long { width: 150px; }

        /* Кнопка чату */
        #chat-toggle-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #0d6efd;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 24px;
            cursor: pointer;
            z-index: 10000;
        }
    </style>
</head>
<body class="bg-light">

{{-- Хедер --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand text-primary fw-bold" href="{{ route('social-net.index') }}">SocialNet</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('social-net.index') }}">Головна</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Повідомлення</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Друзі</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Профіль</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register.form') }}">Реєстрація</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login.form') }}">Вхід</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Вихід</a></li>
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
                    {{-- Аватар користувача --}}
                    @if($user->avatar_path)
                        <img src="{{ asset('storage/'.$user->avatar_path) }}" class="rounded-circle mb-2" style="width:70px;height:70px;" alt="Avatar">
                    @else
                        <div class="placeholder-avatar mb-2 mx-auto"></div>
                    @endif

                    {{-- Ім’я та прізвище --}}
                    <div class="fw-bold">{{ $user->name }} {{ $user->surname ?? '' }}</div>

                    {{-- Нікнейм --}}
                    <div class="text-muted">{{ $user->username ?? '' }}</div>

                    {{-- Кнопка редагування --}}
                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        Редагувати профіль
                    </button>
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

{{-- Модальне вікно редагування профілю --}}
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Редагувати профіль</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3 text-center">
                        @if($user->avatar_path)
                            <img src="{{ asset('storage/'.$user->avatar_path) }}" class="rounded-circle mb-2" style="width:70px;height:70px;" alt="Avatar">
                        @endif
                        <input type="file" class="form-control mt-2" name="avatar" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Ім’я</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Прізвище</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="{{ $user->surname }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Нікнейм</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Кнопка для відкриття модального чату --}}
<button id="chat-toggle-btn">💬</button>

{{-- Модальне вікно чату --}}
<div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 350px;">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="chatModalLabel">Чат</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column" style="height: 300px;">
                <div id="chat-messages" class="flex-grow-1 mb-2" style="overflow-y: auto; border: 1px solid #ddd; border-radius:5px; padding:5px;">
                    <p class="text-muted small">Тут будуть повідомлення...</p>
                </div>
                <form id="chat-form" class="d-flex">
                    <input type="text" class="form-control me-2" placeholder="Написати по юзернейму або пошті">
                    <button type="submit" class="btn btn-primary">Відправити</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Футер --}}
<footer class="bg-white shadow-sm text-center py-3 mt-4">
    <small class="text-muted">© 2025 SocialNet. Всі права захищені.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Відкриття модального чату
    const chatBtn = document.getElementById('chat-toggle-btn');
    const chatModal = new bootstrap.Modal(document.getElementById('chatModal'));

    chatBtn.addEventListener('click', () => {
        chatModal.show();
    });

    // Відправка повідомлення (фронтенд)
    document.getElementById('chat-form').addEventListener('submit', function(e){
        e.preventDefault();
        const input = this.querySelector('input');
        const message = input.value.trim();
        if(message){
            const p = document.createElement('p');
            p.textContent = message;
            document.getElementById('chat-messages').appendChild(p);
            input.value = '';
            const chatMessagesDiv = document.getElementById('chat-messages');
            chatMessagesDiv.scrollTop = chatMessagesDiv.scrollHeight;
        }
    });
</script>
</body>
</html>
