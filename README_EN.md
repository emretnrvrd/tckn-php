![Logo](https://repository-images.githubusercontent.com/631359345/bd77803e-61c1-4350-89f3-9f7112c8aab1)

    
# Turkey Republic ID Number Validation, Verification, and Generation

<div align="center">
  <a href="https://github.com/emretnrvrd/tckn-php/blob/main/LICENSE"> 
    <img src="https://img.shields.io/badge/License-MIT-green.svg">
  </a>
  <a href="https://github.com/emretnrvrd/tckn-php/blob/main/composer.json"> 
    <img src="https://img.shields.io/badge/PHP->=7.4-blue">
  </a>
</div>

## Description

This package is the most comprehensive package for the Turkey Republic ID number. It includes functions for algorithmically validating Turkey Republic ID numbers, verifying identity information through an API and generating random Turkey Republic ID numbers for testing purposes.

[Türkçe için](https://github.com/emretnrvrd/tckn-php/blob/main/README_EN.md)


## Features

- Algorithmic validation of Turkish Republic ID Number
- Verifying Turkey Republic ID information through the Turkey Republic Population and Citizenship Affairs API (Requires name, surname, and birth year.)
- Generating random Turkey Republic ID numbers

  
## Related Projects

If you're using Laravel, we recommend using this package.

[Laravel - TCKN](https://github.com/emretnrvrd/tckn-laravel)

  
## Installation 

```bash 
  composer require emretnrvrd/tckn
```
    
## Usage/Examples

#### Algorithmic Validation

The return type is always boolean. If the Turkish ID number is algorithmically correct, it will return "true", otherwise "false".

```php
use Emretnrvrd\Tckn\Services\TcknValidator\TcknValidator;

$tcknValidator = new TcknValidator(90626476730);
$tcknValidotor->validate();
//true

/*-----OR-----*/

$tcknValidator = new TcknValidator();
$tcknValidator->setValue(90626476730);
$tcknValidator->validate();
//true

/*-----OR-----*/

// Helpers Usage

validateTckn('90626476730');
//true
```

#### Verify with API
The return type is always boolean. Since it queries through the API, it requires name, surname, birth year, and Turkey Republic ID number.
[API details](https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?op=TCKimlikNoDogrula)

```php
use Emretnrvrd\Tckn\Services\TcknVerifier\TcknVerifier;

$tcknVerifier = new TcknVerifier("Ahmet", "Demir", 1997, 12345678910);
$tcknVerifier->verify();
//false

/*-----OR-----*/

// Helpers Usage

verifyTckn("Ahmet", "Demir", 1997, 12345678910);
//false
```


#### Generating Random
The return type is always string. It generates a random Turkey Republic ID number that passes algorithmic validation. (It generates a random Turkey Republic ID number for testing purposes only. It does not contain any real person's information.)

```php
use Emretnrvrd\Tckn\Services\TcknRandom\TcknRandom;

$tcknRandom = new TcknRandom();
$tcknRandom->generate();
//"34909082386"

/*-----OR-----*/

// Helpers Usage

generateTckn();
//"34909082386"
```
## License

[MIT](https://github.com/emretnrvrd/tckn-php/blob/main/LICENSE)

  
## Feedback

If you have any feedback, you can reach me at emretanriverdi28@gmail.com or [@emretnrvrdi](https://twitter.com/emretnrvrdi) on Twitter.

  