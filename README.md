![Logo](https://repository-images.githubusercontent.com/631359345/366305c0-4516-41f7-8cdc-954dad970ffd)

    
# TC Kimlik Doğrulama, Sorgulama ve Üretme

<div align="center">
  <a href="https://github.com/emretnrvrd/tckn-php/blob/main/LICENSE"> 
    <img src="https://img.shields.io/badge/License-MIT-green.svg">
  </a>
  <a href="https://github.com/emretnrvrd/tckn-php/blob/main/composer.json"> 
    <img src="https://img.shields.io/badge/PHP->=7.4-blue">
  </a>
</div>

## Açıklama

TC kimlik numarası için en kapsamlı pakettir. TC kimlik numaralarını algoritmik olarak doğrulamak, API aracılığıyla kimlik bilgilerini sorgulamak ve test amacıyla rastgele TC kimlik numaraları üretme işlevlerini içerir.

[For English](https://github.com/emretnrvrd/tckn-php/blob/main/README_EN.md)


## Özellikler

- Algoritmik olarak TC Kimlik Numarası doğrulama
- TC Nüfus ve Vatandaşlık İşleri (NVİ) API üzerinden TC Kimlik Sorgulaması (Ad, soyad ve doğum yılı gereklidir.)
- Rastgele TC Kimlik Numarası Üretme

  
## İlişkili Projeler

Eğer Laravel kullanıyorsanız bu paketi kullanmanız önerilir.

[Laravel - TCKN](https://github.com/emretnrvrd/tckn-laravel)

  
## Yükleme 

```bash 
  composer require emretnrvrd/tckn
```
    
## Kullanım/Örnekler


#### Algoritmik Doğrulama
Dönüş tipi her zaman bool tipindedir. Eğer TC Kimlik Numarası algoritmik olarak doğru ise "true", değilse "false" olarak dönecektir. 
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

#### API ile Sorgulama
Dönüş tipi her zaman bool tipindedir. API ile doğrulama yaptığı için ad, soyad, doğum yılı ve TC kimlik numarası gerekmektedir.
[API detayları için](https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?op=TCKimlikNoDogrula)

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


#### Rastgele Üretme
Dönüş tipi her zaman string'dir. İçinde algoritmik doğrulamadan geçen rastgele bir TC kimlik numarası döndürür. (Sadece test amaçlı kullanmak için rastgele TC kimlik numarası üretir. Herhangi bir gerçek şahsa ait bir bilgi vs. içermemektedir.)

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
## Lisans

[MIT](https://github.com/emretnrvrd/tckn-php/blob/main/LICENSE)

  
## Geri Bildirim

Herhangi bir geri bildiriminiz varsa, bana emretanriverdi28@gmail.com yada [@emretnrvrdi](https://twitter.com/emretnrvrdi) twitter adresinden bana ulaşabilirsiniz.

  