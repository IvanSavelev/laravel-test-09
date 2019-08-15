<?php

namespace Shared\App\Widgets\Components;

use Arrilot\Widgets\AbstractWidget;

class Hidden extends AbstractWidget
{

	protected $config = [
		'label' => 'Имя поля',
		'errors' => [],
	];

	public function run($label, $name, $value)
	{
		return viewShared('widgets.components.components_hidden', [
			'config' => $this->config,
			'label' => $label,
			'name' => $name,
			'value' => $value,
		]);
	}
}
