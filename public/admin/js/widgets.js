$(document).ready(function () {
  loadDateForm(); //Формирует вавод календаря для даты


  /* МОДАЛЬНОЕ ОКНО */
  $("body").on('click', "button[data-ajax_url]", function () {
    $parent_form = $(this).closest('form');
    var fd = new FormData($parent_form[0]);
    var data = postAjax($(this).data('ajax_url'), fd);
    if (data.status == 'success') {

      $('#status_1').modal('hide'); //Скрываем модальное окно
      $('.content').prepend(data.message); //Вставляем сообщение об успешном изменении
      $('#content-scroll').animate({scrollTop: 0}, 'slow'); //Перемешаем скрол наверх, чтоб видеть сообщение
    }
    if (data.status == 'error') {
      clearErrors();


      var errors = data.errors;
      $.each(errors, function (name_field, errors_for_field) {
        setErrorForField(name_field, errors_for_field);
      });
    }
  });

  function setErrorForField(name, error_text_array) {
    $.each(error_text_array, function (name_field, error_for_field) {
      setError(name, error_for_field);
    });
  }


  /* ВАЛИДАЦИЯ - ТОЛЬКО ЧИСЛА */
  $('body').on('keydown', 'input.numeric', function (e) {
    clearErrors($(this));
    if (e.key.length == 1 && e.key.match(/[^0-9'".]/)) {
      setError($(this).attr('name'), 'Можно вводить только числа');
      return false;
    }
  });
  $('body').on('focusout', 'input', function (e) {
    clearErrors($(this));
  });


  /* ОТКРЫТИЕ МОДАЛЬНОГО ОКНА ТАБЛИЦЫ */
  $('.table-item[data-modal=true]').on('click', function () {
    var form_data = new FormData();
    this_dom = $(this).find('div>div');
    form_data.append('edit_attribute', this_dom.data('modal-edit-attribute'));
    form_data.append('save', this_dom.data('modal-save-url'));
    var data = postAjax(this_dom.data('modal-edit-url'), form_data); //Принимаем данные (html модального окна)
    $('#status_1').detach();
    $('body').append(data);
    $('#status_1').modal('show');
    loadDateForm();//Нужно для того чтобы нормально выглядели поля с датой
    loadSelectForm();//Нужно для того чтобы нормально выглядели поля с списком
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
    }, showToday: true

  });


  $("input.datetimepicker-input").datetimepicker();
  $("input.datetimepicker-input").each(function (indx, element) {
    var $unix = $(element).attr('data-value');
    var $format = $(element).attr('data-format_date');
    $(element).datetimepicker('format', $format);
    $(element).datetimepicker('locale', 'ru');
    $(element).datetimepicker('defaultDate', moment.unix($unix));
    $(element).datetimepicker('focusOnShow', false);

  });
}

/**
 * Формирует вывод списка
 */
function loadSelectForm() {
  $('.selectpicker').selectpicker({
    liveSearch: true,
    showTick: true
  });
}

