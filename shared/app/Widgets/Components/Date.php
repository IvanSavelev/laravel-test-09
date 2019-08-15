<?php

namespace Shared\App\Widgets\Components;

use Arrilot\Widgets\AbstractWidget;
use Shared\App as Shared;
class Date extends AbstractWidget
{
	protected $config = [
		'label' => 'Имя поля',
		'required' => false,
		'type' => 'text',
		'format_date' => false,
		'error' => [],
	];

	public function run($label, $name, $value)
	{
		if (!$this->config['format_date']) {
			$this->config['format_date'] = env('DATETIME_FORMAT');
		}
		$this->config['format_date']  = Shared\Date::convertPhpToJsMomentFormat($this->config['format_date']);

		return viewShared('widgets.components.components_date', [
			'config' => $this->config,
			'label' => $label,
			'name' => $name,
			'value' => $value,
		]);
	}
}
