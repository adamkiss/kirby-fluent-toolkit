<?php

use Kirby\Database\Db;

return [
	'db' => [
		'type' => 'sqlite',
		'database' => ':memory:',
	],
	'adamkiss.kirby3-sqlite-queue' => [
		'queues' => [
			'just-ray' => fn($job) => ray()->pass($job)
		]
	]
];
