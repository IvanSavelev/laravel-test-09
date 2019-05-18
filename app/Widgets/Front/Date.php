<?php

namespace App\Widgets\Front;

use App\F;
use Arrilot\Widgets\AbstractWidget;
use DateTime;

class Date extends AbstractWidget
{
	use F; //Plug-in universal functions
	
	
	/**
	 * The configuration array.
	 *
	 * @var array
	 */
	protected $config = [
		'format' => 'd F Y г.',
	];
	
	private function getMonth(string $month):string
	{
		$months_string_en = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		$months_string_ru = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
		$months_string = array_combine($months_string_en, $months_string_ru);
		return $this->replace_mask($month, $months_string);
	}
	/**
	 * Treat this method as a controller action.
	 * Return view() or other content to display.
	 */
	public function run($object, $name)
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
		if($value == null) {
			return '';
		}
		$DateTime = DateTime::createFromFormat('Y-m-d', $value);
		$date_string = $DateTime->format($this->config['format']);
		if(strpos($this->config['format'], 'F')!== false) {
			$date_string = $this->getMonth($date_string);
		}
		return $date_string;
	}
}
