wcag2-color-contrast
====================

A PHP function to compare two RGB values to determine if it meets WCAG 2 color conformance requirements.

The syntax is

array evaluateColorContrast(string $color1, string $color2)

It will return an array indicating if the color combination passes each WCAG 2 conformance level, including the actual computed ratio.

Example:

$results = evaluateColorContrast("ff0000","ffffff");


$results["levelAANormal"] = 'fail';

$results["levelAALarge"] = 'pass';

$results["levelAAMediumBold"] = 'pass';

$results["levelAAANormal"] = 'fail';

$results["levelAAALarge"] = 'fail';

$results["levelAAAMediumBold"] = 'fail';

$results["ratio"] = '4.0';