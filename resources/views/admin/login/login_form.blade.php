@extends('admin.admin')
@section('content_basis')
@include('admin.helper.helper_messages')
      <div class="row justify-content-md-center">
        <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-6 p-5">
          <form method="POST" action="{{ route('admin.post_login') }}">
            @csrf
            @widget('admin.header', [], 'Авторизация')
            @widget('admin.text', ['label'=> 'Имя', 'required' => true,], null, 'name', $errors)
            @widget('admin.text', ['label'=> 'Пароль', 'required' => true, 'type'=> 'password'], null, 'password', $errors)
            <button type="submit" class="btn btn-primary btn-icon-split"><span class="text">Войти</span></button>
          </form>
        </div>
      </div>

@endsection
