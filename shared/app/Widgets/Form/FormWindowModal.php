<?php

namespace Shared\App\Widgets\Form;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Http\Request;

class FormWindowModal extends AbstractWidget
{ //TODO Нет реализации для шаблона



	protected $body_html = '';
	protected $footer_html = '';
	protected $save = false;

	protected $config = [
		'class_size' => 'modal-md',
		'title' => '',
	];

	public function setConfig(array $config): void
	{
		$this->config = $config + $this->config;
	}

	public function setBody(string $body_html)
	{
		$this->body_html = $body_html;
		return $this;
	}

	public function setFooter(string $footer_html)
	{
		$this->footer_html = $footer_html;
		return $this;
	}


	public function run()
	{
		//
		return viewShared('widgets.form.form_window_modal', [
			'config' => $this->config,
			'save' => $this->save,
		]);
	}

	public function getHTML()
	{

		$html = viewShared('widgets.form.form_window_modal', [
			'body_html' => $this->body_html,
			'footer_html' => $this->footer_html,
			'config' => $this->config,
			'save' => $this->save,
		])->render();
		return $html;
	}

}
