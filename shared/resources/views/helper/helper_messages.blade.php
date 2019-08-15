@if ($errors->any())
  @foreach ($errors->all() as $error)
    @include('helper.helper_message', ['status' => 'error', 'text' => $error])
  @endforeach
@endif
@if (session('error'))
   @include('helper.helper_message', ['status' => 'error', 'text' => session('error')])
@endif
@if (session('successfully'))
  @include('helper.helper_message', ['status' => 'success', 'text' => session('successfully')])
@endif