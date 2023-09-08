<?php

declare(strict_types=1);

namespace Adamkiss\FluentToolkit;

use Kirby\Toolkit\Collection;

class FluentToolkit {
	/**
	 * Create a new fluent instance
	 */
	public static function make(mixed $value): mixed {
		return FluentToolkit::return($value);
	}

	/**
	 * Return correct fluent class for a $value
	 */
	public static function return(mixed $value): mixed {
		return match (true) {
			is_array($value) => new FluentArray($value),
			is_string($value) => new FluentString($value),
			is_a($value, Collection::class) => new FluentCollection($value->toArray()),
			default => $value,
		};
	}

	/**
	 * Adds a macro to all fluent classes
	 */
	public static function macro(string $name, \Closure $method): void {
		FluentArray::$macros[$name] = $method;
		FluentString::$macros[$name] = $method;
		FluentCollection::$macros[$name] = $method;
	}
}
