<?php

use Adamkiss\FluentToolkit\Base;
use Adamkiss\FluentToolkit\FluentArray;
use Adamkiss\FluentToolkit\FluentCollection;
use Adamkiss\FluentToolkit\FluentString;
use Adamkiss\FluentToolkit\FluentToolkit;

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

describe('custom methods with arguments', function() {
	test('strings', function() {
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

	test('arrays', function() {
		FluentArray::$macros['make'] = fn(string $state) => match($state) {
			'loud' => $this->map(fn($value) => strtoupper($value)),
			'quiet' => $this->map(fn($value) => strtolower($value)),
			default => $this->value,
		};

		expect(
			fluent(['array', 'of', 'loud', 'words'])
				->make('loud')
				->value()
		)->toBe(['ARRAY', 'OF', 'LOUD', 'WORDS']);

		expect(
			fluent(['ARRAY', 'OF', 'QUIET', 'WORDS'])
				->make('quiet')
				->value()
		)->toBe(['array', 'of', 'quiet', 'words']);
	});

	test('collections', function() {
		FluentCollection::$macros['make'] = fn(string $state) => match($state) {
			'loud' => $this->map(fn($value) => strtoupper($value)),
			'quiet' => $this->map(fn($value) => strtolower($value)),
			default => $this->value,
		};

		expect(
			collect(['collection', 'of', 'loud', 'words'])
				->make('loud')
				->toArray()
		)->toBe(['COLLECTION', 'OF', 'LOUD', 'WORDS']);

		expect(
			collect(['COLLECTION', 'OF', 'QUIET', 'WORDS'])
				->make('quiet')
				->toArray()
		)->toBe(['collection', 'of', 'quiet', 'words']);
	});
});

it('supports setting macros for all classes', function() {
	$called = [];

	FluentToolkit::macro('global', function() use (&$called) {
		$called[] = $this::class;
	});

	fluent('test')->global();
	fluent(['test'])->global();
	collect(['test'])->global();

	expect(count($called))->toBe(3);
	expect($called)->toBe([
		FluentString::class,
		FluentArray::class,
		FluentCollection::class,
	]);
});
