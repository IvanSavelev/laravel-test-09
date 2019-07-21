@if ($errors and $errors->any())
  @foreach ($errors->all() as $error)
    @include('admin.helper.helper_message', ['status' => 'error', 'text' => $error])
  @endforeach
@endif
@if (session('error'))
   @include('admin.helper.helper_message', ['status' => 'error', 'text' => session('error')])
@endif
@if (session('successfully'))
  @include('admin.helper.helper_message', ['status' => 'success', 'text' => session('successfully')])
@endif
@if (session('info'))
  @include('admin.helper.helper_message', ['status' => 'info', 'text' => session('info')])
@endif