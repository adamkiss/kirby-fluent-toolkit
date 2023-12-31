<?php

use Kirby\Cms\App;
use Adamkiss\FluentToolkit\FluentToolkit;
use Adamkiss\FluentToolkit\FluentCollection;

load([
	'adamkiss\\fluenttoolkit\\base'             => __DIR__ . '/src/Base.php',
	'adamkiss\\fluenttoolkit\\fluenttoolkit'      => __DIR__ . '/src/FluentToolkit.php',
	'adamkiss\\fluenttoolkit\\fluentarray'      => __DIR__ . '/src/FluentArray.php',
	'adamkiss\\fluenttoolkit\\fluentstring'     => __DIR__ . '/src/FluentString.php',
	'adamkiss\\fluenttoolkit\\fluentcollection' => __DIR__ . '/src/FluentCollection.php',
	'adamkiss\\fluenttoolkit\\macroable'        => __DIR__ . '/src/Macroable.php',
]);

App::plugin('adamkiss/kirby-fluent-toolkit', []);

if (! function_exists('fluent') && (defined('KIRBY_HELPER_FLUENT') !== true || constant('KIRBY_HELPER_FLUENT') === false)) {
	function fluent(mixed $value): mixed
	{
		return FluentToolkit::make($value);
	}
}

if (! function_exists('collect') && (defined('KIRBY_HELPER_COLLECT') !== true || constant('KIRBY_HELPER_COLLECT') === false)) {
	function collect(mixed $value): mixed
	{
		return new FluentCollection($value);
	}
}

if (! function_exists('f') && (defined('KIRBY_HELPER_F') !== true || constant('KIRBY_HELPER_F') === false)) {
	function f(mixed $value): mixed
	{
		return FluentToolkit::make($value);
	}
}
