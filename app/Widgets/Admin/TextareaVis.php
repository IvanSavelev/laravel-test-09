<?php

namespace App\Widgets\Admin;

use Arrilot\Widgets\AbstractWidget;

class TextareaVis extends AbstractWidget
{
	/**
	 * The configuration array.
	 *
	 * @var array
	 */
	protected $config = [
		'label' => 'Имя поля',
		'required' => false,
	];
	
	/**
	 * Treat this method as a controller action.
	 * Return view() or other content to display.
	 */
	public function run($object, $name, $errors)
	{
		$value = null;
		if (is_array($object)) { //It array (table key and value)
			if ($this->val($object, $name)) {
				if ($object[$name]->value) {
					$value = $object[$name]->value;
				}
			}
		} else { //It object
			if (isset($object->$name)) {
				$value = $object->$name;
			}
		}
		return view('widgets.admin.textarea_vis', [
			'config' => $this->config,
			'value' => $value,
			'errors' => $errors,
			'name' => $name,
		]);
	}
}
