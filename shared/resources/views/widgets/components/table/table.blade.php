<div class="table-responsive" id="table-responsive-scroll">
  <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
    aria-describedby="dataTable_info" style="width: 100%;">
    {{-- Заголовок таблицы --}}
    @if($columns)
      <thead>
      <tr role="row" class="table-header">
        @foreach($columns as $key => $column)
          <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending"
            aria-label="Name: activate to sort column descending" style="width: 240px;">{{ $column->getValue() }}
          </th>
        @endforeach
      </tr>
      </thead>
    @endif
    {{-- Тело таблицы --}}
    <tbody>
    @foreach($table_body as $f_key => $field)
      <tr role="row" class="@if ($f_key == 0) first @endif">
        @foreach($field as $c_key => $field_row)
          <td
            {{-- стиль --}}
            class="table-item
            @switch($field_row->getStyle())
              @case('simple')
                simple
              @break
              @case('modal')
                modal
              @break
              @default
                {{ $field_row->getStyle() }}
              @break
            @endswitch
            " @if ($f_key == 0) id="th_{{ $c_key + 1}}"  @endif
            {{-- параметры для отработки события клика --}}
            @if($field_row->getMethodUrl())
              data-ajax_url="{{ $field_row->getMethodUrl() }}"
              data-ajax_send_data="{{ $field_row->getMethodAttribute() }}"
              data-ajax_event=@if($field_row->getMethodTypeEvent() == 'simple') "simple" @endif @if($field_row->getMethodTypeEvent() == 'modal') "modal_open" @endif
            @endif>
            <div class="">
              {{-- разный вывод в зависимости от типа вида --}}
              <div class="m-1 @if($field_row->getTypeView() == 'checkbox') fa fa-check checkbox @if($field_row->getValue())  active @endif @endif">
                @if($field_row->getTypeView() == 'text'){{ $field_row->getValue() }}@endif
                @if($field_row->getTypeView() == 'date')@widget('helpers.date', [], $field_row->getValue())@endif
              </div>
            </div>

          </td>
        @endforeach
      </tr>
    @endforeach
    </tbody>

  </table>
</div>
</div>



