<?php

namespace App\Widgets\Admin;

use Arrilot\Widgets\AbstractWidget;

class Header extends AbstractWidget
{
	/**
	 * The configuration array.
	 *
	 * @var array
	 */
	protected $config = [];
	
	/**
	 * Treat this method as a controller action.
	 * Return view() or other content to display.
	 */
	public function run($text)
	{
		if($text === '') {
			return "</br></br>";
		}
		return "<h3 class='py-3'>$text</h3>";
	}
}
