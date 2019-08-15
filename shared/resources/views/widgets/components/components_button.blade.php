@if($config['href'])
	<a href="{{ $config['href'] }}" class="{{ $config['class'] }} ">{!! $label !!}</a>
@else
	<button
		type="button"
		class="
		@switch($config['style'])
			@case('simple')
				sds-button simple mh-40px border-w-2
			@break
			@case('simple blue')
				sds-button blue simple mh-40px border-w-2
			@break
			@case('simple red')
				sds-button red simple mh-40px border-w-2
			@break
			@default
				{{ $config['style'] }}
			@break
		@endswitch
		@if($config['class']) {{$config['class']}} @endif "
	@if(!empty($config['ajax_url'])) data-ajax_url="{{ $config['ajax_url'] }}" @endif
		data-ajax_event="{{ $config['ajax_event'] }}"
	@if(!empty($config['ajax_dialog'])) data-ajax_dialog="{{ $config['ajax_dialog'] }}" @endif
		data-ajax_send_data="{{ json_encode($config['ajax_send_data']) }}"
		data-ajax_send_data_dom="{{ $config['ajax_send_data_dom'] }}"
		 {!! $config['custom_attribute'] !!}>
		{!! $label !!}
	</button>
@endif