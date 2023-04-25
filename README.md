
# Turkey Republic Identification Number Helpers

This package enables algorithmic validation of Turkish Republic Identification Numbers (TCKN) and generates fake TCKN for testing purposes in a straightforward way.

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)

[![MIT License](https://img.shields.io/badge/PHP-%5E7.4-blue)](https://prototype.php.net/versions/7.4.0/)






## Installation

```bash 
  composer install emretnrvrd/tckn-helpers
```

## Usages

#### Import Tckn class
```php
use Emretnrvrd\TcknHelpers\Tckn;
```

#### Basic Usage
```php
$tckn = new Tckn("44873515636");
// used randomly created and validated fake tckn.

$tckn->validate(); 
//true

$tckn->setValue("12345678910");

$tckn->validate();
//true
```

#### Generate Random Tckn
```php
$tckn = new Tckn();
//value empty

$randomTckn = $tckn->random();
$tckn->setValue($randomTckn);

$tckn->getValue(); 
//44873515636

$tckn->validate();
//true
```

#### Helpers
You don't need to use the Tckn class to accomplish the same functionality, as you can use helper functions instead.
```php
validateTckn("12345678910");
// true or false

randomTckn();
// 44873515636
```

## Feedback

If you have any feedback, please contact us at emretanrivedi28@gmail.com
  