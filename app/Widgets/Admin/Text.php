<?php

namespace App\Widgets\Admin;

use App\F;
use Arrilot\Widgets\AbstractWidget;

class Text extends AbstractWidget
{
	
	use F; //Plug-in universal functions
	/**
	 * The configuration array.
	 *
	 * @var array
	 */
	protected $config = [
		'label' => 'Имя поля',
		'required' => false,
		'format' => '',
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
		//Format
		if($value !== null and $this->config['format']) {
			$value = number_format($value, 2, '.', ' ');
		}
		
		
		return view('widgets.admin.text', [
			'config' => $this->config,
			'value' => $value,
			'errors' => $errors,
			'name' => $name,
		]);
	}
}
