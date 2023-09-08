<?php

declare(strict_types=1);

namespace Adamkiss\FluentToolkit;

use Kirby\Toolkit\Collection;
use Adamkiss\FluentToolkit\Macroable;

class FluentCollection extends Collection {
	use Macroable;

	/**
	 * Convert the collection to a FluentArray, with an optional map closure
	 */
	function toFluentArray(\Closure $map = null) : FluentArray {
		return new FluentArray($this->toArray($map));
	}

	/**
	 * Overloaded __call: try calling a macro first, THEN call the parent method
	 *
	 * @param string $key
	 * @param mixed $arguments
	 * @return mixed
	 */
	public function __call(string $key, $arguments)
	{
		if (isset(static::$macros[$key])) {
			return $this->_call_macro($key, $arguments);
		}

		return $this->__get($key);
	}

}
