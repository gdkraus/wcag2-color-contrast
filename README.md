WCAG 2.0 Color Contrast
=======================

A PHP function to compare two RGB values to determine if it meets WCAG 2.0 color conformance requirements.

The syntax is
```php
array evaluateColorContrast(string $color1, string $color2)
```

It will return an array indicating if the color combination passes each WCAG 2.0 conformance level, including the actual computed ratio.

Example:

```php
$results = evaluateColorContrast("ff0000","ffffff");

echo $results["levelAANormal"];      // -> fail
echo $results["levelAALarge"];       // -> pass
echo $results["levelAAMediumBold"];  // -> pass
echo $results["levelAAANormal"];     // -> fail
echo $results["levelAAALarge"];      // -> fail
echo $results["levelAAAMediumBold"]; // -> fail
echo $results["ratio"];              // -> 4.0
```
