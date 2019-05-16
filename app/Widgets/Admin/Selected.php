<?php

namespace App\Widgets\Admin;

use Arrilot\Widgets\AbstractWidget;

class Selected extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
	protected $config = [
		'label' => 'Имя поля',
		'required' => false,
		'type' => 'categories',
	];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
	    if($this->config['type'] == 'products') {
		    //$objects = $this->getProducts($name);
	    }

        return view('widgets.admin.selected', [
            'config' => $this->config,
        ]);
    }
    
    
}
