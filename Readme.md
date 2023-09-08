# Fluent Toolkit for Kirby

Fluent (chainable) and extendable version of Kirby Toolkit - strings, arrays and collections.

## Example

```php
	// Outputs "Tom, Jack, Jerry"
	echo fluent('tom jack jerry')
		->split(' ')
		->map(fn($name) => fluent($name)->ucfirst())
		->join(', ');

	// It also supports short helper f()
	echo f('tom jack jerry')
		->split(' ')
		->map(fn($name) => f($name)->ucfirst())
		->join(', ');
```
