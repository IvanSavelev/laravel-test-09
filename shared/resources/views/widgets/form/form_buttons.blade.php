@foreach ($buttons as $key => $item)
		@widget('components.button', $item['config'], $item['label'])
@endforeach