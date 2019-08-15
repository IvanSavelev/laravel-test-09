<?php

namespace Shared\App\Widgets\Components\Table;


class TableObjectCheckbox extends TableObject
{
	function __construct(bool $value, $style = 'simple', string $method_type_event = 'simple', string $method_url = '', array $method_attribute = [])
	{
		parent::__construct($value, 'checkbox', $style, $method_type_event, $method_url, $method_attribute);
	}
}
