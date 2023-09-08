<?php

declare(strict_types=1);

namespace Adamkiss\FluentToolkit;

trait Macroable {
	public static $macros = [];

	/**
	 * Try calling a macro method, otherwise throw an error
	 */
	protected function _call_macro(string $name, array $arguments = []): mixed {
		$method = static::$macros[$name] ?? null;

		if (! $method instanceof \Closure) {
			throw new \BadMethodCallException($this::class . ": Macro {$name} does not exist.");
		}

		return call_user_func_array(
			\Closure::bind($method, $this, get_class()),
			$arguments
		);
	}
}
