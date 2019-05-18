<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Магазин (тест)</title>
  <meta name="description" content="Neat">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="_token" content="{{csrf_token()}}"/>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

  <!-- Favicon -->
  <link rel="apple-touch-icon" href="/front/apple-touch-icon.png">
  <link rel="shortcut icon" href="/admin/img/favicon.ico" type="image/x-icon">

  <!-- Stylesheet -->
  <link rel="stylesheet" href="/admin/css/bootstrap.css">
  <link rel="stylesheet" href="/admin/css/summernote/summernote.css">
  <link rel="stylesheet" href="/admin/css/neat.min.css">
  <link rel="stylesheet" href="/admin/css/neat.min.css.map">
  <link rel="stylesheet" href="/admin/css/stylesheet.css">
  <link rel="stylesheet" href="/admin/css/bootstrap-datetimepicker.min.css" />





</head>
<body>

@yield('content_basis')
<script src="/admin/js/neat.js"></script>
<script src="/admin/js/moment-with-locales.min.js"></script>

<script src="/admin/js/bootstrap.js"></script>
<script src="/admin/js/bootstrap-datetimepicker.min.js"></script>

<script src="/admin/js/summernote/summernote.js"></script>
<script src="/admin/js/customer.js"></script>

<script type="text/javascript">
  $(function () {
    $('[data-type="datetimepicker"]').datetimepicker({
      locale: 'ru',
      stepping:10,
      format: 'DD.MM.YYYY',

     // daysOfWeekDisabled:[0,6]
    });
  });
</script>



<script>
    $(document).ready(function () {
        $('.summernote').summernote({
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
@yield('script_down_1')
@yield('script_down_2')
</body>
</html>