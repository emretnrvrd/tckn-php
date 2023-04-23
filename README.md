
![Logo](https://lh3.googleusercontent.com/fife/APg5EObw5iV1IFl8GDTFQ5jzBtpG67pK__5A1lL2zUfTPnkkO941u7yIJVVK9VAQDLjgBQcv7Rx1dFxlFzs0OZHlkR3MKD6SXcM3zKNgJDl74yUlhZ48w-mLsPdpYnIr4726r6T4ZBfsum3_LG5rfmKGtbC7UuylTNTNocfx4_W0h4at5wA0g9OiiVScAPqe9rSU8rJatjwg7vu4D68RKxm03aTf1g7E-Ugi6GUwJ3gZHraKNbGNJxWA9_nYhVCKniMwGE0DJqat53gnmak1GX_m2EGg9DU4lN7BgZE_JesHHTs2VnOPvfdes_pk_t3eIbGvs_tHYuLV-So9Poco12Xd6UQU78evIMdI9-weou0IBumnU9QloiWRA385zzxNeIwEDStfyXC5-ACz3GBS0yKHM1SBB53poWQ8U5TLaqmRVosakCRJVAr6BAWEBtSEr46k5jySJ9glOB0XA2PMKRjIqH9z2kjBY58Sw9e_lYv0UnuWPddZ5FSfas0mvHDCY9pVfcvrUdOZwJOndJyaPvn6KcPOMJirJP5vnQtNtqQLB7ksfa5WxHapkqoT6YbHYahKrZizjaSy4y91lOSiRNe1Lv-8DAbTLjBj9tHhCwvjojPGw6um6eDacLmGFVbiEU-NAnTRiUNl_6rS0j7mMVjierg8zUs0Fa1-NmbbJGCpWp5in5JhWnHt2GgAr9uZZedJ9JxUL6WHxVWn1CkIc9Lnd498A609HNF3CYErKnx1B7sIR7PhLDsK3aoxKe0iTimD1ZU8A8F35OIxJLWNnIoFU1XTFl6H0bmmUCJ35odwzwrAPF6v3A63se5tvUR0AXqZqV6qTLUqdEtOFeea6CTy94VGzO1-K1sENBvU9aEVAAqh5dXPD-dc9sFs0saT7tkauX4BmylByeXmnoA_LsvTQ7zFxqs8HOlDGrDJOiNCPet9Ymjw_xC0hoKy48ATrNveDl6o1yvMb4Ve3lCITAyEqLqc1JfmVRQWdYUobOxDGoyQqWdMWdY=w1920-h881)


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
```


#### Reuse Class
```php
$tckn = new Tckn("44873515636");

$tckn->validate(); 
//true

$tckn->setValue("12345678910");

$tckn->validate();
//false
```

#### Generate Random Tckn
```php
$tckn = new Tckn();
//value empty

$randomTckn = $tckn->generate();

$tckn->setValue(randomTckn);

$tckn->getValue(); 
//44873515636

$tckn->validate();
//true
```
## Feedback

If you have any feedback, please contact us at emretanrivedi28@gmail.com
  