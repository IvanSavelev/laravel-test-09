<?php

namespace Shared\App\Widgets\Helpers;

use Arrilot\Widgets\AbstractWidget;


class Date extends AbstractWidget
{

	protected $config = [
		'format_date' => false,
	];


	public function run($date_unix)
	{
		if (!$this->config['format_date']) {
			$this->config['format_date'] = env('DATETIME_FORMAT');
		}
		$date = date($this->config['format_date'], $date_unix);
		return $date;
	}




}
