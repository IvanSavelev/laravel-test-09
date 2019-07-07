@extends('admin.basis')
@section('content')
  @include('admin.helper_message', ['errors' => $errors, 'info' => session('status')])
  @include('admin.breadcrumbs', ['parents' => [], 'name' => 'Статьи'])

  <div class="row">
    <div class="col-12">
      <div class="row">
        <div class="col-6">
          <div class="pb-3 float-left">
            <a href="{{ route ('admin.article.parent_update') }}" class="btn btn-primary"><i class="fas fa-cogs"></i></a>
          </div>
        </div>
        <div class="col-6">
          <div class="pb-3 float-right">
            <a href="{{ route ('admin.article.add') }}" class="btn btn-primary">Добавить</a>
            <button data-type="delete" class="btn btn-danger"><span class="icon"><i class="fas fa-trash"></i></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Статьи</h6>
        </div>
      <div class="card-body">
        <div class="table-responsive overflow-hidden">

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th></th>
                  <th>Изображение</th>
                  <th>Имя</th>
                  <th>Описание</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                @forelse($articles as $article)
                <tr class="@if(!$article->visible) opticy-50 @endif">
                  <td class=" custom-checkbox pl-5 w-2">
                    <input type="checkbox" class="custom-control-input" for="{{ $article->article_id }}" id="{{ $article->article_id }}" data-id="{{ $article->article_id }}">
                    <label class="custom-control-label" for="{{ $article->article_id }}">{{ $article->article_id }}</label>
                  </td>
                  <td>
                    <img class="c-avatar__img" @empty($article->image) src="/admin/img/simuclar/72.png"
                         @else src="{{ $article->image }}" @endif alt="{{ $article->title }}">
                  </td>
                  <td>{{ $article->title }}</td>
                  <td>{!! $article->description !!} </td>
                  <td>
                    <a href="{{ route ('admin.article.edit', $article->article_id) }}" class="btn btn-primary btn-icon-split">
                      <span class="icon">
                        <i class="fas fa-arrow-right"></i>
                      </span>
                    </a>
                  </td>
                </tr>
                @empty
                  <tr>
                    <td colspan="5"><p class="">Нет cтатей.</p></td>
                  </tr>
                @endforelse


              </tbody>
          </table>
          @include('admin.helper_paginator', ['objects' => $articles])

        </div>
      </div>

    </div>
  </div>

  <div class="row">
    <div class="col-12">
      @include('admin.helper_paginator', ['objects' => $articles])
    </div>
  </div>
@endsection


@section('script_down_2')
  @include('admin.helper_script_list_delete', ['url' => '/admin/article/delete'])
@endsection
