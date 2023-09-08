<?php

declare(strict_types=1);

namespace Adamkiss\FluentToolkit;

/**
 * Fluent interface for Kirby Toolkit A class
 *
 * @package   Kirby Fluent Toolkit
 * @author    Adam Kiss <iam@adamkiss.com>
 * @link      https://getkirby.com
 * @copyright Adam Kiss
 * @license   https://opensource.org/licenses/MIT
 *
 * @method FluentArray append(array $append) Append one or more arrays
 * @method FluentArray apply(...$args) Recursively loops through the array and resolves any item defined as `Closure`, applying the passed parameters
 * @method int count() Count the number of items in the array
 * @method mixed get(string|int|array|null $key, $default = null) Get a value from the array
 * @method bool has($value, bool $strict = false) Check if the array has a value
 * @method FluentString join(string $separator = ', ') Join all items together
 * @method FluentArray keyBy(string|callable $keyBy) Makes the array associative by the given key
 * @method FluentArray merge(array|int ...$arrays) Merge one or more arrays
 * @method FluentArray pluck(string $key) Pluck a single column from the array
 * @method FluentArray prepend(array $prepend) Prepends given arrays
 * @method mixed reduce(callable $callback, $initial = null) Reduce the array to a single value
 * @method FluentArray shuffle() Shuffle the array
 * @method FluentArray slice(int $offset, int $length = null, bool $preserveKeys = false) Returns a slice of the array
 * @method int|float sum() Calculate the sum of all items
 * @method mixed first() Get the first item in the array
 * @method mixed last() Get the last item in the array
 * @method FluentArray random(int $count = 1, bool $shuffle = false) Get one or more random items from the array, optionally in a shuffled order
 * @method FluentArray fill(int $limit, $fill = 'placeholder') Fill the array up to a given limit with a given value
 * @method FluentArray map(callable $map) A simple wrapper around array_map with a sane argument order
 * @method FluentArray move(int $from, int $to) Move an array item to a new index
 * @method FluentArray missing(array $required = []) Checks for missing elements in an array
 * @method FluentArray nest(array $ignore = []) Normalizes an array into a nested form by converting dot notation in keys to nested structures
 * @method FluentArray nestByKeys($value, array $keys)
 * @method FluentArray sort(string $field, string $direction = 'desc', $method = SORT_REGULAR)
 * @method bool isAssociative()
 * @method float|null average(int $decimals = 0)
 * @method FluentArray extend(array ...$arrays)
 * @method FluentArray update(array $update)
 * @method FluentArray wrap($array = null)
 * @method FluentArray filter(callable $callback)
 * @method FluentArray without(int|string|array $keys)
 */
class FluentArray extends Base
{
	use Macroable;

	/**
	 * Returns the internal value
	 */
	public function value(): array
	{
		return $this->value;
	}

	/**
	 * Support for conversion to string
	 */
	public function __toString(): string
	{
		return $this->join(', ')->wrap('[', ']')->value();
	}
}
