<?php

if (!function_exists('viewShared')) {

	/**
	 * Возвращает ресурсы из shared, а не из resources
	 *
	 * @param  string $view
	 * @param  array $data
	 *
	 * @return \Illuminate\Contracts\View\View
	 */
	function viewShared($view = null, $data = [])
	{
		$path = str_replace('.', '/', $view);
		$path = base_path('shared/resources/views/' . $path . '.blade.php');
		$view = view()->file($path, $data);
		return $view;
	}
}