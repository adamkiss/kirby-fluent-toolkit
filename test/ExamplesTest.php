<?php

/*
 * These examples are either taken from the README.md file, or are something I'm just testing while developing the package.
 */

it('shows examples correctly', function() {

	// Readme example
	expect(
		'' .
		fluent('tom jack jerry')
			->split(' ')
			->map(fn($name) => f($name)->ucfirst())
			->join(', ')
	)->toBe('Tom, Jack, Jerry');

	// example from one of my projects
	// A::join([Str::substr($p->year, -2, 2), $p->id], '-'),
	$p = (object) ['year'=>2023,'id'=>123];
	expect(
		'' .
		fluent([
			f($p->year)->substr(-2, 2),
			$p->id
		])->join('-')
	)->toBe('23-123');

	// Let's test tap
	expect(
		'' .
		fluent($p)
			->get(['year', 'id'])
			->tap(function(&$p) {
				$p->value['year'] = f($p->value['year'])->substr(-2, 2);
			})
			->join('-')
	)->toBe('23-123');
});
