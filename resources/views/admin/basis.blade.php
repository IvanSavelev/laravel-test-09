@extends('admin.admin')
@section('content_basis')
  <input type="hidden" name="object_id" id="object_id" value="@yield('object_id')"> {{-- Для визивика (путь сохраненеия изображений --}}
  <input type="hidden" name="object_type" id="object_type" value="@yield('object_type')"> {{-- Для визивика (путь сохраненеия изображений --}}

  <!-- Page Wrapper -->
  <div id="wrapper" class="position-fixed w-100">

    @include('admin.basis_panel_left')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        @include('admin.basis_panel_top')


        <div class="px-2 px-sm-2 px-md-2 px-lg-2 px-xl-2  overflow-auto " id="content-scroll">
          <div class="pt-4">
            @yield('content')
          </div>
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



@endsection

@section('script_down_1')
@endsection

@section('script_down_2')
  @yield('script_down_2')
@endsection