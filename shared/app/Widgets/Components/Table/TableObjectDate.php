<?php

namespace Shared\App\Widgets\Components\Table;


class TableObjectDate extends TableObject
{

	function __construct(float $value_unix_time, $style = 'simple', string $method_type_event = 'simple', string $method_url = '', array $method_attribute = [])
	{
		parent::__construct($value_unix_time, 'date', $style, $method_type_event, $method_url, $method_attribute);
	}
}
