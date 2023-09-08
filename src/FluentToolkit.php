<?php

declare(strict_types=1);

namespace Adamkiss\FluentToolkit;

use Kirby\Toolkit\Collection;
use stdClass;

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
			// wrapping of native types
			is_array($value) => new FluentArray($value),
			is_string($value) => new FluentString($value),

			// wrapping of Kirby Toolkit classes
			is_a($value, Collection::class) => new FluentCollection($value->toArray()),

			// wrapping and conversion of native types
			is_int($value) || is_float($value) => new FluentString((string) $value),
			is_a($value, stdClass::class) => new FluentArray((array) $value),

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
