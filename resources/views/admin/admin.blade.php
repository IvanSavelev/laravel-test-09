<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="_token" content="{{csrf_token()}}"/>

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="/admin/css/stylesheet.css" rel="stylesheet">

</head>
<body id="page-top">

@yield('content_basis')

<!-- Bootstrap core JavaScript-->
<script src="/admin/vendor/jquery/jquery.min.js"></script>
<script src="/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/admin/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
{{-- <script src="/admin/js/demo/chart-area-demo.js"></script> --}}
{{-- <script src="/admin/js/demo/chart-pie-demo.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 228,
            callbacks: {
                onImageUpload: function (files) {
                    var el = $(this);
                    sendFile(files[0], el);
                }
            }
        });
    });
</script>
<!-- Main JavaScript -->
<script>
    function sendFile(file, el) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var form_data = new FormData();
        form_data.append('photo', file);
        form_data.append('object_id', $('#object_id').val());
        form_data.append('object_type', $('#object_type').val());
        $.ajax({
            data: form_data,
            type: "POST",
            url: '{{ url('/admin/send_file') }}',
            cache: false,
            contentType: false,
            processData: false,
            success: function (url2) {
                el.summernote('insertImage', url2);
            }
        });
    }

</script>
<script>
   //Задает высоту контейнера с контентом
   $(window).resize(contentScrollResize);
   $(document).ready(contentScrollResize);
   function contentScrollResize() {
       var $height =  $('#navbar').height();
       var $height_window = $(window).height();
       var $height_content_scroll = $height_window - $height;
       alert($height_content_scroll);
       $('#content-scroll').height($height_content_scroll);

   }
  </script>
@yield('script_down_1')
@yield('script_down_2')
</body>
</html>