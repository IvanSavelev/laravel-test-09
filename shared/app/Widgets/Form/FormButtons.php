<?php

namespace Shared\App\Widgets\Form;

use Arrilot\Widgets\AbstractWidget;

class FormButtons extends AbstractWidget
{
	protected $config = [

	];

	/**
	 *
	 * @return string html
	 */
	public static function getHTML(array $buttons): string
	{
		return viewShared('widgets.form.form_buttons', ['buttons' => $buttons,]);
	}

	public function run($fields_modal)
	{
		return self::getHTML($fields_modal);
	}
}
