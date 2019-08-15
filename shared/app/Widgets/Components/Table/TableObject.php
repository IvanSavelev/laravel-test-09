<?php

namespace Shared\App\Widgets\Components\Table;


abstract class TableObject
{
	protected $value = '';
	protected $type_view = 'text'; //text, checkbox, date
	protected $style = ''; //simple, modal
	protected $method_type_event = 'simple'; //simple, modal
	protected $method_url = '';
	protected $method_attribute = '';


  function __construct($value, string $type_view, $style = 'simple', string $method_type_event = 'simple', string $method_url = '', array $method_attribute = [])
	{
		$this->value = $value;
		$this->type_view = $type_view;
		$this->style = $style;
		$this->setMethod($method_type_event, $method_url, $method_attribute);
	}

  public function setMethod(string $method_type_event, string $method_url = '', array $method_attribute = []):void
  {
    $this->method_type_event =  $method_type_event;
    $this->method_url = $method_url;
    $method_attribute = serialize($method_attribute);
		$this->method_attribute = $method_attribute;
  }

  public function getMethodTypeEvent(): string
  {
    return $this->method_type_event;
  }

  public function getMethodUrl(): string
  {
    return $this->method_url;
  }

  public function getMethodAttribute(): string
  {
    return $this->method_attribute;
  }

	public function getValue(): string
	{
		return $this->value;
	}

	public function getTypeView()
	{
		return $this->type_view;
	}

	public function getStyle(): string
	{
		return $this->style;
	}

}
