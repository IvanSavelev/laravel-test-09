<?php

namespace Shared\Core;

use Countable;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Contracts\Translation\Loader;
use Illuminate\Support\NamespacedItemResolver;
use Illuminate\Contracts\Translation\Translator as TranslatorContract;
use Illuminate\Translation\MessageSelector;
use Illuminate\Translation\Translator;

class TranslatorShared extends Translator implements TranslatorContract
{


	/**
	 * Load the specified language group.
	 *
	 * @param  string $namespace
	 * @param  string $group
	 * @param  string $locale
	 *
	 * @return void
	 * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
	 */
    public function load($namespace, $group, $locale)
    {
        if ($this->isLoaded($namespace, $group, $locale)) {
            return;
        }

        // The loader is responsible for returning the array of language lines for the
        // given namespace, group, and locale. We'll set the lines in this array of
        // lines that have already been loaded so that we can easily access them.
        $lines = $this->loader->load($locale, $group, $namespace);

        $path = base_path('shared/resources/lang/ru/validation.php');
        $filesystem = new Filesystem();
        if ($filesystem->exists($path)) {
            $shared_locate = $filesystem->getRequire($path);
        }
        $lines_all = array_merge($shared_locate, $lines);

        $this->loaded[$namespace][$group][$locale] = $lines_all;
    }


}
