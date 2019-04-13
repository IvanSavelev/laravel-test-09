<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Dashboard Three | Neat</title>
  <meta name="description" content="Neat">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="_token" content="{{csrf_token()}}"/>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

  <!-- Favicon -->
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <link rel="shortcut icon" href="/_admin/favicon.ico" type="image/x-icon">

  <!-- Stylesheet -->
  <link rel="stylesheet" href="/_admin/css/bootstrap.css">
  <link rel="stylesheet" href="/_admin/css/summernote/summernote.css">
  <link rel="stylesheet" href="/_admin/css/neat.min.css">
  <link rel="stylesheet" href="/_admin/css/neat.min.css.map">
  <link rel="stylesheet" href="/_admin/css/stylesheet.css">




</head>
<body>

@yield('content_basis')
<script src="/_admin/js/neat.js"></script>

<script src="/_admin/js/bootstrap.js"></script>
<script src="/_admin/js/summernote/summernote.js"></script>
<script src="/_admin/js/customer.js"></script>



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
@yield('script_down')

</body>
</html>