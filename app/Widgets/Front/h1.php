<?php

namespace App\Widgets\Front;

use App\F;
use Arrilot\Widgets\AbstractWidget;

class h1 extends AbstractWidget
{
	use F; //Plug-in universal functions
	
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
    public function run($object)
    {
	    $h1 = '';
	    if (is_array($object)) { //It array (table key and value)
		    if ($this->val($object, 'h1')) {
			    $h1 =  $this->val($object, 'h1');
		    }
		    if ($this->val($object, 'title')) {
			    $h1 = $this->val($object, 'title');
		    }
	    } else { //It object
		    if (!empty($object->h1)) {
			    $h1 = $object->h1;
		    }
		    if (!empty($object->title)) {
			    $h1 = $object->title;
		    }
		    
	    }
	    return $h1;
    }
}
