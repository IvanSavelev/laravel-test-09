<?php

namespace Shared\App\Widgets\Components\Table;

use Arrilot\Widgets\AbstractWidget;

class Table extends AbstractWidget
{
	protected $config = [
		'type' => 'simple',
		'caption' => true,
	];

	public function run(array $table)
	{
		if ($this->config['caption']) {
			$columns = array_shift($table);
		} else {
			$columns = [];
		}

		return viewShared('widgets.components.table.table', [
			'config' => $this->config,
			'columns' => $columns,
			'table_body' => $table,
		]);
	}
}
