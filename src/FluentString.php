<?php

declare(strict_types=1);

namespace Adamkiss\FluentToolkit;

/**
 * Fluent interface for Kirby Toolkit Str class
 *
 * @package   Kirby Fluent Toolkit
 * @author    Adam Kiss <iam@adamkiss.com>
 * @link      https://getkirby.com
 * @copyright Adam Kiss
 * @license   https://opensource.org/licenses/MIT
 *
 * @method \Adamkiss\FluentToolkit\FluentArray accepted() Parse accepted values and their quality from an accept string like an Accept or Accept-Language header
 * @method \Adamkiss\FluentToolkit\FluentString after(string $needle, bool $caseInsensitive = false)
 * @method \Adamkiss\FluentToolkit\FluentString afterStart(string $needle, bool $caseInsensitive = false)
 * @method \Adamkiss\FluentToolkit\FluentString ascii()
 * @method \Adamkiss\FluentToolkit\FluentString before(string $needle, bool $caseInsensitive = false)
 * @method \Adamkiss\FluentToolkit\FluentString beforeEnd(string $needle, bool $caseInsensitive = false)
 * @method \Adamkiss\FluentToolkit\FluentString between(string $start, string $end)
 * @method \Adamkiss\FluentToolkit\FluentString camel(string $value = null)
 * @method \Adamkiss\FluentToolkit\FluentString contains(string $needle, bool $caseInsensitive = false)
 * @method \Adamkiss\FluentToolkit\FluentString date(int|null $time = null, string|IntlDateFormatter $format = null, string $handler = 'date')
 * @method \Adamkiss\FluentToolkit\FluentString convert(string $targetEncoding, string $sourceEncoding = null)
 * @method \Adamkiss\FluentToolkit\FluentString encode()
 * @method \Adamkiss\FluentToolkit\FluentString encoding()
 * @method \Adamkiss\FluentToolkit\FluentString endsWith(string $needle, bool $caseInsensitive = false)
 * @method \Adamkiss\FluentToolkit\FluentString esc(string $context = 'html')
 * @method \Adamkiss\FluentToolkit\FluentString excerpt($string, $chars = 140, $strip = true, $rep = ' …')
 * @method \Adamkiss\FluentToolkit\FluentString float(string|int|float|null $value)
 * @method \Adamkiss\FluentToolkit\FluentString from(string $needle, bool $caseInsensitive = false)
 * @method \Adamkiss\FluentToolkit\FluentString increment(string $separator = '-', int $first = 1)
 * @method \Adamkiss\FluentToolkit\FluentString kebab(string $value = null)
 * @method int length()
 * @method \Adamkiss\FluentToolkit\FluentString lower()
 * @method \Adamkiss\FluentToolkit\FluentString ltrim(string $trim = ' ')
 * @method \Adamkiss\FluentToolkit\FluentString pool(string|array $type, bool $array = true)
 * @method \Adamkiss\FluentToolkit\FluentString position(string $needle, bool $caseInsensitive = false)
 * @method \Adamkiss\FluentToolkit\FluentString query(string $query, array $data = [])
 * @method \Adamkiss\FluentToolkit\FluentString random(int $length = null, string $type = 'alphaNum')
 * @method \Adamkiss\FluentToolkit\FluentString replace($string, $search, $replace, $limit = -1)
 * @method \Adamkiss\FluentToolkit\FluentString replacements($search, $replace, $limit)
 * @method \Adamkiss\FluentToolkit\FluentString replaceReplacements(array $replacements)
 * @method \Adamkiss\FluentToolkit\FluentString rtrim(string $trim = ' ')
 * @method \Adamkiss\FluentToolkit\FluentString short(int $length = 0, string $appendix = '…')
 * @method \Adamkiss\FluentToolkit\FluentString similarity(string $first, string $second, bool $caseInsensitive = false)
 * @method \Adamkiss\FluentToolkit\FluentString snake(string $value = null, string $delimiter = '_')
 * @method \Adamkiss\FluentToolkit\FluentArray split(string|array|null $string, string $separator = ',', int $length = 1)
 * @method \Adamkiss\FluentToolkit\FluentString startsWith(string $needle, bool $caseInsensitive = false)
 * @method \Adamkiss\FluentToolkit\FluentString studly(string $value = null)
 * @method \Adamkiss\FluentToolkit\FluentString substr(int $start = 0, int $length = null)
 * @method \Adamkiss\FluentToolkit\FluentString toBytes(string $size)
 * @method \Adamkiss\FluentToolkit\FluentString toType($string, $type)
 * @method \Adamkiss\FluentToolkit\FluentString trim(string $trim = ' ')
 * @method \Adamkiss\FluentToolkit\FluentString ucfirst()
 * @method \Adamkiss\FluentToolkit\FluentString ucwords()
 * @method \Adamkiss\FluentToolkit\FluentString unhtml()
 * @method \Adamkiss\FluentToolkit\FluentString until(string $needle, bool $caseInsensitive = false)
 * @method \Adamkiss\FluentToolkit\FluentString upper()
 * @method \Adamkiss\FluentToolkit\FluentString uuid()
 * @method \Adamkiss\FluentToolkit\FluentString widont()
 * @method \Adamkiss\FluentToolkit\FluentString wrap(string $before, string $after = null)
 */
class FluentString extends Base {
	use Macroable;

	/**
	 * Returns the internal value
	 */
	public function value(): string
	{
		return $this->value;
	}

	/**
	 * Support for conversion to string
	 */
	public function __toString(): string
	{
		return $this->value;
	}
}
