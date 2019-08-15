<?php

namespace Shared\App\Widgets\Components\Table;


class TableObjectText extends TableObject
{
	function __construct($value, $style = 'simple', string $method_type_event = 'simple', string $method_url = '', array $method_attribute = [])
	{
		parent::__construct($value, 'text', $style, $method_type_event, $method_url, $method_attribute);
	}
}
