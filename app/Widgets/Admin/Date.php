<?php

namespace App\Widgets\Admin;

use App\F;
use Arrilot\Widgets\AbstractWidget;

class Date extends AbstractWidget
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
			    if (!empty($object[$name])) {
				    $value = $object[$name];
			    }
		    }
	    } else { //It object
		    if (isset($object->$name)) {
			    $value = $object->$name;
		    }
	    }
	 
			if($value) {
				$date = date_create($value);
				$value  = date_format($date, 'd.m.Y');
			}
	    
	    return view('widgets.admin.date', [
		    'config' => $this->config,
		    'value' => $value,
		    'errors' => $errors,
		    'name' => $name,
	    ]);
    }
}
