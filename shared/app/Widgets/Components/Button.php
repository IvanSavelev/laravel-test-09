<?php

namespace Shared\App\Widgets\Components;

use Arrilot\Widgets\AbstractWidget;

class Button extends AbstractWidget
{
  protected $config = [
    'class' => '',
    'style' => 'simple',
    'href' => null,
    'ajax_url' => false,
    'ajax_event' => '',
    'ajax_dialog' => false,
    'ajax_send_data' => [], //form, modal
    'ajax_send_data_dom' => false, //form, modal


    'custom_attribute' => "",
  ];

  public function run($label)
	{
			return viewShared('widgets.components.components_button', [
				'config' => $this->config,
				'label' => $label,
			]);
	}
}
