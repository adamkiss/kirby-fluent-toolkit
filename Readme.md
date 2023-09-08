# Fluent Toolkit for Kirby

Fluent (chainable) and extendable version of Kirby Toolkit - strings, arrays and collections.

## Example

```php
	// Outputs "Tom, Jack, Jerry"
	echo fluent('tom jack jerry')
		->split(' ')
		->map(fn($name) => Str::ucfirst($name))
		->join(', ');
```
