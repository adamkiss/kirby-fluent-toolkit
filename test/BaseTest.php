<?php

$kirby = createKirby();

it('instantiates correct fluent classes', function() {
	expect(fluent('test'))->toBeInstanceOf(\Adamkiss\FluentToolkit\FluentString::class);
	expect(fluent([]))->toBeInstanceOf(\Adamkiss\FluentToolkit\FluentArray::class);
	expect(fluent(new \Kirby\Toolkit\Collection([])))->toBeInstanceOf(\Adamkiss\FluentToolkit\FluentCollection::class);
});

it('ignores non-supported types without error', function() {
	expect(fluent(1))->toBe(1);
	expect(fluent(true))->toBe(true);
	expect(fluent(null))->toBe(null);
	expect(fluent(new stdClass()))->toBeInstanceOf(stdClass::class);
});
