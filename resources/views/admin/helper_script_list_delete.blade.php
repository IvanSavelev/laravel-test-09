<script>
  $(document).ready(function () {
    $('button[data-type=delete]').click(function () {
      listDelete();
      return false;
    });
  });

  function listDelete() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    var form_data = new FormData();
    var ids_delete = [];
    $('input:checkbox:checked').each(function () {
      ids_delete.push($(this).data('id'));
    });
    if (ids_delete.length <= 0) {
      alert("Выберете объекты для удаления.");
      return false;
    }
    var check = confirm("Вы уверены?");
    if (check === false) {
      return false;
    }

    form_data.append('ids_delete', ids_delete.join(","));
    $.ajax({
      data: form_data,
      type: "POST",
      url: '{{ url($url) }}',
      cache: false,
      contentType: false,
      processData: false,
      success: function () {
        $('input:checkbox:checked').each(function () {
          var table_row = $(this).closest('tr').remove();
        });
        alert("Удаление прошло успешно.");
      }
    });
  }

</script>