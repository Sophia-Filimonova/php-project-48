### Hexlet tests and linter status:
[![Actions Status](https://github.com/Sophia-Filimonova/php-project-48/actions/workflows/hexlet-check.yml/badge.svg)](https://github.com/Sophia-Filimonova/php-project-48/actions)
[![PHP CI](https://github.com/Sophia-Filimonova/php-project-48/actions/workflows/PHP_CI.yml/badge.svg)](https://github.com/Sophia-Filimonova/php-project-48/actions/workflows/PHP_CI.yml)
[![Maintainability](https://api.codeclimate.com/v1/badges/344cdf0c6c47b2cbcaf8/maintainability)](https://codeclimate.com/github/Sophia-Filimonova/php-project-48/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/344cdf0c6c47b2cbcaf8/test_coverage)](https://codeclimate.com/github/Sophia-Filimonova/php-project-48/test_coverage)

## Difference Calculator
Difference Calculator is a command line tool for finding differences in configuration files (JSON, YAML). It generates reports in the form of plain text, tree and json.

### Usage
  gendiff (-h|--help)
  
  gendiff (-v|--version)
  
  gendiff [--format &lt;fmt&gt;] &lt;firstFile&gt; &lt;secondFile&gt;
  
### Report formats:
<ul>
<li>plain
<li>stylish (by default)
<li>json
</ul>

### Requirements

PHP: 8.1.2

Composer: 2.6.5

### Setup

```sh
$ git clone git@github.com:Sophia-Filimonova/php-project-48.git

$ cd php-project-48

$ make install
```

### Example:
[![asciicast](https://asciinema.org/a/gfZ97AyOkJ43HVLr8WAwqqrZc.svg)](https://asciinema.org/a/gfZ97AyOkJ43HVLr8WAwqqrZc)