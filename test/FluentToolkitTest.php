<?php

$kirby = createKirby();

it('instantiates correct fluent classes', function() {
	// Proxy objects
	expect(fluent('test'))->toBeInstanceOf(\Adamkiss\FluentToolkit\FluentString::class);
	expect(fluent([]))->toBeInstanceOf(\Adamkiss\FluentToolkit\FluentArray::class);
	expect(fluent(new \Kirby\Toolkit\Collection([])))->toBeInstanceOf(\Adamkiss\FluentToolkit\FluentCollection::class);

	// Proxy of converted values
	expect(fluent(1))->toBeInstanceOf(\Adamkiss\FluentToolkit\FluentString::class);
	expect(fluent(new stdClass()))->toBeInstanceOf(\Adamkiss\FluentToolkit\FluentArray::class);
});

it('ignores non-supported types without error', function() {
	expect(fluent(true))->toBe(true);
	expect(fluent(null))->toBe(null);
});

it('supports short helper', function() {
	expect(f('test'))->toBeInstanceOf(\Adamkiss\FluentToolkit\FluentString::class);
	expect(f([]))->toBeInstanceOf(\Adamkiss\FluentToolkit\FluentArray::class);
});

it('can be converted to string', function() {
	expect(''. fluent('test'))->toBe('test');
	expect(''. fluent([]))->toBe('[]');

	// FluentCollection is castable to string because it extends Kirby\Toolkit\Collection
});
