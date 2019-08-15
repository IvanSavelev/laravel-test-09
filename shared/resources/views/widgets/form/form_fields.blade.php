@foreach ($fields_modal as $key => $item)
		@widget('components.' . $item['type'], $item['config'], $item['label'], $item['name'], $item['value'])
@endforeach