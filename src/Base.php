<?php

declare(strict_types=1);

namespace Adamkiss\FluentToolkit;

use Kirby\Toolkit\A;
use Kirby\Toolkit\Str;
use Kirby\Toolkit\Collection;

use Adamkiss\FluentToolkit\FluentArray;
use Adamkiss\FluentToolkit\FluentString;
use Adamkiss\FluentToolkit\FluentCollection;

class Base {
	protected $value = null;

	public function __construct($value = null) {
		$this->value = $value;
	}

	/**
	 * Proxy for all instance calls
	 *
	 * @param string $name
	 * @param array $arguments
	 * @return mixed
	 */
	public function __call(string $name, array $arguments): mixed
	{
		ray()->limit(10)->send($this, $name, $arguments);

		switch (true) {
			case $this instanceof FluentArray:
				if (method_exists(A::class, $name)) {
					$return = A::{$name}($this->value, ...$arguments);
					break;
				}

				$return = $this->_call_macro($name, $arguments);
				break;

			case $this instanceof FluentString:
				if (method_exists(Str::class, $name)) {
					$return = Str::{$name}($this->value, ...$arguments);
					break;
				}

				$return = $this->_call_macro($name, $arguments);
				break;

			default:
				throw new \Error($this::class . ": Method {$name} does not exist.");
				break;
		}

		return static::_fluent_return($return);
	}

	/**
	 * Return correct fluent class for new $value
	 */
	private static function _fluent_return(mixed $value): mixed {
		return match (true) {
			is_array($value) => new FluentArray($value),
			is_string($value) => new FluentString($value),
			is_a($value, Collection::class) => new FluentCollection($value->toArray()),
			default => $value,
		};
	}

	/**
	 * Create a new fluent instance
	 */
	public static function _fluent_make(mixed $value): mixed {
		return self::_fluent_return($value);
	}

	/**
	 * Gives access to self and the returns self without change
	 */
	public function tap(callable $callback): self
	{
		$callback($this);
		return $this;
	}

	/**
	 * Returns the internal value of the fluent instance
	 */
	public function value(): mixed
	{
		return $this->value;
	}
}
