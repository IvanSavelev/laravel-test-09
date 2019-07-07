<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $table = 'settings';
	protected $primaryKey = 'setting_id';
	protected $fillable = ['key', 'value'];
	
	public static function getField(string $name):?array
	{
		$settings = Setting::where('key', $name)->first();
		if($settings) {
			$settings = json_decode($settings->value, true);
		}
		return $settings;
	}
}
