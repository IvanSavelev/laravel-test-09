@extends('admin.admin')
@section('content')
  <div class="o-page o-page--center">
    <div class="o-page__card">
      <div class="c-card c-card--center">
          <span class="c-icon c-icon--large u-mb-small">
            <img src="../_admin/img/logo-small.svg" alt="Neat">
          </span>

        <h4 class="u-mb-medium">Регистрация нового пользователя</h4>
        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="c-field">
            <label for="name" class="c-field__label">Имя</label>
            <input id="name" type="text" class="c-input u-mb-small{{ $errors->has('name') ? ' is-invalid' : '' }}"
                   name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif
          </div>

          <div class="c-field">
            <label for="email" class="c-field__label">Емейл</label>
            <input id="email" type="email" class="c-input u-mb-small {{ $errors->has('email') ? ' is-invalid' : '' }}"
                   name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
          </div>

          <div class="c-field">
            <label for="password" class="c-field__label">Пароль</label>

            <input id="password" type="password" class="c-input u-mb-small {{ $errors->has('password') ? ' is-invalid' : '' }}"
                   name="password" required>

            @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif

          </div>

          <div class="c-field">
            <label for="password-confirm" class="c-field__label">Повторите пароль</label>
            <input id="password-confirm" type="password" class="c-input u-mb-small " name="password_confirmation" required>
          </div>


          <button type="submit" class="c-btn c-btn--fullwidth c-btn--info">
            Зарегистрировать
          </button>

        </form>
      </div>
    </div>
  </div>
@endsection