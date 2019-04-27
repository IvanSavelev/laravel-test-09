<?php

namespace App;


trait Fun
{
	/**
	 * shorthand for retrieving and casting optional array keys
	 * @param array $arr input array
	 * @param int|string|array $key key within array, or array of consecutive keys for nested arrays
	 * @param string $type type to cast result to (empty string to skip this), default value is never cast
	 * @param mixed $default value to return if $arr does not contain $key or $arr[$key] is null
	 * @return mixed $arr[$key] cast to $type or $default if $arr[$key] is not set or $arr is not an array
	 */
	function val($arr, $key, $type = '', $default = false)
	{
		if (\is_array($key) and !empty($key)) {
			$last_key = \array_pop($key);
			foreach ($key as $k) {
				if (!isset($arr[$k])) {
					$arr = null;
					break;
				}
				$arr = $arr[$k];
			}
			$key = $last_key;
		}
		if (!\is_array($arr) or \is_array($key) or !isset($arr[$key])) {
			if ($type === 'array' and $default === false) return array();
			return $default;
		}
		if (!$type) return $arr[$key];
		$res = $arr[$key];
		if ($type === 'array') return to_array($res);
		\settype($res, $type);
		return $res;
	}
	
	/**
	 * reindex array of arrays using field value as key
	 * @param array $array input
	 * @param string $key column name to use as key (false to preserve keys)
	 * @param bool|string $val column name to use as value (false to use whole row)
	 * @param bool $group return arrays of matched rows instead of one row per key
	 * return array reindexed array
	 */
	function reindex(array $array, $key, $val = false, $group = false)
	{
		$res = array();
		foreach ($array as $old_key => $item) {
			if ($key === false) {
				$item_key = $old_key;
			} elseif (!isset($item[$key])) {
				if (!$group) {
					\trigger_error("Undefined key '$key' for offset $old_key");
					continue;
				}
				$item_key = '';
			} else {
				$item_key = $item[$key];
			}
			$item_val = $val === false ? $item : $item[$val];
			if ($group) {
				$res[$item_key][] = $item_val;
			} else {
				$res[$item_key] = $item_val;
			}
		}
		return $res;
	}
}
