<?php

namespace Shared\App\Widgets\Form;

use Arrilot\Widgets\AbstractWidget;

/**
 * Class FormFields виджет возвращает html собранной формы
 *
 * @package Shared\App\Widgets
 */
class FormFields extends AbstractWidget
{

	protected $config = [

	];

	/**
	 * @param $fields_modal - массив  [ 'type'=> 'text', 'label'=>'Имя поля', 'name' => 'name_field', 'value' => 'val', 'config' => [] ], ...
	 *
	 * @return string html
	 */
	public static function getHTML(array $fields_modal): string
	{
		return viewShared('widgets.form.form_fields', [
			'fields_modal' => $fields_modal,
		]);
	}

	public function run($fields_modal)
	{
		return self::getHTML($fields_modal);
	}
}
