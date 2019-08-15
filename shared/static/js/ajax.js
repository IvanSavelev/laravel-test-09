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
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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



/* ТЕГИ ДЛЯ КНОПОК КОТОРЫЕ ИСПОЛЬЗУЮТСЯ ДЛЯ AJAX ЗАПРОСОВ */
$("body").on('click', "[data-ajax_url]", function () {
    if($(this).data('ajax_dialog')) {
      if (!confirm($(this).data('ajax_dialog'))) {
        return false;
      }
    }

    var form_data = new FormData();

    if($(this).data('ajax_send_data')) {
      //Дополняем данные данными
      form_data.append('ajax_send_data', $(this).data('ajax_send_data'));
    }
    if($(this).data('ajax_send_data_dom')) {
      //Дополняем данные данными формы (либо нескольких форм, если массив)
      //TODO Доделать
      $parent_form = $(this).closest('form');
      form_data = new FormData($parent_form[0]);
    }


    $('.cssload-clock').show();
    var data = postAjax($(this).data('ajax_url'), form_data);
    $('.cssload-clock').hide();


    if($(this).data('ajax_event') === 'simple' || !$(this).data('ajax_event')) {
      //Возвращаем сообщение, больше ничего не меняем
    }
    if($(this).data('ajax_event') === 'modal_open') {
      //Возвращается html-код модальнго окна которое надо вставить в тело страницы и открыть
      ajaxEventModalOpen(data);

    }
    if($(this).data('ajax_event') === 'modal_close') {
      //Возвращаем сообщение, закрываем модальное окно
      ajaxEventModalClose(data);
    }
    if($(this).data('ajax_event') === 'modal_close_upload_all') {
      //Возвращаем сообщение, выводим ошибки в модальное окно, если их нет -  обновляем всю страницу
      ajaxEventModalCloseUploadAll(data);
    }
    if($(this).data('ajax_event') === 'upload_content') {
      //Обновляем всю область контента
    }
    if($(this).data('ajax_event') === 'upload_all') {
      //Обновляем всю страницу, помещаем сообщение
      ajaxEventUpdateAll(data);
    }
  });


/**
 * Код модальнго окна которое надо вставить в тело страницы и открыть
 */
function ajaxEventModalOpen(data) {
    $('#status_1').detach();
    $('body').append(data);
    $('#status_1').modal('show');
    uploadPlagins();//Нужно для того чтобы новые элементы которые появились, обработались плагинами (нормально отображался календарь, визивик и т. д.)
}


/**
 * Возвращаем сообщение, закрываем модальное окно
 */
function ajaxEventModalClose(data) {
  if (data.status == 'success') {
    $('#status_1').modal('hide'); //Скрываем модальное окно, если есть
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
}


/**
 * Возвращаем сообщение, закрываем модальное окно, делаем перезагрузку всей страницы
 */
function ajaxEventModalCloseUploadAll(data) {
  if (data.status == 'success') {
    $('.cssload-clock').show();
    location.reload();
  }
  if (data.status == 'error') {

    clearErrors();
    var errors = data.errors;
    $.each(errors, function (name_field, errors_for_field) {
      setErrorForField(name_field, errors_for_field);
    });

  }
}


/**
 * Код модальнго окна которое надо вставить в тело страницы и открыть
 */
function ajaxEventUpdateAll(data) {
  $('#status_1').detach();
  $('body').append(data);
  $('#status_1').modal('show');
  uploadPlagins();//Нужно для того чтобы новые элементы которые появились, обработались плагинами (нормально отображался календарь, визивик и т. д.)
}



function setErrorForField(name, error_text_array) {
    $.each(error_text_array, function (name_field, error_for_field) {
      setError(name, error_for_field);
    });
  }