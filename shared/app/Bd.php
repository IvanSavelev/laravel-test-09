<?php

namespace Shared\App;


use Exception;

class Bd
{

	/**
	 * Убирает кавычки
	 *
	 * @param string $GUID
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function normGUID(string $GUID): string
	{
		if (!$GUID) {
			throw new Exception('GUID is null!');
		}
		$GUID = preg_replace('/^{|}$/', '', $GUID);
		return $GUID;
	}


	/**
	 * Убирает кавычки, не вызывает ошибку при пустом входящем значении
	 *
	 * @param string $GUID
	 *
	 * @return string
	 */
	public static function normGUIDSoft(string $GUID): string
	{
		if (!$GUID) {
			return $GUID;
		}
		$GUID = preg_replace('/^{|}$/', '', $GUID);
		return $GUID;
	}


	/**
	 * Возвращает время в формате unix, из данных API
	 * @param string $datetime
	 *
	 * @return float|null
	 */
	public static function getUNIXFromDateTimeOrNow(string $datetime):?float {
		if(!$datetime) {
			return time();
		}
		$date = date_create_from_format(env('API_DATETIME_FORMAT'), $datetime);
		if(!$date) {
			return null;
		}
		$timestamp = $date->getTimestamp();
		return $timestamp;
	}


	/**
	 * Преобразует в формат принимаемый MSSQL сервером
	 * @param string $datetime
	 *
	 * @return null|string
	 */
	public static function getAPIDateTimeFromDataTimeInput(string $datetime):?string {
		if(!$datetime) {
			return null;
		}
		$datetime_format = env('DATETIME_FORMAT');
		$date = date_create_from_format($datetime_format, $datetime);
		$datetime_format_api = 'Y-m-d\TG:i:s';
		$datetime_api = $date->format($datetime_format_api);
		return $datetime_api;
	}

}