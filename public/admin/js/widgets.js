$(document).ready(function () {
    uploadPlagins();









  /* ВАЛИДАЦИЯ - ТОЛЬКО ЧИСЛА */
  $('body').on('keydown', 'input.numeric', function (e) {
    clearErrors($(this));
    if (e.key.length == 1 && e.key.match(/[^0-9'".17]/)) {
      if(!e.ctrlKey) {
        setError($(this).attr('name'), 'Можно вводить только числа');
        return false;
      }
    }
  });
  $('body').on('focusout', 'input', function (e) {
    clearErrors($(this));
  });

});



/**
 * Добавляет ошибку с текстом
 * @param name
 * @param error_for_field
 */
function setError(name, error_for_field) {
  $('#' + name).after('<div class="invalid-feedback">' + error_for_field + '</div>');
  $('#' + name).addClass('is-invalid');
}

/**
 * Удаляет ошибки из полей модального окна
 */
function clearErrors($object_clear_errors) {
  if ($object_clear_errors) {
    var $parent = $object_clear_errors.parent();
    $parent.find('.invalid-feedback').remove();
    $parent.find('input').removeClass('is-invalid');
  } else {
    $('#modal-form .invalid-feedback').remove();
    $('#modal-form input').removeClass('is-invalid');
  }
}


/**
 * Нужно для того чтобы новые элементы которые появились, обработались плагинами (нормально отображался календарь, визивик и т. д.)
 */
function uploadPlagins() {
  loadDateForm(); //Формирует вывод календаря для даты
  loadSelectForm(); //Формирует вывод списка
  loadVisivigSummernote();  //Формирует вывод визивика
}

/**
 * Формирует вывод календаря для даты
 */
function loadDateForm() {
  var class_color = 'color-cds-red';
  $.fn.datetimepicker.Constructor.Default = $.extend({}, $.fn.datetimepicker.Constructor.Default, {
    icons: {
      time: class_color + ' fa fa-clock',
      date: class_color + ' fa fa-calendar',
      up: class_color + ' fa fa-arrow-up',
      down: class_color + ' fa fa-arrow-down',
      previous: class_color + ' fa fa-chevron-left',
      next: class_color + ' fa fa-chevron-right',
      today: class_color + ' fa fa-calendar',
      clear: class_color + ' fa fa-trash',
      close: class_color + ' fa fa-times'
    }, //showToday: true
  });

  $("input.datetimepicker-input").datetimepicker();
  $("input.datetimepicker-input").each(function (indx, element) {
    var $unix = $(element).attr('data-value');
    var $format = $(element).attr('data-format_date');
    $(element).datetimepicker('format', $format);
    $(element).datetimepicker('locale', 'ru');
    $(element).datetimepicker('defaultDate', moment.unix($unix).utc());
    $(element).datetimepicker('focusOnShow', false);

  });
}

/**
 * Формирует вывод списка
 */
function loadSelectForm() {
  $('.selectpicker').selectpicker({
    liveSearch: true,
  });
}

/**
 * Формирует вывод поля в виде визивика
 */
function loadVisivigSummernote() {
    $('#summernote, .summernote').summernote({
    height: 228,
    dialogsInBody: true,
    callbacks: {
      onImageUpload: function (files) {
        var el = $(this);
        sendFile(files[0], el);
      }
    }
  });
}

