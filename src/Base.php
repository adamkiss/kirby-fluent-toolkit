<?php

declare(strict_types=1);

namespace Adamkiss\FluentToolkit;

use Kirby\Toolkit\A;
use Kirby\Toolkit\Str;

use Adamkiss\FluentToolkit\FluentArray;
use Adamkiss\FluentToolkit\FluentString;

class Base {
	public $value = null;

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
		switch (true) {
			case $this instanceof FluentArray:
				if (method_exists(A::class, $name)) {
					$new_value = A::{$name}($this->value, ...$arguments);
					break;
				}

				$new_value = $this->_call_macro($name, $arguments);
				break;

			case $this instanceof FluentString:
				if (method_exists(Str::class, $name)) {
					$new_value = Str::{$name}($this->value, ...$arguments);
					break;
				}

				$new_value = $this->_call_macro($name, $arguments);
				break;

			default:
				throw new \Error($this::class . ": Method {$name} does not exist.");
				break;
		}

		return FluentToolkit::return($new_value);
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
