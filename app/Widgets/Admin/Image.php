<?php

namespace App\Widgets\Admin;

use App\F;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Illuminate\Http\File;


class Image extends AbstractWidget
{
	use F; //Plug-in universal functions
	/**
	 * The configuration array.
	 *
	 * @var array
	 */
	protected $config = [
		'label' => 'Имя поля',
		'required' => false,
		'size' => '90x90',
		'delete' => false,
	];
	
	/**
	 * Treat this method as a controller action.
	 * Return view() or other content to display.
	 */
	public function run($object, $name)
	{
		$src_image = null;
		$src = null;
		if(is_array($object)) { //Это массив объектов (таблицы ключ значение)
			if($this->val($object, $name)) {
				if(!empty($object[$name])){
					$src = $object[$name];
				}
			}
		} else { //Это объект
			if(isset($object->$name)) {
				$src = $object->$name;
			}
		}
		
		if($src) {
			$src = str_replace('/storage', '', $src);
			$exists = Storage::disk('public')->exists($src); //Is file original
			if($exists) {
				$src_thumbnail = \preg_replace('/(?:[.])(?=[^.]+$)/', '.' . $this->config['size'] . '.', $src);
				$exists_thumb = Storage::disk('public')->exists($src_thumbnail);
				if(!$exists_thumb) {
					$manager = new ImageManager(array('driver' => 'imagick'));
					$size = explode('x', $this->config['size']);
					$image_original = Storage::disk('public')->url($src);
					$image = $manager->make($image_original)->resize((int)$size[0], (int)$size[1]);
					Storage::disk('public')->put($src_thumbnail, $image->encode());
				}
				$src_image = '/storage' . $src_thumbnail; //Very good
			}
		}
		
		return view('widgets.admin.image', [
			'src' => $src_image,
			'config' => $this->config,
			'name' => $name,
		]);
	}
}
