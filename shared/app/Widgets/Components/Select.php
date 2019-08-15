<?php

namespace Shared\App\Widgets\Components;

use Arrilot\Widgets\AbstractWidget;

class Select extends AbstractWidget
{

	protected $config = [
		'label' => 'Имя поля',
		'required' => false,
	];


	public function run($label, $name, $value)
	{
		return viewShared('widgets.components.components_select', [
			'config' => $this->config,
			'label' => $label,
			'name' => $name,
			'value' => $value,
		]);
	}
}
