<?php

namespace Shared\App\Widgets\Components;

use Arrilot\Widgets\AbstractWidget;

class Text extends AbstractWidget
{

	protected $config = [
		'label' => 'Имя поля',
		'required' => false,
		'type' => 'text',
		'errors' => [],
	];

	public function run($label, $name, $value)
	{
		return viewShared('widgets.components.components_text', [
			'config' => $this->config,
			'label' => $label,
			'name' => $name,
			'value' => $value,
		]);
	}
}
