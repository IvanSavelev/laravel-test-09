/* ЗАДАЕТ ВЫСОТУ КОНТЕЙНЕРА С КОНТЕНТОМ */
$(window).resize(contentScrollResize);
$(document).ready(contentScrollResize);

function contentScrollResize() {
  var $height = $('#navbar').height();
  var $height_window = $(window).height();
  var $height_content_scroll = ($height_window - $height);
  $('#content-scroll').height($height_content_scroll);

}


/* AJAX ЗАПРОС */
/**
 *
 * @param name_path - путь запроса
 * @param form_data - массив данных
 * @returns {*}
 */
function postAjax(name_path, form_data) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });
  var data_return = null;
  $.ajax({
    type: "post",
    url: name_path,
    cache: false,
    async: false,
    data: form_data,
    contentType: false,
    processData: false,
    success: function (data) {
      data_return = data;
    },
    error: function (data) {
      data_return = data;
    }
  });
  return data_return;
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


$(window).resize(contentScrollResize);
$(document).ready(contentScrollResize);

function contentScrollResize() {
  var $height = $('#navbar').height();
  var $height_window = $(window).height();
  var $height_content_scroll = $height_window - $height;

  $('#content-scroll').height($height_content_scroll);

}

$(document).ready(function () {
  //Update product
  $('button[data-type=update]').click(function () {
    pageUpdate();
  });
});

function pageUpdate() {
  $('<input />').attr('type', 'hidden').attr('name', "redirect_here").attr('value', 1).appendTo('form');
  return true;
}

$(document).ready(function () {
  $('#summernote').summernote({
    height: 228,
    dialogsInBody: true,
    callbacks: {
      onImageUpload: function (files) {
        var el = $(this);
        sendFile(files[0], el);
      }
    }
  });
});

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
    url: '/admin/send_file',
    cache: false,
    contentType: false,
    processData: false,
    success: function (url2) {
      el.summernote('insertImage', url2);
    }
  });
}