<?php

use Adamkiss\FluentToolkit\FluentArray;
use Adamkiss\FluentToolkit\FluentCollection;
use Adamkiss\FluentToolkit\FluentString;

$kirby = createKirby();

beforeEach(function() {
	FluentArray::$macros = [];
	FluentString::$macros = [];
	FluentCollection::$macros = [];
});

it ('supports custom methods', function() {
	FluentString::$macros['make_loud'] = fn() => $this->split(' ')->make_loud()->join(' ');
	FluentArray::$macros['make_loud']  = fn() => $this->map(fn($value) => strtoupper($value));
	FluentCollection::$macros['make_loud_array'] = fn () => $this->toFluentArray()->make_loud();

	expect(
		fluent('this is loud')
			->make_loud()
			->value()
	)->toBe('THIS IS LOUD');

	expect(
		fluent(['array', 'of', 'loud', 'words'])
			->make_loud()
			->value()
	)->toBe(['ARRAY', 'OF', 'LOUD', 'WORDS']);

	expect(
		collect(['collection', 'of', 'loud', 'words'])
			->make_loud_array()
			->value()
	)->toBe(['COLLECTION', 'OF', 'LOUD', 'WORDS']);
});

it ('supports custom methods with arguments', function() {

	FluentString::$macros['make'] = fn(string $state) => match($state) {
		'loud' => strtoupper($this->value),
		'quiet' => strtolower($this->value),
		default => $this->value,
	};

	expect(
		fluent('this is loud')
			->make('loud')
			->value()
	)->toBe('THIS IS LOUD');

	expect(
		fluent('THIS IS QUIET')
			->make('quiet')
			->value()
	)->toBe('this is quiet');

});
