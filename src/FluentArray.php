<?php

declare(strict_types=1);

namespace Adamkiss\FluentToolkit;

/**
 * FluentArray - Fluent extension for proper intelisense in IDEs
 *
 * @package   Kirby Fluent Toolkit
 * @author    Adam Kiss <iam@adamkiss.com>
 * @link      https://getkirby.com
 * @copyright Adam Kiss
 * @license   https://opensource.org/licenses/MIT
 *
 * TODO: Add @method calls for IDE understanding of the code
 */
class FluentArray extends Base
{
	use Macroable;

	public function value(): array
	{
		return $this->value;
	}
}
