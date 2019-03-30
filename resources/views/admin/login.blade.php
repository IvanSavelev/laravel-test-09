<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Добро пожаловать</title>
    <meta name="description" content="Neat">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="../_admin/favicon.ico" type="image/x-icon">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../_admin/css/neat.min.css?v=1.0">
</head>
<body>

<div class="o-page o-page--center">
    <div class="o-page__card">
        <div class="c-card c-card--center">
          <span class="c-icon c-icon--large u-mb-small">
            <img src="../_admin/img/logo-small.svg" alt="Neat">
          </span>

            <h4 class="u-mb-medium">Добро пожаловать</h4>
            <form method="POST" action="{{ route('admin') }}">
                @if ($errors->has('email'))
                    <span class="c-alert c-alert--danger" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
                @csrf
                <div class="c-field">
                    <label class="c-field__label">Логин</label>
                    <input class="c-input u-mb-small" id="email" name="email" type="text" placeholder="Numbers, Pharagraphs Only">
                </div>

                <div class="c-field">
                    <label class="c-field__label">Пароль</label>
                    <input class="c-input u-mb-small" id="password" name="password" type="password" placeholder="Numbers, Pharagraphs Only">
                </div>

                <button class="c-btn c-btn--fullwidth c-btn--info">Войти</button>
            </form>
        </div>
    </div>
</div>

<!-- Main JavaScript -->
<script src="../_admin/js/neat.min.js?v=1.0"></script>
</body>
</html>