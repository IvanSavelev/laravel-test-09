/* ЗАДАЕТ ВЫСОТУ КОНТЕЙНЕРА С КОНТЕНТОМ */
$(window).resize(contentScrollResize);
$(document).ready(contentScrollResize);

function contentScrollResize() {
  var $height = $('#navbar').height();
  var $height_window = $(window).height();
  var $height_content_scroll = ($height_window - $height);
  $('#content-scroll').height($height_content_scroll);

}





















/* ЗВОНОК НА УКАЗАННЫЙ ТЕЛЕФОН */
function f_call(phoneNumber) {
  $.ajax({
    url: "/call",
    type: "POST",
    data: {
      phone: phoneNumber
      , _token: $('meta[name="csrf-token"]').attr('content')
    },
    success: function (data) {
    }
  })
}



function sendFile(file, el) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });
  var form_data = new FormData();
  form_data.append('photo', file);
  $.ajax({
    data: form_data,
    type: "POST",
    url: '/send_file',
    cache: false,
    contentType: false,
    processData: false,
    success: function (url2) {
      el.summernote('insertImage', url2);
    }
  });
}