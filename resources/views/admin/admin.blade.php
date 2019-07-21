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

  <link href="/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
  <link href="/admin/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Плагины -->
  <link href="/admin/vendor/bootstrap-select/css/bootstrap-select.css" rel="stylesheet">  <!-- для отображения списков -->
  <link href="/admin/vendor/tempusdominus/tempusdominus-bootstrap-4.css" rel="stylesheet">  <!-- для отображения калдендаря -->
  <link href="/vendor/summernote/summernote-bs4.css" rel="stylesheet">  <!-- для отображения визивика -->

  <!-- Кастомные стили -->
  <link href="/admin/css/additional_bootstrap.css" rel="stylesheet">

  <link href="/admin/css/components/buttons.css" rel="stylesheet">
  <link href="/admin/css/components/checkbox.css" rel="stylesheet">
  <link href="/admin/css/components/datepicker (calendar).css" rel="stylesheet">
  <link href="/admin/css/components/table_items.css" rel="stylesheet">
  <link href="/admin/css/components/tables.css" rel="stylesheet">
  <link href="/admin/css/components/window_modals.css" rel="stylesheet">
  <link href="/admin/css/components/input_text.css" rel="stylesheet">
  <link href="/admin/css/components/labels.css" rel="stylesheet">
  <link href="/admin/css/components/selects.css" rel="stylesheet">

  <link href="/admin/css/blocks/panel_left.css" rel="stylesheet">
  <link href="/admin/css/blocks/basis.css" rel="stylesheet">

</head>
<body id="page-top">


@yield('content_basis')


<!-- Page level plugins -->
<script src="/admin/vendor/chart.js/Chart.min.js"></script>

<!-- Bootstrap и Jquery-->
<script src="/admin/vendor/jquery/jquery.min.js"></script>
<script src="/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Плагины -->

<script src="/admin/vendor/jquery-cookie/jquery.cookie.js"></script> <!-- для jquery работы с куками-->
<script src="/admin/vendor/moment/moment-with-locales.js"></script> <!-- для работы с датой (без этой библиотеки не будет работать плагин tempusdominus-bootstrap-4 -->
<script src="/admin/vendor/moment/locale/ru.js"></script>


<script src="/admin/vendor/tempusdominus/tempusdominus-bootstrap-4.js"></script> <!-- для отображения калдендаря -->
<script src="/admin/vendor/bootstrap-select/js/bootstrap-select.js"></script> <!-- для отображения списков -->
<script src="/admin/vendor/summernote/summernote-bs4.js"></script>  <!-- для отображения визивика -->

<!-- Кастомные js скрипты -->
<script src="/admin/js/panel_left_scroll.js"></script>
<script src="/admin/js/widgets.js"></script>
<script src="/admin/js/public.js"></script>

@yield('script_down_1')
@yield('script_down_2')
</body>
</html>