$("button[data-type='add_field']").click(function () {
  var data = postAjax($(this).data('url'));
  $('#status_1').detach();                     //Удаляем старое модальное окно, если оно есть
  $('body').append(data);                      // Вставляем полученные данные на нашу страницу динамически
  $('#status_1').modal('show');                // Открываем только что вставленное модальное окно
});